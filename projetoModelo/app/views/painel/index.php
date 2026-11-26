<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Distribuidora LS - Bebidas &amp; Tabacaria</title>
  <link rel="icon" type="image/png" href="/ProjetoModelo/public/favicon/icons8-copo-g-48.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/ProjetoModelo/app/views/css/global.css">
  <link rel="stylesheet" href="/ProjetoModelo/app/views/css/home.css">
  <!-- css produto coloquei para pegar o footer -->
  <link rel="stylesheet" href="/ProjetoModelo/app/views/css/produto.css">
  <style>
    .nav-acoes .btn-entrar {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 8px 14px;
      border-radius: 8px;
      font-weight: 600;
      text-decoration: none;
    }
  </style>
</head>

<body>

  <!-- Modal de Verificação de Idade (+18) -->
  <div id="modalIdade" class="modal-idade-overlay">
    <div class="modal-idade-box" id="modalIdadeBox">
      <div class="modal-idade-icone">🔞</div>
      <h2>Você tem 18 anos ou mais?</h2>
      <p>
        O acesso ao site da <strong>Distribuidora LS</strong> é exclusivo para maiores de 18 anos. A venda de bebidas alcoólicas e produtos de tabacaria para menores é proibida por lei.
      </p>
      <div class="modal-idade-botoes">
        <button type="button" class="btn-idade-sim" onclick="confirmarIdade(true)">Sim, tenho +18 anos</button>
        <button type="button" class="btn-idade-nao" onclick="confirmarIdade(false)">Não, sou menor</button>
      </div>
      <small class="modal-aviso-lei">Beba com moderação. Se beber, não dirija.</small>
    </div>
  </div>

  <!-- Cabeçalho -->
  <header>
    <div class="header-container">
      <div class="logo">
        <a href="/ProjetoModelo/index.php?controller=painel&action=index" class="logo-link">
          <div class="logo-icone">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M8 22h8"></path>
              <path d="M12 15v7"></path>
              <path d="M19 3H5l2 9a5 5 0 0 0 10 0l2-9Z"></path>
            </svg>
          </div>
          <div class="logo-texto">
            <h1>DISTRIBUIDORA <span>LS</span></h1>
            <small>BEBIDAS &amp; TABACARIA</small>
          </div>
        </a>
      </div>

      <nav>
        <div class="nav-links">
          <a href="/ProjetoModelo/index.php?controller=painel&action=index" class="ativo">Início</a>
          <a href="/ProjetoModelo/index.php?controller=produto&action=index">Catálogo</a>
          <a href="#contato">Contato</a>
          <a href="/ProjetoModelo/index.php?controller=usuario&action=index">Gerenciar Usuários</a>
        </div>
        <div class="nav-acoes">
          <a href="/ProjetoModelo/index.php?controller=login&action=index" class="btn-entrar">Entrar</a>
          <a href="/ProjetoModelo/index.php?controller=login&action=registrar" class="btn-nav">Criar Conta</a>
        </div>
      </nav>
    </div>
  </header>

  <main>
    <!-- Carrossel Hero -->
    <section class="carrossel">
      <div class="slide ativo">
        <div class="container slide-grid">
          <div class="hero-content">
            <span class="tag">⚡ Entrega Rápida na Região</span>
            <h2>Combos de <span>Whisky</span>, Bebidas Geladas e <span>Tabacaria</span> Completa!</h2>
            <p>Os melhores preços no atacado e varejo para o seu rolê, churrasco ou festa. Peça online e receba em minutos.</p>
            <div class="hero-botoes">
              <a class="btn-principal" href="/ProjetoModelo/index.php?controller=produto&action=index">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="3" width="7" height="7"></rect>
                  <rect x="14" y="3" width="7" height="7"></rect>
                  <rect x="14" y="14" width="7" height="7"></rect>
                  <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                Ver Catálogo Completo
              </a>
              <a class="btn-secundario" href="https://wa.me/5561999999999" target="_blank" rel="noopener noreferrer">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                </svg>
                Pedir pelo WhatsApp
              </a>
            </div>
          </div>
          <div class="hero-imagem">
            <img src="/ProjetoModelo/public/img-carrossel/banner01.jpg" alt="Combo Red Label com Red Bull">
          </div>
        </div>
      </div>

      <div class="slide">
        <div class="container slide-grid">
          <div class="hero-content">
            <span class="tag">🔥 Oferta do Fim de Semana</span>
            <h2>Combo <span>Red Label 1L</span> + 4 Red Bull + Gelo de Coco</h2>
            <p>Kit completo trincando de gelado por apenas R$ 149,90. Aproveite enquanto durar o estoque!</p>
            <div class="hero-botoes">
              <a class="btn-principal" href="/ProjetoModelo/index.php?controller=produto&action=index&cat=combos">Garantir Meu Combo</a>
              <a class="btn-secundario" href="https://wa.me/5561999999999" target="_blank" rel="noopener noreferrer">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                </svg>
                Pedir pelo WhatsApp
              </a>
            </div>
          </div>
          <div class="hero-imagem">
            <img src="/ProjetoModelo/public/img-carrossel/banner02.jpg" alt="Combo ou Destaque Distribuidora LS">
          </div>
        </div>
      </div>

      <div class="slide">
        <div class="container slide-grid">
          <div class="hero-content">
            <span class="tag">💨 Sessão Completa</span>
            <h2>Tabacaria: Essências <span>Ziggy, Zomo</span>, Carvão e Sedas</h2>
            <p>Tudo para o seu narguilé ou sessão com entrega expressa na porta da sua casa.</p>
            <div class="hero-botoes">
              <a class="btn-principal" href="/ProjetoModelo/index.php?controller=produto&action=index&cat=tabacaria">Ver Itens de Tabacaria</a>
            </div>
          </div>
          <div class="hero-imagem">
            <img src="/ProjetoModelo/public/img-carrossel/banner 03.jpg" alt="Narguilé e Tabacaria">
          </div>
        </div>
      </div>

      <button type="button" class="seta anterior" onclick="mudarSlide(-1)" aria-label="Slide anterior">❮</button>
      <button type="button" class="seta proximo" onclick="mudarSlide(1)" aria-label="Próximo slide">❯</button>

      <div class="indicadores">
        <span class="dot ativo" onclick="irParaSlide(0)"></span>
        <span class="dot" onclick="irParaSlide(1)"></span>
        <span class="dot" onclick="irParaSlide(2)"></span>
      </div>
    </section>

    <!-- Seção de Benefícios (Ícones SVG nativos) -->
    <section class="features">
      <div class="features-grid">
        <div class="feature-item">
          <div class="feature-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="2" y1="12" x2="22" y2="12"></line>
              <line x1="12" y1="2" x2="12" y2="22"></line>
              <path d="m20 16-4-4 4-4"></path>
              <path d="m4 8 4 4-4 4"></path>
              <path d="m16 4-4 4-4-4"></path>
              <path d="m8 20 4-4 4 4"></path>
            </svg>
          </div>
          <h3>Gelo e Bebida Trincando</h3>
          <p>Gelo de coco, saborizado e bebidas na temperatura ideal.</p>
        </div>

        <div class="feature-item">
          <div class="feature-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="18.5" cy="17.5" r="3.5"></circle>
              <circle cx="5.5" cy="17.5" r="3.5"></circle>
              <circle cx="15" cy="5" r="1"></circle>
              <path d="M12 17.5V14l-3-3 4-3 2 3h2"></path>
            </svg>
          </div>
          <h3>Delivery Ágil</h3>
          <p>Entrega rápida e segura direto na sua porta.</p>
        </div>

        <div class="feature-item">
          <div class="feature-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="5" width="20" height="14" rx="2"></rect>
              <line x1="2" y1="10" x2="22" y2="10"></line>
            </svg>
          </div>
          <h3>Pagamento Fácil</h3>
          <p>Aceitamos Pix, cartões de crédito, débito e dinheiro.</p>
        </div>
      </div>
    </section>

    <!-- Seção Destaques da Distribuidora -->
    <section class="catalog-section" id="catalogo">
      <div class="catalog-header">
        <h2>Destaques da Distribuidora</h2>
        <p>Adicione seus produtos ao carrinho e finalize direto pelo WhatsApp</p>
      </div>

      <div class="products-grid">
        <div class="product-card">
          <span class="product-badge">Mais Pedido</span>
          <div class="product-img-box">
            <img src="/ProjetoModelo/public/img/combo-red.jpg" alt="Combo Red Label 1L">
          </div>
          <div class="product-info">
            <h3>Combo Red Label 1L</h3>
            <p>1 Johnnie Walker Red Label + 4 Red Bull + 4 Gelos de Coco.</p>
          </div>
          <div class="product-footer">
            <div class="product-price">R$ 149,90</div>
            <button type="button" class="btn-add-cart" onclick="adicionarCarrinho('Combo Red Label 1L', 149.90)">+ Adicionar ao Carrinho</button>
          </div>
        </div>

        <div class="product-card">
          <span class="product-badge badge-dark">Premium</span>
          <div class="product-img-box">
            <img src="/ProjetoModelo/public/img/combo-jack.webp" alt="Combo Jack Daniel's 1L">
          </div>
          <div class="product-info">
            <h3>Combo Jack Daniel's 1L</h3>
            <p>1 Jack Daniel's Tradicional + 4 Energéticos Baly 473ml + Gelo.</p>
          </div>
          <div class="product-footer">
            <div class="product-price">R$ 199,90</div>
            <button type="button" class="btn-add-cart" onclick="adicionarCarrinho('Combo Jack Daniels 1L', 199.90)">+ Adicionar ao Carrinho</button>
          </div>
        </div>

        <div class="product-card">
          <span class="product-badge badge-amber">Custo-Benefício</span>
          <div class="product-img-box">
            <img src="/ProjetoModelo/public/img/essencia.jpg" alt="Kit Sessão Completa">
          </div>
          <div class="product-info">
            <h3>Kit Sessão Completa</h3>
            <p>Essência Ziggy ou Zomo + Carvão de Coco 1kg + Alumínio.</p>
          </div>
          <div class="product-footer">
            <div class="product-price">R$ 45,00</div>
            <button type="button" class="btn-add-cart" onclick="adicionarCarrinho('Kit Sessão Completa', 45.00)">+ Adicionar ao Carrinho</button>
          </div>
        </div>
      </div>

      <div class="ver-mais-container">
        <a href="/ProjetoModelo/index.php?controller=produto&action=index" class="btn-ver-catalogo">Ver Catálogo Completo →</a>
      </div>
    </section>
  </main>

  <button type="button" class="floating-cart" onclick="enviarPedidoWhatsApp()">
    <i class="fa-solid fa-cart-shopping"></i> <span id="cart-text">Carrinho ( 0 ) - R$ 0,00</span>
  </button>

  <!-- Rodapé -->
  <footer id="contato">
    <div class="container footer-grid">
      <div class="footer-col">
        <h3 class="footer-logo">DISTRIBUIDORA <span>LS</span></h3>
        <p class="footer-desc">
          Bebidas geladas, combos de whisky e tabacaria completa com entrega rápida e segura na sua região.
        </p>
        <div class="aviso-idade">
          🔞 Venda proibida para menores de 18 anos. Beba com moderação.
        </div>
      </div>

      <div class="footer-col">
        <h4>Navegação</h4>
        <ul class="footer-lista">
          <li><a href="/ProjetoModelo/index.php?controller=painel&action=index">Início</a></li>
          <li><a href="/ProjetoModelo/index.php?controller=produto&action=index">Catálogo Completo</a></li>
          <li><a href="/ProjetoModelo/index.php?controller=login&action=index">Área do Cliente</a></li>
          <li><a href="/ProjetoModelo/index.php?controller=login&action=registrar">Criar Conta</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Atendimento</h4>
        <ul class="footer-lista info-contato">
          <li>📍 Brazlândia - DF e Região</li>
          <li>🕒 Seg a Dom: 09h às 23h</li>
          <li>
            <a href="https://wa.me/5561999999999" target="_blank" rel="noopener noreferrer" class="link-destaque">
              📱 (61) 99999-9999 (WhatsApp)
            </a>
          </li>
          <li>
            <a href="#" target="_blank" rel="noopener noreferrer">📸 @distribuidorals</a>
          </li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Formas de Pagamento</h4>
        <div class="pagamentos-badges">
          <span>💠 Pix</span>
          <span>💳 Crédito</span>
          <span>💳 Débito</span>
          <span>💵 Dinheiro</span>
        </div>
        <p class="nota-entrega">🛵 Consulte taxa de entrega para o seu setor.</p>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container footer-bottom-content">
        <p>© <?= date('Y') ?> Distribuidora LS — Todos os direitos reservados.</p>
        <p class="dev-credito">Desenvolvido por <strong>Lucas</strong></p>
      </div>
    </div>
  </footer>

  <script>
    // 1. Verificação de Idade (+18)
    window.addEventListener('DOMContentLoaded', () => {
      if (sessionStorage.getItem('maiorDeIdade') === 'true') {
        document.getElementById('modalIdade').style.display = 'none';
      }
    });

    function confirmarIdade(ehMaior) {
      if (ehMaior) {
        sessionStorage.setItem('maiorDeIdade', 'true');
        document.getElementById('modalIdade').style.display = 'none';
      } else {
        document.getElementById('modalIdadeBox').innerHTML = `
          <div class="modal-idade-icone">🚫</div>
          <h2>Acesso Restrito</h2>
          <p>A venda de bebidas alcoólicas e tabacaria é proibida para menores de 18 anos.</p>
        `;
      }
    }

    // 2. Carrossel
    let slideAtual = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');

    function mostrarSlide(index) {
      slideAtual = (index + slides.length) % slides.length;
      slides.forEach(s => s.classList.remove('ativo'));
      dots.forEach(d => d.classList.remove('ativo'));
      slides[slideAtual].classList.add('ativo');
      dots[slideAtual].classList.add('ativo');
    }

    function mudarSlide(dir) { mostrarSlide(slideAtual + dir); }
    function irParaSlide(idx) { mostrarSlide(idx); }
    setInterval(() => mudarSlide(1), 6000);

    // 3. Carrinho Simples -> WhatsApp
    let carrinho = [];

    function adicionarCarrinho(nome, preco) {
      carrinho.push({ nome, preco });
      const total = carrinho.reduce((acc, item) => acc + item.preco, 0);
      document.getElementById('cart-text').innerText =
        `Carrinho ( ${carrinho.length} ) - R$ ${total.toFixed(2).replace('.', ',')}`;
    }

    function enviarPedidoWhatsApp() {
      if (carrinho.length === 0) return alert('Adicione itens ao carrinho primeiro!');
      const total = carrinho.reduce((acc, item) => acc + item.preco, 0);
      let msg = '*PEDIDO - DISTRIBUIDORA LS*\n\n';
      carrinho.forEach(i => { msg += `• ${i.nome} - R$ ${i.preco.toFixed(2).replace('.', ',')}\n`; });
      msg += `\n*Total:* R$ ${total.toFixed(2).replace('.', ',')}`;

      const telefone = '5561999999999'; // Coloque o número real da loja aqui
      window.open(`https://wa.me/${telefone}?text=${encodeURIComponent(msg)}`, '_blank');
    }
  </script>
</body>
</html>