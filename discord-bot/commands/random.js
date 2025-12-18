const { SlashCommandBuilder } = require('discord.js');

module.exports = {
    data: new SlashCommandBuilder()
        .setName('random')
        .setDescription('Genera un numero casuale')
        .addIntegerOption(option =>
            option.setName('min')
                .setDescription('Numero minimo (default: 1)')
                .setRequired(false))
        .addIntegerOption(option =>
            option.setName('max')
                .setDescription('Numero massimo (default: 100)')
                .setRequired(false)),
    
    async execute(interaction) {
        const min = interaction.options.getInteger('min') ?? 1;
        const max = interaction.options.getInteger('max') ?? 100;

        if (min > max) {
            await interaction.reply({ content: '❌ Il numero minimo non può essere maggiore del massimo!', ephemeral: true });
            return;
        }

        const randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;
        
        await interaction.reply(`🎲 Numero casuale tra ${min} e ${max}: **${randomNumber}**`);
    }
};








