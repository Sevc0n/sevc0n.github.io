const { SlashCommandBuilder, EmbedBuilder } = require('discord.js');

module.exports = {
    data: new SlashCommandBuilder()
        .setName('userinfo')
        .setDescription('Mostra informazioni su un utente')
        .addUserOption(option =>
            option.setName('utente')
                .setDescription('L\'utente di cui vuoi vedere le informazioni')
                .setRequired(false)),
    
    async execute(interaction) {
        const user = interaction.options.getUser('utente') || interaction.user;
        const member = interaction.guild.members.cache.get(user.id);

        const userEmbed = new EmbedBuilder()
            .setColor(user.accentColor || 0x5865F2)
            .setTitle(`👤 Informazioni su ${user.username}`)
            .setThumbnail(user.displayAvatarURL({ dynamic: true }))
            .addFields(
                { name: '🆔 ID', value: user.id, inline: true },
                { name: '📅 Account creato', value: `<t:${Math.floor(user.createdTimestamp / 1000)}:R>`, inline: true },
                { name: '🤖 Bot', value: user.bot ? 'Sì' : 'No', inline: true }
            )
            .setFooter({ text: `Richiesto da ${interaction.user.username}`, iconURL: interaction.user.displayAvatarURL() })
            .setTimestamp();

        if (member) {
            userEmbed.addFields(
                { name: '📥 Entrato nel server', value: `<t:${Math.floor(member.joinedTimestamp / 1000)}:R>`, inline: true },
                { name: '🎭 Ruoli', value: member.roles.cache.size > 1 ? member.roles.cache.map(r => r.toString()).slice(0, 10).join(', ') : 'Nessun ruolo', inline: false }
            );
        }

        await interaction.reply({ embeds: [userEmbed] });
    }
};




