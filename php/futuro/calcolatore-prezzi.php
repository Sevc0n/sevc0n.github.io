<?php
$pageTitle = "Calcolatore Prezzi Materiali - Abaco";
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <link rel="icon" type="image/png" href="../logo.png">
  <link rel="shortcut icon" type="image/png" href="../logo.png">
  <link rel="apple-touch-icon" href="../logo.png">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      overflow-x: hidden;
      max-width: 100vw;
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
      min-height: 100vh;
      padding: 20px;
      color: #ffffff;
    }

    .container {
      max-width: 1000px;
      margin: 0 auto;
      background: rgba(26, 26, 46, 0.95);
      backdrop-filter: blur(15px);
      border-radius: 25px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.6);
      overflow: hidden;
      border: 1px solid rgba(255, 255, 255, 0.15);
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    header {
      background: linear-gradient(135deg, #1a1a2e, #16213e);
      color: white;
      padding: 35px;
      text-align: center;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      position: relative;
    }

    h1 {
      font-size: 2.5rem;
      font-weight: 800;
      margin-bottom: 10px;
      background: linear-gradient(45deg, #ff6b6b, #ffd93d);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .subtitle {
      font-size: 1.2rem;
      opacity: 0.9;
      font-weight: 300;
    }

    main {
      padding: 40px;
    }

    .card {
      background: rgba(16, 185, 129, 0.1);
      border: 1px solid rgba(16, 185, 129, 0.3);
      border-radius: 20px;
      padding: 35px;
      margin-bottom: 35px;
      box-shadow: 0 8px 25px rgba(16, 185, 129, 0.2);
      transition: all 0.3s ease;
    }

    .card:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(16, 185, 129, 0.3);
    }

    .card h2 {
      color: #10b981;
      margin-bottom: 20px;
      font-size: 1.8rem;
      font-weight: 700;
      text-align: center;
    }

    .category-section {
      margin-bottom: 30px;
      overflow: hidden;
    }

    .category-title {
      font-size: 1.2rem;
      font-weight: 600;
      color: #63b3ed;
      margin-bottom: 15px;
      padding: 10px 0;
      border-bottom: 1px solid rgba(99, 179, 237, 0.3);
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .subcategoryDiv {
      margin-bottom: 20px;
      overflow: hidden;
    }

    .products-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 12px;
    }

    @media (min-width: 1024px) {
      .products-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    .subcategoryTitle {
      font-size: 1rem;
      color: #a0aec0;
      margin-bottom: 10px;
      font-weight: 500;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .product {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px;
      background: rgba(50, 130, 184, 0.1);
      border: 1px solid rgba(50, 130, 184, 0.3);
      border-radius: 12px;
      transition: all 0.3s ease;
    }

    .product:hover {
      background: rgba(50, 130, 184, 0.15);
      transform: translateX(5px);
      box-shadow: 0 5px 15px rgba(50, 130, 184, 0.3);
    }

    .product-info {
      flex: 1;
      min-width: 0;
      overflow: hidden;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .product-details {
      flex: 1;
      min-width: 0;
    }

    .product-name {
      font-weight: 500;
      color: #ffffff;
      margin-bottom: 4px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .product-price {
      font-weight: 600;
      color: #68d391;
      font-size: 0.9rem;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    .tier-badge {
      display: inline-block;
      padding: 2px 8px;
      border-radius: 12px;
      font-size: 0.7rem;
      font-weight: 600;
      margin-left: 8px;
    }

    .tier-novizio { background: #a0aec0; color: #2d3748; }
    .tier-avanzato { background: #ed8936; color: white; }
    .tier-esperto { background: #718096; color: white; }
    .tier-custode { background: #d69e2e; color: white; }
    .tier-maestro { background: #4299e1; color: white; }
    .tier-tutti { background: linear-gradient(135deg, #667eea, #764ba2); color: white; }
    .tier-base { background: #a0aec0; color: #2d3748; }

    .quantity-container {
      display: flex;
      align-items: center;
      gap: 5px;
      flex-shrink: 0;
    }

    .quantity-btn {
      width: 32px;
      height: 32px;
      border: 2px solid #3282b8;
      background: rgba(50, 130, 184, 0.2);
      color: #3282b8;
      border-radius: 50%;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 16px;
      transition: all 0.3s ease;
    }

    .quantity-btn:hover {
      background: #3282b8;
      color: white;
      transform: scale(1.1);
    }

    .quantity-btn:active {
      transform: scale(0.95);
    }

    .quantity-input {
      width: 80px;
      padding: 8px;
      text-align: center;
      border: 2px solid rgba(255, 255, 255, 0.2);
      border-radius: 8px;
      font-size: 14px;
      background: rgba(255, 255, 255, 0.1);
      color: #ffffff;
      -moz-appearance: textfield;
      appearance: textfield;
      transition: all 0.3s ease;
    }

    .quantity-input::-webkit-outer-spin-button,
    .quantity-input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .quantity-input:focus {
      outline: none;
      border-color: #3282b8;
      background: rgba(255, 255, 255, 0.15);
      box-shadow: 0 0 0 3px rgba(50, 130, 184, 0.2);
    }

    .total-card {
      background: rgba(237, 137, 54, 0.1);
      border: 1px solid rgba(237, 137, 54, 0.3);
      border-radius: 20px;
      padding: 35px;
      margin-bottom: 35px;
      box-shadow: 0 8px 25px rgba(237, 137, 54, 0.2);
      text-align: center;
    }

    .total-card h2 {
      color: #ed8936;
      margin-bottom: 20px;
      font-size: 1.8rem;
      font-weight: 700;
    }

    .total-amount {
      font-size: 3rem;
      font-weight: 800;
      margin: 20px 0;
      padding: 20px;
      background: rgba(0, 0, 0, 0.2);
      border-radius: 15px;
      border: 2px solid rgba(237, 137, 54, 0.5);
    }

    .currency-br {
      color: #68d391;
      font-weight: 600;
    }
    
    .currency-a {
      color: #c0c0c0;
      font-weight: 600;
    }
    
    .currency-mixed {
      color: #68d391;
      font-weight: 600;
    }

    .logo {
      width: 40px;
      height: 40px;
      margin-right: 15px;
      vertical-align: middle;
    }

    .loading {
      text-align: center;
      color: #a0aec0;
      padding: 40px;
      font-style: italic;
      overflow: hidden;
    }

    .error {
      text-align: center;
      color: #f56565;
      padding: 20px;
      background: rgba(245, 101, 101, 0.1);
      border-radius: 8px;
      border: 1px solid rgba(245, 101, 101, 0.3);
      overflow: hidden;
    }

    .warning {
      text-align: center;
      color: #ed8936;
      padding: 20px;
      background: rgba(237, 137, 54, 0.1);
      border-radius: 8px;
      border: 1px solid rgba(237, 137, 54, 0.3);
      overflow: hidden;
    }

    .contacts-section {
      background: rgba(30, 35, 55, 0.8);
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      padding: 20px 40px;
      text-align: center;
      margin-top: 30px;
      overflow: hidden;
    }
 
     .contacts-title {
       color: #63b3ed;
       font-size: 1.1rem;
       margin-bottom: 15px;
       font-weight: 600;
     }
 
     .contact-item {
       display: inline-block;
       margin: 0 15px 8px 0;
       padding: 8px 16px;
       background: rgba(99, 179, 237, 0.1);
       border: 1px solid rgba(99, 179, 237, 0.3);
       border-radius: 20px;
       color: #ffffff;
       text-decoration: none;
       transition: all 0.3s ease;
       font-weight: 500;
       font-size: 0.9rem;
       overflow: hidden;
     }
 
     .contact-item:hover {
       background: rgba(99, 179, 237, 0.2);
       border-color: rgba(99, 179, 237, 0.5);
       transform: translateY(-2px);
     }
 
     .contact-item strong {
       color: #63b3ed;
     }

    .reset-btn {
      background: linear-gradient(135deg, #f56565, #e53e3e);
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      font-weight: 600;
      margin-top: 15px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(245, 101, 101, 0.3);
    }

    .reset-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 18px rgba(245, 101, 101, 0.4);
    }

    .reset-btn:active {
      transform: translateY(0);
    }

    .pricebook-selector {
      margin-bottom: 25px;
      padding: 20px;
      background: rgba(0, 0, 0, 0.2);
      border-radius: 12px;
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .pricebook-label {
      display: block;
      font-size: 1rem;
      font-weight: 600;
      color: #63b3ed;
      margin-bottom: 12px;
      text-align: center;
    }

    .pricebook-switch {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 15px;
    }

    .toggle-switch {
      position: relative;
      display: inline-block;
      width: 80px;
      height: 36px;
    }

    .toggle-switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .toggle-slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(50, 130, 184, 0.2);
      border: 2px solid rgba(50, 130, 184, 0.5);
      transition: 0.4s;
      border-radius: 36px;
    }

    .toggle-slider:before {
      position: absolute;
      content: "";
      height: 28px;
      width: 28px;
      left: 3px;
      bottom: 3px;
      background-color: #ffffff;
      transition: 0.4s;
      border-radius: 50%;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .toggle-switch input:checked + .toggle-slider {
      background-color: rgba(50, 130, 184, 0.4);
      border-color: #3282b8;
    }

    .toggle-switch input:checked + .toggle-slider:before {
      transform: translateX(44px);
    }

    .toggle-label {
      font-size: 0.9rem;
      font-weight: 600;
      color: #ffffff;
      min-width: 70px;
      text-align: center;
    }

    .toggle-label-left {
      color: #a0aec0;
    }

    .toggle-label-right {
      color: #63b3ed;
    }

    .potions-section {
      margin-top: 25px;
      padding: 20px;
      background: rgba(16, 185, 129, 0.1);
      border: 1px solid rgba(16, 185, 129, 0.3);
      border-radius: 12px;
      display: none;
    }

    .potions-section.visible {
      display: block;
    }

    .potions-title {
      font-size: 1.2rem;
      font-weight: 600;
      color: #10b981;
      margin-bottom: 15px;
      text-align: center;
    }

    .potion-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 10px 0;
      padding: 12px;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 8px;
    }

    .potion-name {
      font-weight: 500;
      color: #ffffff;
      flex: 1;
    }

    .potion-price {
      font-weight: 600;
      color: #68d391;
      font-size: 0.9rem;
      margin-right: 15px;
    }

    .potion-quantity {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .potion-qty-input {
      width: 60px;
      padding: 6px;
      text-align: center;
      border: 2px solid rgba(255, 255, 255, 0.2);
      border-radius: 6px;
      font-size: 14px;
      background: rgba(255, 255, 255, 0.1);
      color: #ffffff;
      -moz-appearance: textfield;
      appearance: textfield;
    }

    .potion-qty-input::-webkit-outer-spin-button,
    .potion-qty-input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .potion-qty-btn {
      width: 28px;
      height: 28px;
      border: 2px solid #3282b8;
      background: rgba(50, 130, 184, 0.2);
      color: #3282b8;
      border-radius: 50%;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    .potion-qty-btn:hover {
      background: #3282b8;
      color: white;
      transform: scale(1.1);
    }

    .list-btn {
      background: rgba(99, 179, 237, 0.2);
      border: 1px solid rgba(99, 179, 237, 0.5);
      color: #63b3ed;
      padding: 8px 16px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 0.9rem;
      font-weight: 600;
      transition: all 0.3s ease;
      margin-left: 10px;
    }

    .list-btn:hover {
      background: rgba(99, 179, 237, 0.3);
      border-color: rgba(99, 179, 237, 0.7);
      transform: translateY(-2px);
    }

    .list-modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      backdrop-filter: blur(5px);
    }

    .list-modal-content {
      background: rgba(26, 26, 46, 0.95);
      backdrop-filter: blur(15px);
      margin: 5% auto;
      padding: 30px;
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 20px;
      width: 90%;
      max-width: 600px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.6);
    }

    .list-modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .list-modal-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: #63b3ed;
    }

    .close-modal {
      color: #aaa;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
      line-height: 1;
    }

    .close-modal:hover {
      color: #fff;
    }

    .list-textarea {
      width: 100%;
      min-height: 300px;
      padding: 15px;
      border: 2px solid rgba(99, 179, 237, 0.3);
      border-radius: 10px;
      background: rgba(0, 0, 0, 0.3);
      color: #ffffff;
      font-size: 14px;
      font-family: 'Courier New', monospace;
      resize: vertical;
      margin-bottom: 15px;
    }

    .list-textarea:focus {
      outline: none;
      border-color: #63b3ed;
    }

    .copy-btn {
      background: linear-gradient(135deg, #10b981, #059669);
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      font-weight: 600;
      transition: all 0.3s ease;
      width: 100%;
    }

    .copy-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 18px rgba(16, 185, 129, 0.4);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .product {
        flex-direction: column;
        align-items: stretch;
        gap: 10px;
        text-align: center;
      }
      
      .product-info {
        flex-direction: column;
        text-align: center;
      }
      
      .quantity-container {
        justify-content: center;
      }

      .total-amount {
        font-size: 2rem;
      }
    }

    @media (max-width: 480px) {
      .container {
        margin: 10px;
        border-radius: 15px;
      }
      
      header {
        padding: 20px;
      }
      
      h1 {
        font-size: 2rem;
      }
      
      main {
        padding: 20px;
      }
      
      .card {
        padding: 20px;
      }

      .total-amount {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1><img src="../logo.png" alt="Abaco Logo" class="logo" onerror="this.style.display='none';">Calcolatore Prezzi Materiali</h1>
      <p class="subtitle">Inserisci le quantità e calcola il prezzo totale</p>
      <a href="../index.php" style="position: absolute; top: 20px; right: 20px; color: #63b3ed; text-decoration: none; font-size: 0.9rem; padding: 8px 12px; border: 1px solid rgba(99, 179, 237, 0.3); border-radius: 8px; transition: all 0.3s ease; cursor: pointer; display: block; width: auto; height: auto; z-index: 10;" onmouseover="this.style.background='rgba(99, 179, 237, 0.1)'" onmouseout="this.style.background='transparent'">🏠 Homepage</a>
    </header>

    <main>
      <div class="total-card">
        <div class="pricebook-selector">
          <label class="pricebook-label">📋 Seleziona Prezziario:</label>
          <div class="pricebook-switch">
            <span class="toggle-label toggle-label-left" id="label-borgo">🏘️ Borgo</span>
            <label class="toggle-switch">
              <input type="checkbox" id="pricebook-toggle" onchange="togglePricebook()">
              <span class="toggle-slider"></span>
            </label>
            <span class="toggle-label toggle-label-right" id="label-esterno">🌍 Esterno</span>
          </div>
        </div>
        <div id="potions-section" class="potions-section">
          <h3 class="potions-title">
            🧪 Pozioni
            <button class="list-btn" onclick="generatePotionsList()">📋 Lista</button>
          </h3>
          <div id="potions-list"></div>
        </div>
        <h2>💰 Totale</h2>
        <div id="total-display" class="total-amount currency-mixed">0br</div>
        <button class="reset-btn" onclick="resetAll()">🔄 Reset Tutto</button>
      </div>

      <div class="card">
        <h2 style="text-align: center; position: relative;">
          Lista Materiali
          <div style="position: absolute; right: 0; top: 50%; transform: translateY(-50%); display: flex; gap: 8px; align-items: center;">
            <button class="list-btn" style="margin: 0; font-size: 0.8rem; padding: 5px 10px;" onclick="generateMaterialsList()">📋 Lista</button>
            <button id="reload-data" style="background: rgba(99, 179, 237, 0.2); border: 1px solid rgba(99, 179, 237, 0.5); color: #63b3ed; padding: 5px 10px; border-radius: 5px; cursor: pointer; font-size: 0.8rem;" onclick="reloadData()">🔄 Ricarica Dati</button>
          </div>
        </h2>
        <div id="product-list">
          <div class="loading">Caricamento materiali in corso...</div>
        </div>
      </div>
    </main>

    <div class="contacts-section">
      <div class="contacts-title">📞 Contatti</div>
      <div>
        <span class="contact-item">
          🎮 Discord: <strong>picciobeffa</strong>
        </span>
        <span class="contact-item">
          📱 Telegram: <strong>@piccionenberg</strong>
        </span>
      </div>
      <div style="margin-top: 20px; padding-top: 15px; border-top: 1px solid rgba(255, 255, 255, 0.1); display: flex; align-items: center; justify-content: center; gap: 10px; font-size: 0.9rem; color: #a0aec0;">
        <img src="../logo.png" alt="Sevcon Logo" style="width: 16px; height: 16px; border-radius: 3px;" onerror="this.style.display='none';">
        © 2025 Sevcon by piccionenberg - Creato con ❤️ e per noia
      </div>
    </div>
  </div>

  <!-- Modal per la lista -->
  <div id="list-modal" class="list-modal">
    <div class="list-modal-content">
      <div class="list-modal-header">
        <h3 class="list-modal-title" id="list-modal-title">Lista</h3>
        <span class="close-modal" onclick="closeListModal()">&times;</span>
      </div>
      <textarea id="list-textarea" class="list-textarea" readonly></textarea>
      <button class="copy-btn" onclick="copyList()">📋 Copia Lista</button>
    </div>
  </div>

  <script>
    let defaultProducts = [];
    let products = [];
    let currentPricebook = 'borgo'; // 'borgo' o 'esterno'
    
    // Prezzi delle pozioni in bronzini
    const potions = [
      { name: 'Cura 1', price: 2 },
      { name: 'Cura 2', price: 4 },
      { name: 'Antidoto', price: 2.5 },
      { name: 'Revivify', price: 3 },
      { name: 'Extinguish', price: 4 }
    ];
    
    let potionsQuantities = potions.map(() => 0);

    // Carica i prodotti dal file JSON
    async function loadProducts(pricebook = 'borgo') {
      const productList = document.getElementById("product-list");
      let jsonLoaded = false;
      
      productList.innerHTML = `
        <div class="loading">
          ⏳ Caricamento dati in corso...<br>
          <small>Connessione al database materiali</small>
        </div>
      `;
      
      try {
        console.log('=== DEBUG CARICAMENTO JSON ===');
        console.log('Tentativo di caricamento JSON da:', window.location.href);
        
        if (window.location.protocol === 'file:') {
          console.log('Rilevato protocollo file:// - problema CORS');
          throw new Error('CORS_BLOCKED');
        }
        
        const filename = pricebook === 'borgo' ? 'prezzi-borgo.json' : 'prezzi-esterno.json';
        const response = await fetch(`./${filename}`);
        
        if (!response.ok) {
          throw new Error(`HTTP ${response.status}: ${response.statusText}`);
        }
        
        const data = await response.json();
        console.log('JSON caricato con successo:', data);
        
        defaultProducts = data;
        products = [...defaultProducts.map(p => ({ ...p, qty: 0 }))];
        currentPricebook = pricebook;
        
        // Aggiorna lo stato visivo del toggle e delle etichette
        const toggle = document.getElementById('pricebook-toggle');
        if (toggle) {
          toggle.checked = (pricebook === 'esterno');
          updateToggleLabels(pricebook);
          togglePotionsSection();
        }
        
        renderMain();
        jsonLoaded = true;
        
      } catch (error) {
        console.error('Errore nel caricamento JSON:', error);
        
        if (error.message === 'CORS_BLOCKED') {
          productList.innerHTML = `
            <div class="warning">
              <h3>⚠️ Problema di Caricamento</h3>
              <p>Il file JSON non può essere caricato direttamente dal browser per motivi di sicurezza.</p>
              <p><strong>Soluzioni:</strong></p>
              <ul style="text-align: left; margin: 10px 0;">
                <li>Usa un server locale (es. Live Server in VS Code)</li>
                <li>Carica il file su un server web</li>
                <li>Oppure clicca il pulsante qui sotto per usare i dati di test</li>
              </ul>
              <button onclick="loadProductsFromFallback()" style="background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-size: 14px; margin-top: 10px;">
                Usa Dati di Test
              </button>
            </div>
          `;
        } else {
          productList.innerHTML = `
            <div class="error">
              <h3>❌ Errore di Caricamento</h3>
              <p>Impossibile caricare i dati dei materiali: ${error.message}</p>
              <button onclick="loadProductsFromFallback()" style="background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-size: 14px; margin-top: 10px;">
                Usa Dati di Test
              </button>
            </div>
          `;
        }
      }
    }

    function loadProductsFromFallback() {
      console.log('Caricamento dati di fallback...');
      const productList = document.getElementById("product-list");
      
      defaultProducts = [
        { name: "Brim", price: 50, category: "Reagenti", subcategory: "Novizio", tier: "Novizio" },
        { name: "Carne marcia", price: 75, category: "Reagenti", subcategory: "Novizio", tier: "Novizio" },
        { name: "Quarzo", price: 100, category: "Reagenti", subcategory: "Novizio", tier: "Novizio" },
        { name: "Therium", price: 125, category: "Reagenti", subcategory: "Novizio", tier: "Novizio" },
        { name: "Occhio di ragno", price: 200, category: "Reagenti", subcategory: "Avanzato", tier: "Avanzato" },
        { name: "Ametista", price: 250, category: "Reagenti", subcategory: "Avanzato", tier: "Avanzato" },
        { name: "Blaze Powder", price: 300, category: "Reagenti", subcategory: "Esperto", tier: "Esperto" },
        { name: "Membrana", price: 400, category: "Reagenti", subcategory: "Esperto", tier: "Esperto" },
        { name: "Slime Ball", price: 500, category: "Reagenti", subcategory: "Esperto", tier: "Esperto" },
        { name: "Prismarine Shard", price: 600, category: "Reagenti", subcategory: "Custode", tier: "Custode" },
        { name: "Lost Soul", price: 800, category: "Reagenti", subcategory: "Maestro", tier: "Maestro" },
        { name: "Demon Heart", price: 1000, category: "Reagenti", subcategory: "Maestro", tier: "Maestro" },
        { name: "Stagno", price: 30, category: "Metalli", subcategory: "Base", tier: "Base" }
      ];
         
      products = [...defaultProducts.map(p => ({ ...p, qty: 0 }))];
      renderMain();
      
      setTimeout(() => {
        productList.innerHTML = `
          <div class="loading">
            ✅ Dati di test caricati con successo!<br>
            <small>Ricarica la pagina per provare il caricamento JSON</small>
          </div>
        `;
        setTimeout(() => {
          renderMain();
        }, 2000);
      }, 1000);
    }

    function getTierClass(tier) {
      return `tier-${tier.toLowerCase()}`;
    }

    // Funzione per formattare la valuta (conversione automatica br -> a)
    function formatCurrency(value) {
      if (value >= 100) {
        const argenti = Math.floor(value / 100);
        const bronzini = value % 100;
        
        if (bronzini === 0) {
          return `${argenti}a`;
        } else {
          const bronziniDisplay = (bronzini % 1 === 0) ? bronzini.toString() : bronzini.toFixed(1);
          return `${argenti}a ${bronziniDisplay}br`;
        }
      } else {
        const display = (value % 1 === 0) ? value.toString() : value.toFixed(1);
        return `${display}br`;
      }
    }

    // Funzione per applicare la classe CSS corretta in base al valore
    function getCurrencyClass(value) {
      if (value >= 100) {
        return 'currency-mixed';
      } else {
        return 'currency-br';
      }
    }

    function renderMain() {
      const productList = document.getElementById("product-list");
      productList.innerHTML = "";

      const categories = [...new Set(products.map(p => p.category))];
      
      categories.forEach(category => {
        const categoryDiv = document.createElement("div");
        categoryDiv.className = "category-section";
        
        const categoryTitle = document.createElement("h3");
        categoryTitle.className = "category-title";
        categoryTitle.textContent = category === "Cristalli" ? `Materiali dai ${category}` : category;
        categoryDiv.appendChild(categoryTitle);

        if (category === "Cristalli") {
          const subcategories = [...new Set(products.filter(p => p.category === category).map(p => p.subcategory))];
          
          subcategories.forEach(subcategory => {
            const subcategoryDiv = document.createElement("div");
            subcategoryDiv.className = "subcategoryDiv";
            subcategoryDiv.style.marginBottom = "20px";
            
            const subcategoryTitle = document.createElement("h4");
            subcategoryTitle.className = "subcategoryTitle";
            subcategoryTitle.textContent = subcategory;
            subcategoryDiv.appendChild(subcategoryTitle);
            
            const productsGrid = document.createElement("div");
            productsGrid.className = "products-grid";
            
            const subcategoryProducts = products.filter(p => p.category === category && p.subcategory === subcategory);
            
            subcategoryProducts.forEach((p) => {
              const globalIndex = products.indexOf(p);
              const div = createProductElement(p, globalIndex);
              productsGrid.appendChild(div);
            });
            
            subcategoryDiv.appendChild(productsGrid);
            categoryDiv.appendChild(subcategoryDiv);
          });
        } else {
          const productsGrid = document.createElement("div");
          productsGrid.className = "products-grid";
          
          const categoryProducts = products.filter(p => p.category === category);
          
          categoryProducts.forEach((p) => {
            const globalIndex = products.indexOf(p);
            const div = createProductElement(p, globalIndex);
            productsGrid.appendChild(div);
          });
          
          categoryDiv.appendChild(productsGrid);
        }
        
        productList.appendChild(categoryDiv);
      });

      updateTotal();
    }

    function createProductElement(p, globalIndex) {
      const div = document.createElement("div");
      div.className = "product";

      const productInfo = document.createElement("div");
      productInfo.className = "product-info";
      
      const productDetails = document.createElement("div");
      productDetails.className = "product-details";
      
      const name = document.createElement("div");
      name.className = "product-name";
      name.textContent = p.name;
      
      const tierBadge = document.createElement("span");
      tierBadge.className = `tier-badge ${getTierClass(p.tier)}`;
      tierBadge.textContent = p.tier;
      name.appendChild(tierBadge);
      
      const price = document.createElement("div");
      price.className = `product-price ${getCurrencyClass(p.price)}`;
      price.textContent = formatCurrency(p.price);
      
      productDetails.appendChild(name);
      productDetails.appendChild(price);
      
      productInfo.appendChild(productDetails);

      const quantityContainer = document.createElement("div");
      quantityContainer.className = "quantity-container";
      
      const minusBtn = document.createElement("button");
      minusBtn.className = "quantity-btn minus-btn";
      minusBtn.textContent = "-";
      minusBtn.addEventListener("click", () => {
        const currentValue = parseInt(qty.value) || 0;
        if (currentValue > 0) {
          qty.value = currentValue - 1;
          products[globalIndex].qty = currentValue - 1;
          updateTotal();
        }
      });

      const qty = document.createElement("input");
      qty.type = "number";
      qty.className = "quantity-input";
      qty.min = "0";
      qty.value = p.qty > 0 ? p.qty : "";
      qty.placeholder = "0";
      qty.addEventListener("input", () => {
        products[globalIndex].qty = parseInt(qty.value) || 0;
        updateTotal();
      });

      const plusBtn = document.createElement("button");
      plusBtn.className = "quantity-btn plus-btn";
      plusBtn.textContent = "+";
      plusBtn.addEventListener("click", () => {
        const currentValue = parseInt(qty.value) || 0;
        qty.value = currentValue + 1;
        products[globalIndex].qty = currentValue + 1;
        updateTotal();
      });

      quantityContainer.appendChild(minusBtn);
      quantityContainer.appendChild(qty);
      quantityContainer.appendChild(plusBtn);

      div.appendChild(productInfo);
      div.appendChild(quantityContainer);
      
      return div;
    }

    function updateTotal() {
      const materialsTotal = products.reduce((sum, p) => sum + (p.qty * p.price), 0);
      const potionsTotal = potionsQuantities.reduce((sum, qty, index) => sum + (qty * potions[index].price), 0);
      const total = materialsTotal - potionsTotal; // Sottrai le pozioni dal totale
      const totalDisplay = document.getElementById("total-display");
      totalDisplay.textContent = formatCurrency(total);
      totalDisplay.className = `total-amount ${getCurrencyClass(total)}`;
    }
    
    function renderPotions() {
      const potionsList = document.getElementById("potions-list");
      potionsList.innerHTML = "";
      
      potions.forEach((potion, index) => {
        const div = document.createElement("div");
        div.className = "potion-item";
        
        const name = document.createElement("div");
        name.className = "potion-name";
        name.textContent = potion.name;
        
        const price = document.createElement("div");
        price.className = "potion-price";
        price.textContent = formatCurrency(potion.price);
        
        const quantityContainer = document.createElement("div");
        quantityContainer.className = "potion-quantity";
        
        const minusBtn = document.createElement("button");
        minusBtn.className = "potion-qty-btn";
        minusBtn.textContent = "-";
        minusBtn.addEventListener("click", () => {
          if (potionsQuantities[index] > 0) {
            potionsQuantities[index]--;
            qty.value = potionsQuantities[index] || "";
            updateTotal();
          }
        });
        
        const qty = document.createElement("input");
        qty.type = "number";
        qty.className = "potion-qty-input";
        qty.min = "0";
        qty.value = potionsQuantities[index] > 0 ? potionsQuantities[index] : "";
        qty.placeholder = "0";
        qty.addEventListener("input", () => {
          potionsQuantities[index] = parseInt(qty.value) || 0;
          updateTotal();
        });
        
        const plusBtn = document.createElement("button");
        plusBtn.className = "potion-qty-btn";
        plusBtn.textContent = "+";
        plusBtn.addEventListener("click", () => {
          const currentValue = parseInt(qty.value) || 0;
          potionsQuantities[index] = currentValue + 1;
          qty.value = potionsQuantities[index];
          updateTotal();
        });
        
        quantityContainer.appendChild(minusBtn);
        quantityContainer.appendChild(qty);
        quantityContainer.appendChild(plusBtn);
        
        div.appendChild(name);
        div.appendChild(price);
        div.appendChild(quantityContainer);
        
        potionsList.appendChild(div);
      });
    }
    
    function togglePotionsSection() {
      const potionsSection = document.getElementById("potions-section");
      const toggle = document.getElementById("pricebook-toggle");
      
      if (!toggle.checked) { // Se borgo è selezionato (toggle non checked)
        potionsSection.classList.add("visible");
        renderPotions();
      } else {
        potionsSection.classList.remove("visible");
        // Reset delle quantità pozioni quando si cambia a esterno
        potionsQuantities = potions.map(() => 0);
        updateTotal();
      }
    }

    function resetAll() {
      products.forEach(p => p.qty = 0);
      potionsQuantities = potions.map(() => 0);
      renderMain();
      if (document.getElementById("potions-section").classList.contains("visible")) {
        renderPotions();
      }
      updateTotal();
    }

    async function reloadData() {
      const reloadButton = document.getElementById('reload-data');
      const originalText = reloadButton.innerHTML;
      
      reloadButton.innerHTML = '⏳ Caricando...';
      reloadButton.disabled = true;
      
      try {
        await loadProducts(currentPricebook);
        reloadButton.innerHTML = '✅ Ricaricato!';
        
        setTimeout(() => {
          reloadButton.innerHTML = originalText;
          reloadButton.disabled = false;
        }, 2000);
      } catch (error) {
        reloadButton.innerHTML = '❌ Errore';
        console.error('Errore nel ricaricamento:', error);
        
        setTimeout(() => {
          reloadButton.innerHTML = originalText;
          reloadButton.disabled = false;
        }, 3000);
      }
    }

    // Funzione per aggiornare le etichette del toggle
    function updateToggleLabels(pricebook) {
      const labelBorgo = document.getElementById('label-borgo');
      const labelEsterno = document.getElementById('label-esterno');
      
      if (pricebook === 'borgo') {
        labelBorgo.classList.remove('toggle-label-left');
        labelBorgo.classList.add('toggle-label-right');
        labelEsterno.classList.remove('toggle-label-right');
        labelEsterno.classList.add('toggle-label-left');
      } else {
        labelEsterno.classList.remove('toggle-label-left');
        labelEsterno.classList.add('toggle-label-right');
        labelBorgo.classList.remove('toggle-label-right');
        labelBorgo.classList.add('toggle-label-left');
      }
    }

    // Funzione per cambiare il prezziario tramite toggle
    async function togglePricebook() {
      const toggle = document.getElementById('pricebook-toggle');
      const pricebook = toggle.checked ? 'esterno' : 'borgo';
      
      // Aggiorna lo stato visivo delle etichette
      updateToggleLabels(pricebook);
      
      // Reset delle quantità prima di cambiare
      products.forEach(p => p.qty = 0);
      
      // Mostra/nascondi sezione pozioni
      togglePotionsSection();
      
      // Carica il nuovo prezziario
      await loadProducts(pricebook);
    }

    // Funzione per cambiare il prezziario (mantenuta per compatibilità)
    async function switchPricebook(pricebook) {
      const toggle = document.getElementById('pricebook-toggle');
      toggle.checked = (pricebook === 'esterno');
      await togglePricebook();
    }

    // Funzione per generare la lista dei materiali
    function generateMaterialsList() {
      const activeItems = products.filter(p => p.qty > 0);
      
      if (activeItems.length === 0) {
        alert('Nessun materiale selezionato!');
        return;
      }
      
      let listText = '';
      activeItems.forEach(item => {
        listText += `${item.qty}x ${item.name}\n`;
      });
      
      // Calcola il totale dei reagenti
      const materialsTotal = products.reduce((sum, p) => sum + (p.qty * p.price), 0);
      listText += `\nTotale: ${formatCurrency(materialsTotal)}`;
      
      showListModal('Lista Materiali', listText.trim());
    }
    
    // Funzione per generare la lista delle pozioni
    function generatePotionsList() {
      const activePotions = potionsQuantities
        .map((qty, index) => ({ qty, potion: potions[index] }))
        .filter(item => item.qty > 0);
      
      if (activePotions.length === 0) {
        alert('Nessuna pozione selezionata!');
        return;
      }
      
      let listText = '';
      activePotions.forEach(item => {
        listText += `${item.qty}x ${item.potion.name}\n`;
      });
      
      // Calcola i totali
      const materialsTotal = products.reduce((sum, p) => sum + (p.qty * p.price), 0);
      const potionsTotal = potionsQuantities.reduce((sum, qty, index) => sum + (qty * potions[index].price), 0);
      const finalTotal = materialsTotal - potionsTotal; // Totale materiali - totale pozioni
      
      // Formatta i numeri senza decimali se sono interi
      const potionsTotalFormatted = potionsTotal % 1 === 0 ? potionsTotal : potionsTotal.toFixed(1);
      const materialsTotalFormatted = materialsTotal % 1 === 0 ? materialsTotal : materialsTotal.toFixed(1);
      const finalTotalFormatted = finalTotal % 1 === 0 ? finalTotal : finalTotal.toFixed(1);
      
      listText += `\nTotale: ${potionsTotalFormatted} - ${materialsTotalFormatted} = ${finalTotalFormatted}`;
      
      showListModal('Lista Pozioni', listText.trim());
    }
    
    // Funzione per mostrare il modal con la lista
    function showListModal(title, text) {
      document.getElementById('list-modal-title').textContent = title;
      document.getElementById('list-textarea').value = text;
      document.getElementById('list-modal').style.display = 'block';
    }
    
    // Funzione per chiudere il modal
    function closeListModal() {
      document.getElementById('list-modal').style.display = 'none';
    }
    
    // Funzione per copiare la lista
    function copyList() {
      const textarea = document.getElementById('list-textarea');
      textarea.select();
      textarea.setSelectionRange(0, 99999); // Per mobile
      
      try {
        document.execCommand('copy');
        const copyBtn = document.querySelector('.copy-btn');
        const originalText = copyBtn.textContent;
        copyBtn.textContent = '✅ Copiato!';
        setTimeout(() => {
          copyBtn.textContent = originalText;
        }, 2000);
      } catch (err) {
        alert('Errore durante la copia. Seleziona manualmente il testo.');
      }
    }
    
    // Chiudi il modal cliccando fuori
    window.onclick = function(event) {
      const modal = document.getElementById('list-modal');
      if (event.target === modal) {
        closeListModal();
      }
    }

    // Inizializzazione
    loadProducts('borgo').then(() => {
      // Mostra la sezione pozioni se borgo è selezionato
      togglePotionsSection();
    });
  </script>
</body>
</html>

