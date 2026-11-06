// Script per registrare i comandi slash su Discord
require('dotenv').config();
const { REST, Routes } = require('discord.js');
const fs = require('fs');
const path = require('path');

const commands = [];

// Carica tutti i comandi dalla cartella commands
const commandsPath = path.join(__dirname, 'commands');
const commandFiles = fs.readdirSync(commandsPath).filter(file => file.endsWith('.js'));

for (const file of commandFiles) {
    const filePath = path.join(commandsPath, file);
    const command = require(filePath);
    
    if ('data' in command) {
        commands.push(command.data.toJSON());
        console.log(`✅ Comando caricato per deploy: ${command.data.name}`);
    }
}

// Prepara l'istanza REST
const rest = new REST({ version: '10' }).setToken(process.env.DISCORD_TOKEN);

// Deploy comandi
(async () => {
    try {
        console.log(`🔄 Inizio registrazione di ${commands.length} comandi slash...`);

        const clientId = process.env.CLIENT_ID;
        const guildId = process.env.GUILD_ID;

        let data;

        if (guildId) {
            // Deploy solo su un server specifico (più veloce per test)
            console.log(`📡 Deploy comandi su server specifico (${guildId})...`);
            data = await rest.put(
                Routes.applicationGuildCommands(clientId, guildId),
                { body: commands }
            );
        } else {
            // Deploy globale (può richiedere fino a 1 ora per propagarsi)
            console.log(`🌍 Deploy comandi globali...`);
            data = await rest.put(
                Routes.applicationCommands(clientId),
                { body: commands }
            );
        }

        console.log(`✅ Registrati con successo ${data.length} comandi slash!`);
    } catch (error) {
        console.error('❌ Errore durante la registrazione dei comandi:', error);
    }
})();













