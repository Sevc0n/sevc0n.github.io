// Gestore Reminder per Bot Discord
// Controlla periodicamente i reminder e invia notifiche

const fs = require('fs');
const path = require('path');

class ReminderManager {
    constructor(client) {
        this.client = client;
        this.remindersFile = path.join(__dirname, 'reminders.json');
        this.checkInterval = 60000; // Controlla ogni minuto
        this.intervalId = null;
        
        // Crea il file se non esiste
        this.ensureRemindersFile();
    }

    ensureRemindersFile() {
        if (!fs.existsSync(this.remindersFile)) {
            fs.writeFileSync(this.remindersFile, JSON.stringify([], null, 2));
        }
    }

    loadReminders() {
        try {
            const data = fs.readFileSync(this.remindersFile, 'utf8');
            return JSON.parse(data);
        } catch (error) {
            console.error('❌ Errore nel caricamento dei reminder:', error);
            return [];
        }
    }

    saveReminders(reminders) {
        try {
            fs.writeFileSync(this.remindersFile, JSON.stringify(reminders, null, 2));
            return true;
        } catch (error) {
            console.error('❌ Errore nel salvataggio dei reminder:', error);
            return false;
        }
    }

    addReminder(userId, scadenza, messaggio) {
        const reminders = this.loadReminders();
        
        const reminder = {
            id: Date.now().toString(),
            userId: userId,
            scadenza: new Date(scadenza).toISOString(),
            messaggio: messaggio || 'Reminder scadenza',
            notificato24h: false,
            notificato12h: false,
            creato: new Date().toISOString()
        };

        reminders.push(reminder);
        this.saveReminders(reminders);
        
        console.log(`✅ Reminder aggiunto: ID ${reminder.id} per utente ${userId}`);
        return reminder;
    }

    async checkReminders() {
        const reminders = this.loadReminders();
        const now = new Date();
        const updatedReminders = [];
        let hasChanges = false;

        for (const reminder of reminders) {
            const scadenza = new Date(reminder.scadenza);
            const diff = scadenza - now;
            const hoursUntil = diff / (1000 * 60 * 60);

            // Se la scadenza è passata, rimuovi il reminder
            if (diff <= 0) {
                console.log(`🗑️  Reminder scaduto rimosso: ID ${reminder.id}`);
                hasChanges = true;
                continue;
            }

            // Controlla notifica 24 ore prima
            if (!reminder.notificato24h && hoursUntil <= 24 && hoursUntil > 12) {
                await this.sendNotification(reminder, 24);
                reminder.notificato24h = true;
                hasChanges = true;
            }

            // Controlla notifica 12 ore prima
            if (!reminder.notificato12h && hoursUntil <= 12 && hoursUntil > 0) {
                await this.sendNotification(reminder, 12);
                reminder.notificato12h = true;
                hasChanges = true;
            }

            updatedReminders.push(reminder);
        }

        if (hasChanges) {
            this.saveReminders(updatedReminders);
        }
    }

    async sendNotification(reminder, hoursBefore) {
        try {
            const user = await this.client.users.fetch(reminder.userId);
            const scadenza = new Date(reminder.scadenza);
            const scadenzaFormatted = scadenza.toLocaleString('it-IT', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });

            const message = `⏰ **REMINDER SCADENZA**\n\n` +
                          `👤 <@${reminder.userId}>\n\n` +
                          `📅 **Scadenza:** ${scadenzaFormatted}\n` +
                          `⏱️ **Tempo rimanente:** ${hoursBefore} ore\n\n` +
                          `💬 ${reminder.messaggio}`;

            await user.send(message);
            console.log(`✅ Notifica ${hoursBefore}h inviata a ${user.tag} (ID: ${reminder.userId})`);
        } catch (error) {
            console.error(`❌ Errore nell'invio della notifica a ${reminder.userId}:`, error.message);
            
            // Se l'utente ha i DM disabilitati, prova a inviare in un canale
            // (richiede configurazione del canale di default)
            if (error.code === 50007) {
                console.log(`⚠️  L'utente ${reminder.userId} ha i DM disabilitati`);
            }
        }
    }

    start() {
        if (this.intervalId) {
            console.log('⚠️  Reminder manager già avviato');
            return;
        }

        console.log('🔄 Avvio controllo reminder...');
        this.intervalId = setInterval(() => {
            this.checkReminders();
        }, this.checkInterval);

        // Controlla immediatamente all'avvio
        this.checkReminders();
    }

    stop() {
        if (this.intervalId) {
            clearInterval(this.intervalId);
            this.intervalId = null;
            console.log('⏹️  Controllo reminder fermato');
        }
    }

    getReminders() {
        return this.loadReminders();
    }

    getRemindersByUser(userId) {
        const reminders = this.loadReminders();
        return reminders.filter(r => r.userId === userId);
    }

    deleteReminder(reminderId) {
        const reminders = this.loadReminders();
        const filtered = reminders.filter(r => r.id !== reminderId);
        
        if (filtered.length < reminders.length) {
            this.saveReminders(filtered);
            return true;
        }
        return false;
    }
}

module.exports = ReminderManager;













