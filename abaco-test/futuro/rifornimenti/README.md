# 🧾 Gestore Rifornimenti

Gestore automatico per scontrini di rifornimenti (benzina/GPL) con ordinamento automatico per data. Applicazione web standalone che funziona completamente nel browser.

## 📋 Descrizione

Questo tool ti permette di gestire i rifornimenti in modo completamente automatico. Puoi inserire i dati in qualsiasi ordine e l'applicazione li riordinerà automaticamente per data cronologica. I dati vengono salvati localmente nel browser.

## ✨ Caratteristiche

- ✅ **Input casuale**: Inserisci i rifornimenti in qualsiasi ordine
- ✅ **Ordinamento automatico**: Riordina tutto per data cronologica
- ✅ **Aggiornamento in tempo reale**: Si aggiorna automaticamente ad ogni modifica
- ✅ **Distinzione carburante**: Mostra chiaramente se è benzina o GPL
- ✅ **Salvataggio automatico**: I dati vengono salvati nel browser (localStorage)
- ✅ **Nessun intervento manuale**: Non serve copia/incolla o ordinamenti manuali
- ✅ **Statistiche**: Mostra totale speso, media per rifornimento, conteggi carburante
- ✅ **Modifica ed Elimina**: Gestisci facilmente i tuoi rifornimenti
- ✅ **Esporta/Importa**: Backup e ripristino dei dati in formato JSON

## 🚀 Come Usare

1. Apri la pagina del tool
2. Inserisci:
   - **Data del rifornimento** (seleziona dal calendario)
   - **Costo** (in euro, es: 45.50)
   - **Spunta la casella** se è benzina (lascia vuoto per GPL)
3. Clicca "Aggiungi Rifornimento"
4. I dati vengono ordinati automaticamente per data

### Funzionalità Avanzate

- **Modifica**: Clicca "Modifica" su un rifornimento per modificarlo
- **Elimina**: Clicca "Elimina" per rimuovere un rifornimento
- **Esporta Dati**: Scarica un backup JSON dei tuoi rifornimenti
- **Importa Dati**: Carica un backup JSON per ripristinare i dati
- **Elimina Tutti**: Rimuove tutti i rifornimenti (richiede conferma)

## 💾 Salvataggio Dati

I dati vengono salvati automaticamente nel browser usando `localStorage`. Questo significa:

- ✅ I dati persistono anche dopo aver chiuso il browser
- ✅ Non serve connessione internet (dopo il primo caricamento)
- ✅ I dati sono legati al browser/dispositivo utilizzato
- ⚠️ Se cancelli i dati del browser, perderai i rifornimenti salvati

**Consiglio**: Usa la funzione "Esporta Dati" periodicamente per creare un backup!

## 📁 Struttura File

- `index.html` - Applicazione web completa (HTML, CSS, JavaScript)
- `README.md` - Questo file

## 🔗 Link

- **URL Tool**: `sevc0n.github.io/futuro/rifornimenti/`

## 🎯 Requisiti

- Browser moderno con supporto a:
  - localStorage
  - ES6+ JavaScript
  - CSS Grid e Flexbox

## 📝 Note Tecniche

- I dati vengono ordinati automaticamente per data ogni volta che vengono salvati
- Le date vengono formattate in formato italiano (DD/MM/YYYY)
- Il formato di esportazione è JSON standard, facilmente leggibile e modificabile

## 🔒 Privacy

Tutti i dati vengono salvati esclusivamente nel browser locale. Nessun dato viene inviato a server esterni o condiviso con terze parti.

## 📝 Licenza

Creato da piccionenberg per Sevcon Tools.
