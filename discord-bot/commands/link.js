const { SlashCommandBuilder, EmbedBuilder } = require('discord.js');

module.exports = {
    data: new SlashCommandBuilder()
        .setName('link')
        .setDescription('Link al sito Sevcon Tools'),
    
    async execute(interaction) {
        const linkEmbed = new EmbedBuilder()
            .setColor(0xFF6B6B)
            .setTitle('🔗 Link Sevcon Tools')
            .setDescription('Ecco i link principali:')
            .addFields(
                { name: '🏠 Homepage', value: '[sevc0n.github.io](https://sevc0n.github.io)', inline: false },
                { name: '⚒️ Abaco Divisore', value: '[sevc0n.github.io/abaco](https://sevc0n.github.io/abaco)', inline: false },
                { name: '💰 Calcolatore Prezzi', value: '[sevc0n.github.io/calcolatore-prezzi](https://sevc0n.github.io/calcolatore-prezzi)', inline: false }
            )
            .setFooter({ text: 'Sevcon Tools by piccionenberg', iconURL: 'https://sevc0n.github.io/logo.png' })
            .setTimestamp();

        await interaction.reply({ embeds: [linkEmbed] });
    }
};






