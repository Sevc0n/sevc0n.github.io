const { SlashCommandBuilder, EmbedBuilder } = require('discord.js');

module.exports = {
    data: new SlashCommandBuilder()
        .setName('info')
        .setDescription('Informazioni sul bot e sui tool Sevcon'),
    
    async execute(interaction) {
        const infoEmbed = new EmbedBuilder()
            .setColor(0x00AE86)
            .setTitle('ℹ️ Informazioni Sevcon Bot')
            .setDescription('Bot Discord ufficiale per **Sevcon Tools**')
            .addFields(
                { name: '👨‍💻 Creatore', value: 'piccionenberg', inline: true },
                { name: '🌐 Sito Web', value: '[sevc0n.github.io](https://sevc0n.github.io)', inline: true },
                { name: '📦 Versione', value: '1.0.0', inline: true },
                { name: '⚒️ Tool Disponibili', value: 'Abaco Divisore, Calcolatore Prezzi, e altri...', inline: false },
                { name: '💬 Supporto', value: 'Discord: `picciobeffa`\nTelegram: `@piccionenberg`', inline: false }
            )
            .setFooter({ text: 'Sevcon Tools - Creato con ❤️ per la community gaming', iconURL: 'https://sevc0n.github.io/logo.png' })
            .setTimestamp();

        await interaction.reply({ embeds: [infoEmbed] });
    }
};



