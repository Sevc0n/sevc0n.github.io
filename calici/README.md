# ⏰ Calici Reminder - Sistema di Notifiche Discord

Sistema completo per gestire scadenze e ricevere notifiche automatiche su Discord 24 ore e 12 ore prima della scadenza.

## 🎯 Funzionalità

- ✅ Interfaccia web intuitiva per creare reminder
- ✅ Notifiche automatiche su Discord (DM) 24h e 12h prima della scadenza
- ✅ Ping diretto all'utente specificato
- ✅ Visualizzazione reminder attivi
- ✅ Comando Discord `/reminders` per vedere i propri reminder

## 🚀 Setup

### 1. Configurazione Bot Discord

1. Assicurati che il bot abbia i permessi per inviare Direct Messages
2. Nel file `.env` del bot, abilita l'API server:
   ```env
   ENABLE_API=true
   API_PORT=3000
   ```

### 2. Installazione Dipendenze

```bash
cd discord-bot
npm install
```

### 3. Avvio

```bash
npm start
```

Il bot avvierà automaticamente:
- 🤖 Bot Discord
- ⏰ Reminder Manager (controlla ogni minuto)
- 🌐 Server API su `http://localhost:3000`

### 4. Accesso Interfaccia Web

Apri il browser e vai su:
```
http://localhost:3000
```

## 📖 Come Usare

### Creare un Reminder

1. **Apri l'interfaccia web** su `http://localhost:3000`
2. **Inserisci l'ID utente Discord**:
   - Attiva la modalità sviluppatore in Discord (Impostazioni > Avanzate > Modalità sviluppatore)
   - Click destro sull'utente > "Copia ID"
3. **Seleziona data e ora di scadenza**
4. **Aggiungi un messaggio personalizzato** (opzionale)
5. **Clicca "Crea Reminder"**

### Notifiche Automatiche

Il bot invierà automaticamente:
- 📨 **Notifica 24 ore prima** della scadenza
- 📨 **Notifica 12 ore prima** della scadenza

Le notifiche vengono inviate via Direct Message (DM) con un ping all'utente.

### Visualizzare Reminder

**Via Interfaccia Web:**
- I reminder attivi vengono mostrati automaticamente nella pagina

**Via Discord:**
- Usa il comando `/reminders` per vedere i tuoi reminder
- Gli admin possono vedere i reminder di altri utenti con `/reminders @utente`

## 🔧 Configurazione Avanzata

### Cambiare Porta API

Modifica il file `.env`:
```env
API_PORT=8080
```

### Disabilitare Server API

Se non vuoi usare l'interfaccia web:
```env
ENABLE_API=false
```

Il bot continuerà a funzionare normalmente, ma l'interfaccia web non sarà disponibile.

## 📁 Struttura File

```
calici/
├── index.html          # Interfaccia web
└── README.md           # Questo file

discord-bot/
├── bot.js              # Bot principale
├── reminder-manager.js # Gestore reminder
├── api-server.js       # Server API per interfaccia web
├── reminders.json      # File di storage (generato automaticamente)
└── commands/
    └── reminders.js    # Comando /reminders
```

## ⚠️ Note Importanti

1. **Direct Messages**: Se un utente ha i DM disabilitati, il bot non potrà inviare notifiche. In questo caso, considera di aggiungere un canale di default per le notifiche.

2. **Storage**: I reminder sono salvati in `discord-bot/reminders.json`. Assicurati di fare backup regolari.

3. **Controllo Periodico**: Il bot controlla i reminder ogni minuto. Le notifiche vengono inviate quando:
   - Mancano esattamente 24 ore (o meno, se il bot era spento)
   - Mancano esattamente 12 ore (o meno, se il bot era spento)

4. **Scadenze Passate**: I reminder scaduti vengono automaticamente rimossi.

## 🐛 Risoluzione Problemi

### Le notifiche non arrivano

- ✅ Verifica che l'ID utente sia corretto
- ✅ Controlla che l'utente non abbia i DM disabilitati
- ✅ Assicurati che il bot sia online e funzionante
- ✅ Controlla i log del bot per errori

### L'interfaccia web non si carica

- ✅ Verifica che `ENABLE_API=true` nel file `.env`
- ✅ Controlla che la porta non sia già in uso
- ✅ Verifica che il bot sia avviato

### Errore "Reminder manager non disponibile"

- ✅ Riavvia il bot
- ✅ Controlla i log per errori di avvio

## 📞 Supporto

- **Discord**: `picciobeffa`
- **Telegram**: `@piccionenberg`
- **Sito**: [sevc0n.github.io](https://sevc0n.github.io)

---

© 2025 **Sevcon by piccionenberg** - Creato con ❤️ per la community gaming

