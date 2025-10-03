// Configurazione Cloud Storage
const CONFIG = {
    // GitHub Configuration
    github: {
        username: 'ORGANIZZAZIONE', // Nome dell'organizzazione GitHub
        repo: 'Storage_sito',       // Nome della repository nell'organizzazione
        token: 'TUO_TOKEN', // Il tuo Personal Access Token (inseriscilo in locale, non committare)
        branch: 'main'              // Branch principale
    },
    
    // File Paths
    paths: {
        public: 'uploads/public/',
        secret: 'uploads/secret/',
        temp: 'temp/'
    },
    
    // File Settings
    fileSettings: {
        maxFileSize: 100 * 1024 * 1024, // 100MB
        allowedTypes: [
            'image/jpeg', 'image/png', 'image/gif', 'image/webp',
            'application/pdf', 'text/plain', 'text/csv',
            'application/zip', 'application/x-rar-compressed',
            'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation'
        ],
        allowedExtensions: [
            '.jpg', '.jpeg', '.png', '.gif', '.webp',
            '.pdf', '.txt', '.csv', '.doc', '.docx',
            '.xls', '.xlsx', '.ppt', '.pptx',
            '.zip', '.rar', '.7z'
        ]
    },
    
    // UI Settings
    ui: {
        itemsPerPage: 20,
        showFileSize: true,
        showUploadDate: true,
        enableDragDrop: true
    }
};

// Funzione per aggiornare la configurazione
function updateConfig(newConfig) {
    Object.assign(CONFIG, newConfig);
    localStorage.setItem('cloudStorageConfig', JSON.stringify(CONFIG));
}

// Funzione per caricare la configurazione salvata
function loadConfig() {
    const saved = localStorage.getItem('cloudStorageConfig');
    if (saved) {
        const savedConfig = JSON.parse(saved);
        Object.assign(CONFIG, savedConfig);
    }
}

// Funzione per validare la configurazione
function validateConfig() {
    const errors = [];
    
    if (!CONFIG.github.username || CONFIG.github.username === 'TUO_USERNAME') {
        errors.push('Username GitHub non configurato');
    }
    
    if (!CONFIG.github.repo || CONFIG.github.repo === 'sevc0n-files') {
        errors.push('Nome repository non configurato');
    }
    
    if (!CONFIG.github.token || CONFIG.github.token === 'TUO_TOKEN') {
        errors.push('Token GitHub non configurato');
    }
    
    return {
        valid: errors.length === 0,
        errors: errors
    };
}

// Export per uso globale
window.CONFIG = CONFIG;
window.updateConfig = updateConfig;
window.loadConfig = loadConfig;
window.validateConfig = validateConfig;

// Carica configurazione all'avvio
loadConfig();
