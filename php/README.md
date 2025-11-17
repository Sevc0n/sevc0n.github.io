# Versione PHP del Sito Sevcon Tools

Questa cartella contiene la versione PHP del sito Sevcon Tools.

## Struttura

- `index.php` - Homepage principale
- `futuro/calcolatore-prezzi.php` - Calcolatore prezzi materiali
- `futuro/prezzi-borgo.json` - Prezziario del borgo
- `futuro/prezzi-esterno.json` - Prezziario esterno

## Requisiti

- Server web con supporto PHP (PHP 7.0 o superiore)
- Server web configurato (Apache, Nginx, o server PHP integrato)

## Installazione

1. Assicurati di avere PHP installato sul tuo sistema
2. Copia questa cartella sul tuo server web
3. Accedi al sito tramite il browser

### Server PHP Integrato (per test locali)

Per testare localmente, puoi usare il server PHP integrato:

```bash
cd php
php -S localhost:8000
```

Poi apri il browser su `http://localhost:8000`

## Differenze dalla versione HTML

- I file sono stati convertiti da `.html` a `.php`
- Utilizzo di variabili PHP per titoli e date dinamiche
- I file JSON vengono letti tramite JavaScript fetch (come nella versione HTML)
- Stessa funzionalità e design della versione HTML

## Note

- I file JSON devono essere nella stessa posizione relativa rispetto ai file PHP
- Le immagini e le risorse statiche (logo.png) devono essere accessibili dalla cartella principale
- Il codice JavaScript rimane identico alla versione HTML

