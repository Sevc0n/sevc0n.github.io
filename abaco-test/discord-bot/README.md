# 🤖 Sevcon Discord Bot

Bot Discord ufficiale per **Sevcon Tools**, creato da **piccionenberg**.

## 📋 Caratteristiche

- ✅ Comandi slash interattivi
- ✅ Sistema modulare per comandi
- ✅ Gestione errori avanzata
- ✅ Embed colorati e informativi
- ✅ **Sistema Reminder con notifiche automatiche** (24h e 12h prima)
- ✅ **Interfaccia web per gestire reminder** (Calici)
- ✅ Facile da estendere con nuovi comandi

## 🚀 Setup Iniziale

### 1. Prerequisiti

- **Node.js** versione 18.0.0 o superiore
- **npm** (incluso con Node.js)
- Un account Discord Developer

### 2. Creare un Bot Discord

1. Vai su [Discord Developer Portal](https://discord.com/developers/applications)
2. Clicca su **"New Application"** e dai un nome
3. Vai nella sezione **"Bot"** nel menu laterale
4. Clicca su **"Add Bot"** e conferma
5. Copia il **Token** del bot (lo userai dopo)
6. Nella sezione **"OAuth2" > "URL Generator"**:
   - Seleziona gli scope: `bot` e `applications.commands`
   - Seleziona le permissions necessarie (es: `Send Messages`, `Read Message History`)
   - Copia l'URL generato e usalo per invitare il bot nel tuo server

### 3. Installazione

1. **Installa le dipendenze**:
```bash
cd discord-bot
npm install
```

2. **Configura il file .env**:
```bash
# Copia il file di esempio
cp .env.example .env
```

3. **Modifica il file `.env`** e inserisci:
```env
DISCORD_TOKEN=il_tuo_token_qui
CLIENT_ID=il_tuo_client_id_qui
GUILD_ID=il_tuo_server_id_qui  # Opzionale, per test veloci
ENABLE_API=true                # Abilita server API per interfaccia web
API_PORT=3000                  # Porta del server API
```

Dove trovare questi valori:
- **DISCORD_TOKEN**: Sezione "Bot" nel Developer Portal
- **CLIENT_ID**: Sezione "General Information" nel Developer Portal (Application ID)
- **GUILD_ID**: Click destro sul tuo server Discord > "Copia ID" (devi avere la modalità sviluppatore attiva)

### 4. Registrare i Comandi

Prima di avviare il bot, devi registrare i comandi slash:

```bash
npm run deploy-commands
```

Questo registrerà tutti i comandi nella cartella `commands/`.

### 5. Avviare il Bot

```bash
npm start
```

Oppure:

```bash
node bot.js
```

Se tutto è configurato correttamente, vedrai:
```
🤖 Bot pronto! Loggato come NomeBot#1234
📊 Bot in X server
👥 Monitorando X utenti
⏰ Reminder manager avviato
🌐 Server API avviato su http://localhost:3000
```

## 📁 Struttura del Progetto

```
discord-bot/
├── bot.js                 # File principale del bot
├── deploy-commands.js     # Script per registrare comandi
├── reminder-manager.js   # Gestore reminder automatici
├── api-server.js          # Server API per interfaccia web
├── reminders.json         # Storage reminder (generato automaticamente)
├── package.json           # Dipendenze e configurazione
├── env.example.txt        # Template per variabili d'ambiente
├── .env                   # File di configurazione (da creare)
├── README.md              # Questo file
└── commands/              # Cartella comandi
    ├── help.js           # Comando /help
    ├── info.js           # Comando /info
    ├── link.js           # Comando /link
    ├── random.js         # Comando /random
    ├── userinfo.js       # Comando /userinfo
    └── reminders.js      # Comando /reminders
```

## 🎮 Comandi Disponibili

| Comando | Descrizione |
|---------|-------------|
| `/help` | Mostra la lista dei comandi disponibili |
| `/info` | Informazioni sul bot e sui tool Sevcon |
| `/link` | Link al sito Sevcon Tools |
| `/random [min] [max]` | Genera un numero casuale |
| `/userinfo [utente]` | Informazioni su un utente |
| `/reminders [utente]` | Mostra i reminder attivi (admin può vedere altri utenti) |

## ➕ Aggiungere Nuovi Comandi

1. Crea un nuovo file nella cartella `commands/` (es: `mio-comando.js`)
2. Usa questo template:

```javascript
const { SlashCommandBuilder } = require('discord.js');

module.exports = {
    data: new SlashCommandBuilder()
        .setName('nome-comando')
        .setDescription('Descrizione del comando'),
    
    async execute(interaction) {
        await interaction.reply('Risposta del comando!');
    }
};
```

3. Riavvia il bot e registra i comandi:
```bash
npm run deploy-commands
npm start
```

## 🔧 Configurazione Avanzata

### Deploy Comandi Globale vs Server

- **Server specifico** (più veloce, per test): Usa `GUILD_ID` nel file `.env`
- **Globale** (per tutti i server): Rimuovi `GUILD_ID` dal file `.env`

Nota: I comandi globali possono richiedere fino a 1 ora per propagarsi.

### Permessi del Bot

Assicurati che il bot abbia questi permessi nel server:
- ✅ Send Messages
- ✅ Read Message History
- ✅ Use Slash Commands
- ✅ Embed Links
- ✅ Attach Files (se necessario)

## ⏰ Sistema Reminder (Calici)

Il bot include un sistema completo per gestire reminder e scadenze con notifiche automatiche.

### Funzionalità

- 📅 **Interfaccia Web**: Crea reminder facilmente da `http://localhost:3000`
- 🔔 **Notifiche Automatiche**: Il bot invia DM 24h e 12h prima della scadenza
- 📋 **Visualizzazione**: Usa `/reminders` per vedere i tuoi reminder attivi

### Come Usare

1. **Avvia il bot** con `ENABLE_API=true` nel file `.env`
2. **Apri l'interfaccia web** su `http://localhost:3000`
3. **Inserisci**:
   - ID utente Discord (attiva modalità sviluppatore per ottenerlo)
   - Data e ora di scadenza
   - Messaggio personalizzato (opzionale)
4. **Il bot invierà automaticamente** notifiche 24h e 12h prima

### Documentazione Completa

Vedi `../calici/README.md` per la documentazione completa del sistema reminder.

## 🐛 Risoluzione Problemi

### Il bot non si avvia

- ✅ Verifica che il token nel file `.env` sia corretto
- ✅ Controlla che Node.js sia versione 18+
- ✅ Assicurati di aver installato le dipendenze (`npm install`)

### I comandi non appaiono

- ✅ Esegui `npm run deploy-commands` per registrare i comandi
- ✅ Attendi qualche minuto se hai fatto deploy globale
- ✅ Verifica che il bot sia nel server e abbia i permessi corretti

### Errori di permessi

- ✅ Invita il bot con i permessi corretti usando l'URL OAuth2
- ✅ Verifica i permessi del bot nel server (Impostazioni > Ruoli)

## 📞 Supporto

- **Discord**: `picciobeffa`
- **Telegram**: `@piccionenberg`
- **Sito**: [sevc0n.github.io](https://sevc0n.github.io)

## 📝 Licenza

MIT License - Creato con ❤️ per la community gaming

---

© 2025 **Sevcon by piccionenberg**

