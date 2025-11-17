<?php
$pageTitle = "Sevcon Tools - Homepage";
$pageDescription = "Raccolta di strumenti utili per Elysiumcraft";
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

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
      min-height: 100vh;
      padding: 20px;
      color: #ffffff;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      background: rgba(20, 25, 45, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
      overflow: hidden;
      animation: slideIn 0.6s ease-out;
      border: 1px solid rgba(255, 255, 255, 0.1);
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

    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }

    header {
      background: linear-gradient(135deg, #2d3748, #4a5568);
      color: white;
      padding: 40px 30px;
      text-align: center;
      position: relative;
      overflow: hidden;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    header::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.05) 0%, transparent 70%);
      animation: pulse 4s ease-in-out infinite;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); opacity: 0.3; }
      50% { transform: scale(1.1); opacity: 0.6; }
    }

    h1 {
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 10px;
      position: relative;
      z-index: 1;
    }

    .subtitle {
      font-size: 1.3rem;
      opacity: 0.8;
      position: relative;
      z-index: 1;
      margin-bottom: 20px;
    }

    .logo {
      width: 60px;
      height: 60px;
      margin-right: 20px;
      vertical-align: middle;
      border-radius: 12px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .logo:hover {
      transform: scale(1);
      box-shadow: none;
    }

    .logo:active {
      transform: scale(0.95);
    }

    main {
      padding: 40px;
    }

    .tools-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
      margin-bottom: 40px;
    }

    .tool-card {
      background: rgba(45, 55, 72, 0.6);
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      border: 1px solid rgba(255, 255, 255, 0.1);
      transition: all 0.3s ease;
      cursor: pointer;
      position: relative;
      overflow: hidden;
    }

    .tool-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(99, 179, 237, 0.1), transparent);
      transition: left 0.5s ease;
    }

    .tool-card:hover::before {
      left: 100%;
    }

    .tool-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
      border-color: rgba(99, 179, 237, 0.5);
    }

    .tool-card.available {
      background: linear-gradient(135deg, rgba(72, 187, 120, 0.2), rgba(56, 178, 172, 0.2));
      border-color: rgba(72, 187, 120, 0.3);
    }

    .tool-card.coming-soon {
      background: linear-gradient(135deg, rgba(156, 163, 175, 0.2), rgba(107, 114, 128, 0.2));
      border-color: rgba(156, 163, 175, 0.3);
      opacity: 0.7;
      cursor: pointer;
    }

    .tool-icon {
      font-size: 3rem;
      margin-bottom: 20px;
      display: block;
    }

    .tool-title {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 15px;
      color: #ffffff;
    }

    .tool-description {
      color: #a0aec0;
      line-height: 1.6;
      margin-bottom: 20px;
    }

    .tool-status {
      display: inline-block;
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .status-available {
      background: rgba(72, 187, 120, 0.3);
      color: #68d391;
      border: 1px solid rgba(72, 187, 120, 0.5);
    }

    .status-coming-soon {
      background: rgba(156, 163, 175, 0.3);
      color: #a0aec0;
      border: 1px solid rgba(156, 163, 175, 0.5);
    }

    .contacts-section {
      background: rgba(30, 35, 55, 0.8);
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      padding: 30px 40px;
      text-align: center;
      margin-top: 40px;
    }

    .contacts-title {
      color: #63b3ed;
      font-size: 1.2rem;
      margin-bottom: 20px;
      font-weight: 600;
    }

    .contact-item {
      display: inline-block;
      margin: 0 20px 10px 0;
      padding: 10px 20px;
      background: rgba(99, 179, 237, 0.1);
      border: 1px solid rgba(99, 179, 237, 0.3);
      border-radius: 25px;
      color: #ffffff;
      text-decoration: none;
      transition: all 0.3s ease;
      font-weight: 500;
      font-size: 1rem;
    }

    .contact-item:hover {
      background: rgba(99, 179, 237, 0.2);
      border-color: rgba(99, 179, 237, 0.5);
      transform: translateY(-2px);
    }

    .contact-item strong {
      color: #63b3ed;
    }

    .footer {
      text-align: center;
      padding: 20px;
      color: #a0aec0;
      font-size: 0.9rem;
    }

    .github-button {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 6px 12px;
      background: rgba(36, 41, 46, 0.8);
      color: #ffffff;
      text-decoration: none;
      border-radius: 6px;
      font-size: 0.8rem;
      border: 1px solid rgba(255, 255, 255, 0.1);
      transition: all 0.3s ease;
      font-family: 'Courier New', monospace;
    }

    .github-button:hover {
      background: rgba(36, 41, 46, 1);
      border-color: rgba(255, 255, 255, 0.3);
      transform: translateY(-1px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .github-button svg {
      flex-shrink: 0;
    }

    @media (max-width: 768px) {
      h1 {
        font-size: 2rem;
      }
      
      .subtitle {
        font-size: 1.1rem;
      }
      
      .tools-grid {
        grid-template-columns: 1fr;
        gap: 20px;
      }
      
      .tool-card {
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>
        <img src="../logo.png" alt="Sevcon Logo" class="logo" id="logoClick" onerror="this.style.display='none';">
        Sevcon Tools
      </h1>
      <p class="subtitle"><?php echo $pageDescription; ?></p>
    </header>

    <main>
      <div class="tools-grid">
        <!-- Abaco Divisore -->
        <div class="tool-card available" onclick="window.location.href='abaco/'">
          <span class="tool-icon">⚒️</span>
          <h3 class="tool-title">Abaco Divisore</h3>
          <p class="tool-description">
            Divisore intelligente per bottini di abisso. Distribuisce automaticamente i materiali tra i partecipanti in modo equo e bilanciato.
          </p>
          <span class="tool-status status-available">Disponibile</span>
        </div>

        <!-- Placeholder 2 -->
        <div class="tool-card coming-soon" onclick="window.location.href='altro-tool/'">
          <span class="tool-icon">⚡</span>
          <h3 class="tool-title">[REDACTED]</h3>
          <p class="tool-description">
            prossimamente...
          </p>
          <span class="tool-status status-coming-soon">In Progettazione</span>
        </div>

        <!-- Placeholder 3 -->
        <div class="tool-card coming-soon" onclick="window.location.href='nuovo-tool/'">
          <span class="tool-icon">🌟</span>
          <h3 class="tool-title">[REDACTED]</h3>
          <p class="tool-description">
            prossimamente...
          </p>
          <span class="tool-status status-coming-soon">In Progettazione</span>
        </div>

        <!-- Placeholder 4 -->
        <div class="tool-card coming-soon" onclick="window.location.href='strumento/'">
          <span class="tool-icon">🎯</span>
          <h3 class="tool-title">[REDACTED]</h3>
          <p class="tool-description">
            prossimamente...
          </p>
          <span class="tool-status status-coming-soon">In Progettazione</span>
        </div>

        <!-- Placeholder 5 -->
        <div class="tool-card coming-soon" onclick="window.location.href='ultimo-tool/'">
          <span class="tool-icon">🚀</span>
          <h3 class="tool-title">[REDACTED]</h3>
          <p class="tool-description">
            prossimamente...
          </p>
          <span class="tool-status status-coming-soon">In Progettazione</span>
        </div>
      </div>
    </main>

    <div class="contacts-section">
      <div class="contacts-title">📞 Contatti & Supporto</div>
      <div>
        <span class="contact-item">
          🎮 Discord: <strong>picciobeffa</strong>
        </span>
        <span class="contact-item">
          📱 Telegram: <strong>@piccionenberg</strong>
        </span>
      </div>
    </div>

    <div class="footer">
      <p style="display: flex; align-items: center; justify-content: center; gap: 10px;">
        <img src="../logo.png" alt="Sevcon Logo" id="copyrightLogo" style="width: 20px; height: 20px; border-radius: 4px; cursor: pointer; transition: all 0.3s ease;" onerror="this.style.display='none';" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
        © <?php echo date('Y'); ?> Sevcon by piccionenberg - Creato con ❤️ e per noia
      </p>
      <div style="text-align: center; margin-top: 15px;">
        <a href="https://github.com/sevc0n/sevc0n.github.io" target="_blank" rel="noopener noreferrer" class="github-button">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
          </svg>
          GitHub
        </a>
      </div>
    </div>
  </div>

  <script>
    // Sistema di accesso nascosto con doppia sequenza
    let logoClickCount = 0;
    let copyrightClickCount = 0;
    let clickTimeout;
    let copyrightTimeout;
    const REQUIRED_CLICKS = 5;
    const CLICK_TIMEOUT = 3000; // 3 secondi per completare la sequenza

    function playClickSound() {
      // Crea un suono di click usando Web Audio API
      try {
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const oscillator = audioContext.createOscillator();
        const gainNode = audioContext.createGain();
        
        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);
        
        oscillator.frequency.setValueAtTime(800, audioContext.currentTime);
        oscillator.frequency.exponentialRampToValueAtTime(400, audioContext.currentTime + 0.1);
        
        gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
        gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.1);
        
        oscillator.start(audioContext.currentTime);
        oscillator.stop(audioContext.currentTime + 0.1);
      } catch (error) {
        console.log('Audio non supportato');
      }
    }

    function resetCounters() {
      logoClickCount = 0;
      copyrightClickCount = 0;
      if (clickTimeout) clearTimeout(clickTimeout);
      if (copyrightTimeout) clearTimeout(copyrightTimeout);
    }

    document.addEventListener('DOMContentLoaded', function() {
      const logo = document.getElementById('logoClick');
      const copyrightLogo = document.getElementById('copyrightLogo');
      
      // Debug info
      console.log('🔍 Logo principale trovato:', !!logo);
      console.log('🔍 Logo copyright trovato:', !!copyrightLogo);
      
      // Click sul logo principale
      if (logo) {
        logo.addEventListener('click', function() {
          logoClickCount++;
          
          // Reset timeout se esiste
          if (clickTimeout) {
            clearTimeout(clickTimeout);
          }
          
          // Feedback visivo per il click
          this.style.transform = 'scale(0.9)';
          setTimeout(() => {
            this.style.transform = 'scale(1.1)';
            setTimeout(() => {
              this.style.transform = 'scale(1)';
            }, 100);
          }, 100);
          
          // Debug info
          console.log(`🔍 Click sul logo principale: ${logoClickCount}/${REQUIRED_CLICKS}`);
          
          if (logoClickCount >= REQUIRED_CLICKS) {
            if (copyrightClickCount >= REQUIRED_CLICKS) {
              // Doppia sequenza completata!
              console.log('🎉 Sequenza completa! Accesso ai codici...');
              
              // Effetto speciale
              this.style.animation = 'pulse 0.5s ease-in-out 3';
              
              // Suono di conferma
              playClickSound();
              
              // Reindirizzamento alla pagina dei codici
              setTimeout(() => {
                window.location.href = 'codici-test.php';
              }, 1500);
            } else {
              // Solo sequenza logo principale completata!
              console.log('🎉 Sequenza di click completata! Accesso all\'area test...');
              
              // Effetto speciale
              this.style.animation = 'pulse 0.5s ease-in-out 3';
              
              // Suono di conferma
              playClickSound();
              
              // Reindirizzamento alla pagina di accesso
              setTimeout(() => {
                window.location.href = 'accesso-test.php';
              }, 1500);
            }
            
          } else {
            // Imposta timeout per reset
            clickTimeout = setTimeout(() => {
              console.log('⏰ Timeout: sequenza di click resettata');
              logoClickCount = 0;
            }, CLICK_TIMEOUT);
          }
        });
      }

      // Click sul logo del copyright
      if (copyrightLogo) {
        console.log('✅ Logo copyright configurato correttamente');
        copyrightLogo.addEventListener('click', function() {
          copyrightClickCount++;
          
          // Reset timeout se esiste
          if (copyrightTimeout) {
            clearTimeout(copyrightTimeout);
          }
          
          // Feedback visivo per il click
          this.style.transform = 'scale(0.9)';
          setTimeout(() => {
            this.style.transform = 'scale(1.1)';
            setTimeout(() => {
              this.style.transform = 'scale(1)';
            }, 100);
          }, 100);
          
          // Debug info
          console.log(`🔍 Click sul logo copyright: ${copyrightClickCount}/${REQUIRED_CLICKS}`);
          
          if (copyrightClickCount >= REQUIRED_CLICKS) {
            // Prima sequenza completata!
            console.log('🎉 Prima sequenza completata! Ora clicca 5 volte sul logo principale...');
            
            // Effetto speciale
            this.style.animation = 'pulse 0.5s ease-in-out 3';
            
            // Suono di conferma
            playClickSound();
            
            // Reset dopo 3 secondi
            copyrightTimeout = setTimeout(() => {
              console.log('⏰ Timeout: prima sequenza resettata');
              copyrightClickCount = 0;
            }, CLICK_TIMEOUT);
            
          } else {
            // Imposta timeout per reset
            copyrightTimeout = setTimeout(() => {
              console.log('⏰ Timeout: sequenza di click resettata');
              copyrightClickCount = 0;
            }, CLICK_TIMEOUT);
          }
        });
      } else {
        // Fallback: prova a trovare il logo del copyright con selettore alternativo
        console.log('⚠️ Logo copyright non trovato con ID, provo fallback...');
        const fallbackLogo = document.querySelector('.footer img');
        if (fallbackLogo) {
          console.log('✅ Logo copyright trovato con fallback');
          fallbackLogo.addEventListener('click', function() {
            copyrightClickCount++;
            
            // Reset timeout se esiste
            if (copyrightTimeout) {
              clearTimeout(copyrightTimeout);
            }
            
            // Feedback visivo per il click
            this.style.transform = 'scale(0.9)';
            setTimeout(() => {
              this.style.transform = 'scale(1.1)';
              setTimeout(() => {
                this.style.transform = 'scale(1)';
              }, 100);
            }, 100);
            
            // Debug info
            console.log(`🔍 Click sul logo copyright (fallback): ${copyrightClickCount}/${REQUIRED_CLICKS}`);
            
            if (copyrightClickCount >= REQUIRED_CLICKS) {
              // Prima sequenza completata!
              console.log('🎉 Prima sequenza completata! Ora clicca 5 volte sul logo principale...');
              
              // Effetto speciale
              this.style.animation = 'pulse 0.5s ease-in-out 3';
              
              // Suono di conferma
              playClickSound();
              
              // Reset dopo 3 secondi
              copyrightTimeout = setTimeout(() => {
                console.log('⏰ Timeout: prima sequenza resettata');
                copyrightClickCount = 0;
              }, CLICK_TIMEOUT);
              
            } else {
              // Imposta timeout per reset
              copyrightTimeout = setTimeout(() => {
                console.log('⏰ Timeout: sequenza di click resettata');
                copyrightClickCount = 0;
              }, CLICK_TIMEOUT);
            }
          });
        } else {
          console.log('❌ Logo copyright non trovato nemmeno con fallback');
        }
      }
      
      // Aggiungi effetti di hover più fluidi
      document.querySelectorAll('.tool-card.available, .tool-card.coming-soon').forEach(card => {
        card.addEventListener('mouseenter', function() {
          this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
          this.style.transform = 'translateY(0) scale(1)';
        });
      });

      // Effetto di caricamento progressivo delle card
      const cards = document.querySelectorAll('.tool-card');
      cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
          card.style.transition = 'all 0.6s ease';
          card.style.opacity = '1';
          card.style.transform = 'translateY(0)';
        }, index * 150);
      });
    });
  </script>
</body>
</html>

