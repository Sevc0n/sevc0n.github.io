const { SlashCommandBuilder, EmbedBuilder } = require('discord.js');

module.exports = {
    data: new SlashCommandBuilder()
        .setName('reminders')
        .setDescription('Mostra i tuoi reminder attivi')
        .addUserOption(option =>
            option.setName('utente')
                .setDescription('Utente di cui vedere i reminder (solo admin)')
                .setRequired(false)),
    
    async execute(interaction) {
        const reminderManager = interaction.client.reminderManager;
        
        if (!reminderManager) {
            await interaction.reply({ content: '❌ Reminder manager non disponibile', ephemeral: true });
            return;
        }

        const targetUser = interaction.options.getUser('utente');
        const userId = targetUser ? targetUser.id : interaction.user.id;

        // Controlla permessi (solo admin può vedere reminder di altri)
        if (targetUser && !interaction.member.permissions.has('Administrator')) {
            await interaction.reply({ content: '❌ Non hai i permessi per vedere i reminder di altri utenti', ephemeral: true });
            return;
        }

        const reminders = reminderManager.getRemindersByUser(userId);

        if (reminders.length === 0) {
            await interaction.reply({ 
                content: `📭 Nessun reminder attivo${targetUser ? ` per ${targetUser.username}` : ''}`,
                ephemeral: true 
            });
            return;
        }

        const embed = new EmbedBuilder()
            .setColor(0x667eea)
            .setTitle(`⏰ Reminder Attivi${targetUser ? ` - ${targetUser.username}` : ''}`)
            .setTimestamp();

        const remindersList = reminders.map(reminder => {
            const scadenza = new Date(reminder.scadenza);
            const now = new Date();
            const diff = scadenza - now;
            const hours = Math.floor(diff / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));

            let timeRemaining = '';
            if (diff > 0) {
                if (hours > 0) {
                    timeRemaining = `${hours}h ${minutes}m`;
                } else {
                    timeRemaining = `${minutes}m`;
                }
            } else {
                timeRemaining = 'SCADUTO';
            }

            const notifiche = `${reminder.notificato24h ? '✅' : '⏳'} 24h | ${reminder.notificato12h ? '✅' : '⏳'} 12h`;

            return {
                name: `📅 ${scadenza.toLocaleString('it-IT', { 
                    day: '2-digit', 
                    month: '2-digit', 
                    hour: '2-digit', 
                    minute: '2-digit' 
                })}`,
                value: `💬 ${reminder.messaggio}\n⏱️ ${timeRemaining} rimanenti\n${notifiche}`,
                inline: false
            };
        });

        embed.addFields(remindersList);

        await interaction.reply({ embeds: [embed], ephemeral: true });
    }
};


