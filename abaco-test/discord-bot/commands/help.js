const { SlashCommandBuilder, EmbedBuilder } = require('discord.js');

module.exports = {
    data: new SlashCommandBuilder()
        .setName('help')
        .setDescription('Mostra la lista dei comandi disponibili'),
    
    async execute(interaction) {
        const helpEmbed = new EmbedBuilder()
            .setColor(0x5865F2) // Colore Discord
            .setTitle('🤖 Sevcon Bot - Comandi Disponibili')
            .setDescription('Ecco tutti i comandi disponibili:')
            .addFields(
                { name: '📋 `/help`', value: 'Mostra questo messaggio di aiuto', inline: false },
                { name: 'ℹ️ `/info`', value: 'Informazioni sul bot e sui tool Sevcon', inline: false },
                { name: '🔗 `/link`', value: 'Link al sito Sevcon Tools', inline: false },
                { name: '🎲 `/random`', value: 'Genera un numero casuale', inline: false },
                { name: '👤 `/userinfo`', value: 'Informazioni su un utente', inline: false },
                { name: '⏰ `/reminders`', value: 'Mostra i tuoi reminder attivi', inline: false }
            )
            .setFooter({ text: 'Sevcon Tools by piccionenberg', iconURL: 'https://sevc0n.github.io/logo.png' })
            .setTimestamp();

        await interaction.reply({ embeds: [helpEmbed] });
    }
};

