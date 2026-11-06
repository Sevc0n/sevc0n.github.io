// Server API per gestire i reminder dall'interfaccia web
// Avvia questo server insieme al bot per abilitare l'interfaccia web

const express = require('express');
const cors = require('cors');
const path = require('path');
const fs = require('fs');

class APIServer {
    constructor(client, port = 3000) {
        this.client = client;
        this.port = port;
        this.app = express();
        this.server = null;
        
        this.setupMiddleware();
        this.setupRoutes();
    }

    setupMiddleware() {
        // CORS per permettere richieste dal browser
        this.app.use(cors());
        this.app.use(express.json());
        
        // Serve file statici dalla cartella calici
        const caliciPath = path.join(__dirname, '..', 'calici');
        this.app.use(express.static(caliciPath));
    }

    setupRoutes() {
        // Route principale - serve index.html
        this.app.get('/', (req, res) => {
            const indexPath = path.join(__dirname, '..', 'calici', 'index.html');
            if (fs.existsSync(indexPath)) {
                res.sendFile(indexPath);
            } else {
                res.status(404).send('File non trovato');
            }
        });

        // GET /api/reminders - Ottieni tutti i reminder
        this.app.get('/api/reminders', (req, res) => {
            try {
                const reminderManager = this.client.reminderManager;
                if (!reminderManager) {
                    return res.status(503).json({ error: 'Reminder manager non disponibile' });
                }

                const reminders = reminderManager.getReminders();
                res.json(reminders);
            } catch (error) {
                console.error('Errore GET /api/reminders:', error);
                res.status(500).json({ error: 'Errore nel caricamento dei reminder' });
            }
        });

        // POST /api/reminders - Crea un nuovo reminder
        this.app.post('/api/reminders', (req, res) => {
            try {
                const { userId, scadenza, messaggio } = req.body;

                // Validazione
                if (!userId || !scadenza) {
                    return res.status(400).json({ error: 'userId e scadenza sono obbligatori' });
                }

                // Valida formato userId (deve essere un numero Discord ID)
                if (!/^\d{17,19}$/.test(userId)) {
                    return res.status(400).json({ error: 'Formato userId non valido' });
                }

                // Valida data
                const scadenzaDate = new Date(scadenza);
                if (isNaN(scadenzaDate.getTime())) {
                    return res.status(400).json({ error: 'Data di scadenza non valida' });
                }

                if (scadenzaDate <= new Date()) {
                    return res.status(400).json({ error: 'La scadenza deve essere nel futuro' });
                }

                const reminderManager = this.client.reminderManager;
                if (!reminderManager) {
                    return res.status(503).json({ error: 'Reminder manager non disponibile' });
                }

                const reminder = reminderManager.addReminder(userId, scadenza, messaggio);
                res.status(201).json(reminder);
            } catch (error) {
                console.error('Errore POST /api/reminders:', error);
                res.status(500).json({ error: 'Errore nella creazione del reminder' });
            }
        });

        // DELETE /api/reminders/:id - Elimina un reminder
        this.app.delete('/api/reminders/:id', (req, res) => {
            try {
                const { id } = req.params;
                const reminderManager = this.client.reminderManager;
                
                if (!reminderManager) {
                    return res.status(503).json({ error: 'Reminder manager non disponibile' });
                }

                const deleted = reminderManager.deleteReminder(id);
                if (deleted) {
                    res.json({ success: true, message: 'Reminder eliminato' });
                } else {
                    res.status(404).json({ error: 'Reminder non trovato' });
                }
            } catch (error) {
                console.error('Errore DELETE /api/reminders:', error);
                res.status(500).json({ error: 'Errore nell\'eliminazione del reminder' });
            }
        });
    }

    start() {
        return new Promise((resolve, reject) => {
            this.server = this.app.listen(this.port, () => {
                console.log(`🌐 Server API avviato su http://localhost:${this.port}`);
                console.log(`📱 Interfaccia web disponibile su http://localhost:${this.port}`);
                resolve();
            });

            this.server.on('error', (error) => {
                if (error.code === 'EADDRINUSE') {
                    console.error(`❌ Porta ${this.port} già in uso. Cambia la porta nel file .env`);
                } else {
                    console.error('❌ Errore server API:', error);
                }
                reject(error);
            });
        });
    }

    stop() {
        if (this.server) {
            this.server.close();
            console.log('⏹️  Server API fermato');
        }
    }
}

module.exports = APIServer;













