// Bot Discord per Sevcon Tools
// Creato da piccionenberg

require('dotenv').config();
const { Client, GatewayIntentBits, Events, Collection } = require('discord.js');
const fs = require('fs');
const path = require('path');
const ReminderManager = require('./reminder-manager');
const APIServer = require('./api-server');

// Crea un nuovo client Discord
const client = new Client({
    intents: [
        GatewayIntentBits.Guilds,
        GatewayIntentBits.GuildMessages,
        GatewayIntentBits.MessageContent,
        GatewayIntentBits.GuildMembers,
        GatewayIntentBits.DirectMessages // Necessario per inviare DM
    ]
});

// Collezione per i comandi
client.commands = new Collection();

// Inizializza Reminder Manager
const reminderManager = new ReminderManager(client);
client.reminderManager = reminderManager; // Espone per accesso esterno

// Carica i comandi dalla cartella commands
const commandsPath = path.join(__dirname, 'commands');
const commandFiles = fs.readdirSync(commandsPath).filter(file => file.endsWith('.js'));

for (const file of commandFiles) {
    const filePath = path.join(commandsPath, file);
    const command = require(filePath);
    
    if ('data' in command && 'execute' in command) {
        client.commands.set(command.data.name, command);
        console.log(`✅ Comando caricato: ${command.data.name}`);
    } else {
        console.log(`⚠️  Attenzione: Il comando in ${filePath} manca della proprietà "data" o "execute".`);
    }
}

// Evento: Bot pronto
client.once(Events.ClientReady, readyClient => {
    console.log(`🤖 Bot pronto! Loggato come ${readyClient.user.tag}`);
    console.log(`📊 Bot in ${client.guilds.cache.size} server`);
    console.log(`👥 Monitorando ${client.users.cache.size} utenti`);
    
    // Imposta lo status del bot
    client.user.setActivity('Sevcon Tools | /help', { type: 'WATCHING' });
    
    // Avvia il reminder manager
    reminderManager.start();
    console.log('⏰ Reminder manager avviato');
    
    // Avvia il server API se abilitato
    if (process.env.ENABLE_API === 'true') {
        const apiPort = parseInt(process.env.API_PORT) || 3000;
        const apiServer = new APIServer(client, apiPort);
        apiServer.start().catch(error => {
            console.error('❌ Errore nell\'avvio del server API:', error);
        });
        client.apiServer = apiServer;
    }
});

// Evento: Gestione comandi slash
client.on(Events.InteractionCreate, async interaction => {
    if (!interaction.isChatInputCommand()) return;

    const command = client.commands.get(interaction.commandName);

    if (!command) {
        console.error(`❌ Nessun comando trovato per: ${interaction.commandName}`);
        return;
    }

    try {
        await command.execute(interaction);
    } catch (error) {
        console.error(`❌ Errore eseguendo il comando ${interaction.commandName}:`, error);
        
        const errorMessage = { content: '❌ Si è verificato un errore durante l\'esecuzione del comando!', ephemeral: true };
        
        if (interaction.replied || interaction.deferred) {
            await interaction.followUp(errorMessage);
        } else {
            await interaction.reply(errorMessage);
        }
    }
});

// Evento: Messaggi (per comandi con prefisso opzionale)
client.on(Events.MessageCreate, async message => {
    // Ignora messaggi del bot
    if (message.author.bot) return;
    
    // Esempio: risposta a "ciao bot"
    if (message.content.toLowerCase() === 'ciao bot') {
        await message.reply('👋 Ciao! Usa `/help` per vedere i comandi disponibili!');
    }
});

// Gestione errori
client.on(Events.Error, error => {
    console.error('❌ Errore Discord:', error);
});

process.on('unhandledRejection', error => {
    console.error('❌ Errore non gestito:', error);
});

// Login del bot
const token = process.env.DISCORD_TOKEN;

if (!token) {
    console.error('❌ ERRORE: Token Discord non trovato!');
    console.error('📝 Assicurati di aver creato il file .env con DISCORD_TOKEN=il_tuo_token');
    process.exit(1);
}

client.login(token);

