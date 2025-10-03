# 🔧 Setup Cloud Storage con GitHub API

## 📋 **PASSI PER CONFIGURARE IL SISTEMA:**

### **1. Crea Repository Privata su GitHub:**
1. Vai su [GitHub.com](https://github.com) → **New Repository**
2. **Nome repository**: `sevc0n-files` (o nome a tua scelta)
3. **Privacy**: ✅ **Private** (IMPORTANTE!)
4. **Initialize**: ❌ NON spuntare "Add README"
5. **Clicca "Create repository"**

### **2. Crea Personal Access Token:**
1. **GitHub** → **Settings** → **Developer settings** → **Personal access tokens** → **Tokens (classic)**
2. **Generate new token (classic)**
3. **Nome**: `Cloud Storage Admin`
4. **Scadenza**: `No expiration` (o a tua scelta)
5. **Permessi necessari**:
   - ✅ `repo` (Full control of private repositories)
6. **Generate token** → **COPIA IL TOKEN** (lo vedi solo una volta!)

### **3. Configura il Sistema:**
Apri il file `config.js` e sostituisci:

```javascript
const CONFIG = {
    github: {
        username: 'TUO_USERNAME',        // ← Il tuo username GitHub
        repo: 'sevc0n-files',           // ← Nome repository che hai creato
        token: 'TUO_TOKEN',             // ← Il tuo Personal Access Token
        branch: 'main'
    },
    // ... resto della configurazione
};
```

### **4. Struttura Repository Automatica:**
Il sistema creerà automaticamente:
```
sevc0n-files/
├── uploads/
│   ├── public/          # File pubblici
│   └── secret/          # File segreti
└── README.md
```

## ✅ **VERIFICA CONFIGURAZIONE:**

1. **Apri** `download/admin/index.html`
2. **Se vedi l'alert** di configurazione → Configura `config.js`
3. **Se non vedi errori** → Sistema pronto!

## 🚀 **COME USARE:**

### **Upload File:**
1. Vai su **Admin Panel** → **Upload File**
2. **Trascina file** o **clicca per selezionare**
3. **Scegli destinazione**: Pubblica o Segreta
4. **Clicca upload** → File salvato nella repository privata!

### **Gestione File:**
1. **Admin Panel** → **Gestione File**
2. **Vedi tutti i file** caricati
3. **Modifica, Sposta, Elimina** file

### **Accesso File:**
- **File pubblici**: Accessibili da tutti
- **File segreti**: Solo con codice `MODPACK6804`

## 🔒 **SICUREZZA:**

- ✅ **Repository privata** = File invisibili su GitHub.com
- ✅ **Personal Access Token** = Solo tu puoi accedere
- ✅ **API calls** = File accessibili solo tramite codice
- ✅ **Zero costi** = Tutto gratuito

## 🆘 **PROBLEMI COMUNI:**

### **"Configurazione non valida"**
- Controlla `config.js`
- Verifica username, repository e token

### **"Errore upload"**
- Controlla permessi token
- Verifica che la repository esista

### **"File non trovati"**
- Verifica che la repository abbia la cartella `uploads/`
- Controlla i permessi del token

## 📞 **SUPPORTO:**

Se hai problemi:
1. **Controlla la console** del browser (F12)
2. **Verifica configurazione** in `config.js`
3. **Testa token** su [GitHub API](https://api.github.com/user)

---

**🎉 Una volta configurato, avrai un sistema di cloud storage completo e gratuito!**

