# 🛠️ Sevcon Tools

Raccolta di strumenti utili per la community gaming, creati da **piccionenberg**.

## 📁 Struttura del Sito

```
sevc0n.github.io/
├── index.html              # 🏠 Homepage principale
├── accesso-test.html       # 🔐 Pagina di accesso nascosto
├── logo.png                # 🖼️ Logo Sevcon
├── README.md               # 📖 Questo file
├── abaco/                  # ⚒️ Abaco Divisore
│   ├── index.html         # Tool principale
│   ├── oggetti_abaco.json # Dati dei materiali
│   └── test-json.html     # Test accesso JSON
├── futuro/                 # 🔮 Sito di Test Mobile
│   ├── index.html         # Homepage mobile test
│   ├── logo.png           # Logo per test
│   ├── abaco/             # Abaco mobile test
│   │   ├── index.html     # Abaco ottimizzato mobile
│   │   └── oggetti_abaco.json # Dati materiali
│   ├── altro-tool/        # Pagine placeholder mobile
│   ├── nuovo-tool/        # Pagine placeholder mobile
│   ├── strumento/         # Pagine placeholder mobile
│   └── ultimo-tool/       # Pagine placeholder mobile
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
- **Caratteristiche**:
  - Caricamento automatico dati da JSON
  - Sistema di fallback con dati hardcoded
  - Distribuzione equa con gestione esubero
  - Interfaccia responsive per desktop

### 🔮 **Tool Futuri** (In Progettazione)
- **Futuro**: `/futuro/` - **SITO DI TEST MOBILE** (vedi sezione dedicata)
- **Altro Tool**: `/altro-tool/` - Nuovo strumento in sviluppo  
- **Nuovo Tool**: `/nuovo-tool/` - Nuovo strumento in sviluppo
- **Strumento**: `/strumento/` - Nuovo strumento in sviluppo
- **Ultimo Tool**: `/ultimo-tool/` - Nuovo strumento in sviluppo

> **Nota**: Tutte le directory dei tool futuri contengono già pagine placeholder funzionanti con navigazione completa.

## 🔐 Sistema di Accesso Nascosto

### **Come Accedere al Sito di Test Mobile**

Il sito include un sistema di accesso nascosto per testare le versioni mobile-optimized:

1. **Vai alla homepage**: `sevc0n.github.io/`
2. **Clicca il logo 5 volte** rapidamente (entro 3 secondi)
3. **Inserisci il codice**: `202501`
4. **Accedi al test mobile**: Vieni reindirizzato a `futuro/`

### **Caratteristiche del Sistema**
- ✅ **Doppia protezione**: Click sequenza + codice numerico
- ✅ **Timeout automatico**: 3 secondi per completare la sequenza
- ✅ **Feedback visivo**: Animazioni per ogni click
- ✅ **Debug console**: Log dettagliati per sviluppatori
- ✅ **Sicurezza**: Accesso solo a chi conosce la procedura

## 📱 Sito di Test Mobile (`/futuro/`)

### **Versione Mobile-Optimized Completa**

La cartella `futuro/` contiene una copia completa del sito ottimizzata per dispositivi mobili:

#### **🏠 Homepage Mobile** (`/futuro/`)
- Layout responsive con media queries avanzate
- Breakpoint specifici: 1200px, 768px, 480px, 360px
- Ottimizzazioni touch con feedback visivo
- Navigazione mobile-friendly

#### **⚒️ Abaco Mobile** (`/futuro/abaco/`)
- Form touch-friendly con input 44px minimi
- Griglia responsive che si adatta ai schermi piccoli
- Prevenzione zoom automatico su iOS
- Layout single-column per mobile
- Overflow completamente risolto

#### **📱 Pagine Placeholder Mobile**
- Tutte le pagine placeholder ottimizzate per mobile
- Pulsanti touch-friendly con dimensioni adeguate
- Layout centrato e responsive
- Interazioni touch ottimizzate

### **Caratteristiche Mobile**
- ✅ **Responsive Design**: Si adatta a tutti i dispositivi
- ✅ **Touch-Friendly**: Elementi cliccabili 44px minimi
- ✅ **Performance**: Ottimizzato per connessioni lente
- ✅ **Accessibilità**: Font-size e contrasti ottimizzati
- ✅ **Cross-Platform**: Funziona su iOS, Android, tablet

## 🎯 Come Aggiungere Nuovi Tool

1. **Crea una nuova cartella** per il tool (es: `mio-tool/`)
2. **Aggiungi i file necessari**:
   - `index.html` - Interfaccia del tool
   - `config.json` - Configurazione (se necessaria)
   - Altri file specifici del tool
3. **Aggiorna la homepage** (`index.html`) per includere il nuovo tool
4. **Crea versione mobile** in `futuro/mio-tool/` se necessario
5. **Aggiorna questo README** con le informazioni del nuovo tool

## 🔗 Navigazione

### **Sito Principale**
- **Homepage**: `sevc0n.github.io/`
- **Abaco**: `sevc0n.github.io/abaco/`
- **Tool Futuri**: 
  - `sevc0n.github.io/altro-tool/`
  - `sevc0n.github.io/nuovo-tool/`
  - `sevc0n.github.io/strumento/`
  - `sevc0n.github.io/ultimo-tool/`

### **Sito di Test Mobile** (Accesso Nascosto)
- **Homepage Mobile**: `sevc0n.github.io/futuro/`
- **Abaco Mobile**: `sevc0n.github.io/futuro/abaco/`
- **Tool Mobile**: 
  - `sevc0n.github.io/futuro/altro-tool/`
  - `sevc0n.github.io/futuro/nuovo-tool/`
  - `sevc0n.github.io/futuro/strumento/`
  - `sevc0n.github.io/futuro/ultimo-tool/`

> **Navigazione Completa**: Tutti i tool sono ora cliccabili dalla homepage e hanno pagine placeholder funzionanti.

## 🛠️ Risoluzione Problemi

### ❌ **Abaco non carica i dati**
Se l'abaco non riesce a caricare i dati dei materiali:

1. **Verifica accesso JSON**: Apri `sevc0n.github.io/abaco/test-json.html` per testare l'accesso al file
2. **Controlla console**: Apri gli strumenti sviluppatore (F12) e controlla la console per errori
3. **Ricarica dati**: Usa il pulsante "🔄 Ricarica Dati" nell'abaco
4. **Fallback automatico**: L'abaco ha un sistema di fallback che carica dati base se il JSON non è accessibile

### 📱 **Problemi Mobile**
Se riscontri problemi con la versione mobile:

1. **Testa il sito mobile**: Accedi tramite il sistema di accesso nascosto
2. **Verifica viewport**: Assicurati che il viewport sia configurato correttamente
3. **Controlla media queries**: Verifica che le media queries funzionino
4. **Testa su dispositivi reali**: Usa device toolbar o dispositivi fisici

### 🔍 **Debug e Log**
L'abaco ora include:
- Log dettagliati nella console del browser
- Test automatico di diversi percorsi per il file JSON
- Sistema di fallback con dati hardcoded
- Messaggi di errore chiari per l'utente
- Debug info per il sistema di accesso nascosto

## 🎨 Tecnologie Utilizzate

- **HTML5**: Struttura semantica e accessibile
- **CSS3**: 
  - Flexbox e CSS Grid per layout responsive
  - Media queries per dispositivi mobili
  - Animazioni e transizioni fluide
  - Variabili CSS per temi consistenti
- **JavaScript ES6+**:
  - Caricamento asincrono dei dati
  - Gestione eventi touch e mouse
  - Sistema di accesso nascosto
  - Fallback e gestione errori
- **JSON**: Configurazione e dati dei materiali

## 📊 Compatibilità

### **Browser Supportati**
- ✅ Chrome 80+
- ✅ Firefox 75+
- ✅ Safari 13+
- ✅ Edge 80+
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

### **Dispositivi Supportati**
- ✅ Desktop (1200px+)
- ✅ Laptop (1024px+)
- ✅ Tablet (768px+)
- ✅ Smartphone (480px+)
- ✅ Schermi piccoli (360px+)

## 🚀 Roadmap Futura

- [ ] **PWA Support**: Service Worker e installazione app
- [ ] **Dark/Light Mode**: Toggle tema automatico
- [ ] **Offline Support**: Funzionalità offline per abaco
- [ ] **Nuovi Tool**: Espansione della raccolta strumenti
- [ ] **API Integration**: Connessione con database esterni
- [ ] **Multi-language**: Supporto lingue multiple

## 📞 Contatti

- **🎮 Discord**: `picciobeffa`
- **📱 Telegram**: `@piccionenberg`

---

© 2025 **Sevcon by piccionenberg** - Creato con ❤️ per la community gaming

> **Versione**: 2.0 - Aggiunto sistema di accesso nascosto e ottimizzazioni mobile complete