# Sevcon Tools — copia di test

Copia sperimentale completa del sito Sevcon.

## Strumenti
- abaco/ — Abaco Divisore
- calcolatore-prezzi/ — Calcolo costi di materiali e pozioni
- analizzatore-liste/ — OCR e unificazione liste
- colorante-armatura/ — Conversione HEX in coloranti Minecraft
- misuratore-blocchi/ — Misure su immagini calibrate
- lavagnette/ — Conversione immagini nella palette Minecraft
- calici/ — Promemoria Discord
- futuro/rifornimenti/ — Gestione rifornimenti e statistiche

## Isolamento test
- Abaco e Gestore Rifornimenti usano chiavi localStorage dedicate.
- Calici punta a /abaco-test/api/reminders: serve un backend di test separato e non chiama l'endpoint live /api/reminders.
- I sorgenti del bot sono inclusi, ma GitHub Pages pubblica solo file statici e non esegue Node.js.
- I file originali fuori da questa cartella restano invariati.
