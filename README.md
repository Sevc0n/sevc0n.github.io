# 🛠️ Sevcon Tools

Raccolta di strumenti utili per la community gaming, creati da **piccionenberg**.

## 📁 Struttura del Sito

```
sevc0n.github.io/
├── index.html              # 🏠 Homepage principale
├── logo.png                # 🖼️ Logo Sevcon
├── README.md               # 📖 Questo file
├── abaco/                  # ⚒️ Abaco Divisore
│   ├── index.html         # Tool principale
│   ├── oggetti_abaco.json # Dati dei materiali
│   └── test-json.html     # Test accesso JSON
├── futuro/                 # 🔮 Tool Futuro 1
│   └── index.html         # Pagina placeholder
├── altro-tool/             # ⚡ Tool Futuro 2
│   └── index.html         # Pagina placeholder
├── nuovo-tool/             # 🌟 Tool Futuro 3
│   └── index.html         # Pagina placeholder
├── strumento/              # 🎯 Tool Futuro 4
│   └── index.html         # Pagina placeholder
└── ultimo-tool/            # 🚀 Tool Futuro 5
    └── index.html         # Pagina placeholder
```

## 🚀 Tool Disponibili

### ✅ **Abaco Divisore** (`/abaco/`)
- **Descrizione**: Divisore intelligente per bottini di abisso
- **Funzionalità**: Distribuisce automaticamente i materiali tra i partecipanti in modo equo e bilanciato
- **URL**: `sevc0n.github.io/abaco/`

### 🔮 **Tool Futuri** (In Progettazione)
- **Futuro**: `/futuro/` - Nuovo strumento in sviluppo
- **Altro Tool**: `/altro-tool/` - Nuovo strumento in sviluppo  
- **Nuovo Tool**: `/nuovo-tool/` - Nuovo strumento in sviluppo
- **Strumento**: `/strumento/` - Nuovo strumento in sviluppo
- **Ultimo Tool**: `/ultimo-tool/` - Nuovo strumento in sviluppo

> **Nota**: Tutte le directory dei tool futuri contengono già pagine placeholder funzionanti con navigazione completa.

## 🎯 Come Aggiungere Nuovi Tool

1. **Crea una nuova cartella** per il tool (es: `mio-tool/`)
2. **Aggiungi i file necessari**:
   - `index.html` - Interfaccia del tool
   - `config.json` - Configurazione (se necessaria)
   - Altri file specifici del tool
3. **Aggiorna la homepage** (`index.html`) per includere il nuovo tool
4. **Aggiorna questo README** con le informazioni del nuovo tool

## 🔗 Navigazione

- **Homepage**: `sevc0n.github.io/`
- **Abaco**: `sevc0n.github.io/abaco/`
- **Tool Futuri**: 
  - `sevc0n.github.io/futuro/`
  - `sevc0n.github.io/altro-tool/`
  - `sevc0n.github.io/nuovo-tool/`
  - `sevc0n.github.io/strumento/`
  - `sevc0n.github.io/ultimo-tool/`

> **Navigazione Completa**: Tutti i tool sono ora cliccabili dalla homepage e hanno pagine placeholder funzionanti.

## 🛠️ Risoluzione Problemi

### ❌ **Abaco non carica i dati**
Se l'abaco non riesce a caricare i dati dei materiali:

1. **Verifica accesso JSON**: Apri `sevc0n.github.io/abaco/test-json.html` per testare l'accesso al file
2. **Controlla console**: Apri gli strumenti sviluppatore (F12) e controlla la console per errori
3. **Ricarica dati**: Usa il pulsante "🔄 Ricarica Dati" nell'abaco
4. **Fallback automatico**: L'abaco ha un sistema di fallback che carica dati base se il JSON non è accessibile

### 🔍 **Debug e Log**
L'abaco ora include:
- Log dettagliati nella console del browser
- Test automatico di diversi percorsi per il file JSON
- Sistema di fallback con dati hardcoded
- Messaggi di errore chiari per l'utente

## 📞 Contatti

- **🎮 Discord**: `picciobeffa`
- **📱 Telegram**: `@piccionenberg`

---

© 2025 **Sevcon by piccionenberg** - Creato con ❤️ per la community gaming

