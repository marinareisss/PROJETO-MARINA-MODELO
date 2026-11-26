<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catálogo | Distribuidora LS</title>
  <link rel="icon" type="image/png" href="/ProjetoModelo/public/favicon/icons8-copo-g-48.png">
  <link rel="stylesheet" href="/ProjetoModelo/app/views/css/global.css">
  <link rel="stylesheet" href="/ProjetoModelo/app/views/css/produto.css">
</head>
<body>
  <!-- Cabeçalho -->
  <header>
    <div class="header-container">
      <div class="logo">
        <a href="/ProjetoModelo/index.php?controller=painel&action=index" class="logo-link">
          <div class="logo-icone">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#0f172a" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
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
          <a href="/ProjetoModelo/index.php?controller=painel&action=index">Início</a>
          <a href="/ProjetoModelo/index.php?controller=produto&action=index" class="ativo">Catálogo</a>
          <a href="/ProjetoModelo/index.php?controller=painel&action=index#contato">Contato</a>
          <a href="/ProjetoModelo/index.php?controller=usuario&action=index">Gerenciar Usuários</a>
        </div>
        <div class="nav-acoes">
          <a href="/ProjetoModelo/index.php?controller=login&action=index" class="btn-entrar">Entrar</a>
          <a href="/ProjetoModelo/index.php?controller=usuario&action=cadastrar" class="btn-nav">Criar Conta</a>
        </div>
      </nav>
    </div>
  </header>

  <main>
    <!-- Topo do Catálogo -->
    <section class="catalogo-topo">
      <div class="container">
        <h2>Catálogo Completo</h2>
        <p>Escolha seus produtos, adicione ao carrinho e finalize pelo WhatsApp</p>
      </div>
    </section>

    <!-- Filtros e Busca -->
    <section class="container filtros-container">
      <input type="text" id="campoBusca" class="barra-busca" placeholder="🔍 Buscar whisky, combo, essência, cerveja..." onkeyup="filtrarProdutos()">
      
      <div class="botoes-filtro">
        <button class="btn-filtro ativo" onclick="selecionarCategoria('todos', this)">Todos</button>
        <button class="btn-filtro" onclick="selecionarCategoria('combos', this)">🔥 Combos</button>
        <button class="btn-filtro" onclick="selecionarCategoria('destilados', this)">🥃 Whiskys &amp; Destilados</button>
        <button class="btn-filtro" onclick="selecionarCategoria('cervejas', this)">🍺 Cervejas &amp; Conveniência</button>
        <button class="btn-filtro" onclick="selecionarCategoria('tabacaria', this)">💨 Tabacaria</button>
      </div>
    </section>

    <!-- Grade de Produtos -->
    <section class="conteudo container">
      <div class="cards" id="listaProdutos">
        
        <!-- COMBOS -->
        <div class="card produto-item" data-categoria="combos" data-nome="combo red label 1l">
          <span class="badge oferta">Mais Pedido</span>
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/combo-red.jpg" alt="Combo Red Label 1L">
          </div>
          <h3>Combo Red Label 1L</h3>
          <p class="descricao">1 Johnnie Walker Red Label + 4 Red Bull + 4 Gelos de Coco.</p>
          <p class="preco">R$ 149,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Combo Red Label 1L', 149.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="combos" data-nome="combo jack daniels 1l">
          <span class="badge">Premium</span>
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/combo-jack.webp" alt="Combo Jack Daniel's 1L">
          </div>
          <h3>Combo Jack Daniel's 1L</h3>
          <p class="descricao">1 Jack Daniel's Tradicional + 4 Energéticos Baly 473ml + Gelo.</p>
          <p class="preco">R$ 199,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Combo Jack Daniels 1L', 199.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="combos" data-nome="combo white horse 1l cavalo branco">
          <span class="badge oferta">Custo-Benefício</span>
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/combo-white.jpg" alt="Combo White Horse 1L">
          </div>
          <h3>Combo White Horse 1L</h3>
          <p class="descricao">1 Cavalo Branco 1L + 1 Energético Baly 2L + 4 Gelos Saborizados.</p>
          <p class="preco">R$ 109,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Combo White Horse 1L', 109.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="combos" data-nome="combo royal salute 1l">
          <span class="badge">Exclusivo</span>
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/royal-salute.jpg" alt="Combo Royal Salute 1L">
          </div>
          <h3>Combo Royal Salute 1L</h3>
          <p class="descricao">1 Royal Salute + 4 Red Bull + 4 Gelos de Coco.</p>
          <p class="preco">R$ 1.999,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Combo Royal Salute 1L', 1999.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="combos" data-nome="combo jack daniels baly">
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/combo-jack01.jpg" alt="Combo Jack Daniel's + Baly">
          </div>
          <h3>Combo Jack Daniel's + Baly</h3>
          <p class="descricao">1 Jack Daniel's Tradicional + 4 Baly 473ml + 4 Gelos.</p>
          <p class="preco">R$ 199,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Combo Jack Daniels + Baly', 199.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="combos" data-nome="combo gin tanqueray 750ml">
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/combo-tanqueray.jpg" alt="Combo Gin Tanqueray 750ml">
          </div>
          <h3>Combo Gin Tanqueray 750ml</h3>
          <p class="descricao">1 Gin Tanqueray + 4 Águas Tônicas + Especiarias + Gelo.</p>
          <p class="preco">R$ 159,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Combo Gin Tanqueray 750ml', 159.90)">+ Adicionar ao Carrinho</button>
        </div>

        <!-- DESTILADOS -->
        <div class="card produto-item" data-categoria="destilados" data-nome="johnnie walker black label 1l whisky">
          <span class="badge">12 Anos</span>
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/black-labe.jpg" alt="Johnnie Walker Black Label 1L">
          </div>
          <h3>Johnnie Walker Black Label 1L</h3>
          <p class="descricao">Whisky escocês envelhecido 12 anos, sabor intenso e defumado.</p>
          <p class="preco">R$ 189,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Black Label 1L', 189.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="destilados" data-nome="jack daniels honey 1l mel whisky">
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/jack-danels.jpg" alt="Jack Daniel's Honey 1L">
          </div>
          <h3>Jack Daniel's Honey 1L</h3>
          <p class="descricao">Whisky americano com toque suave de mel natural.</p>
          <p class="preco">R$ 164,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Jack Daniels Honey 1L', 164.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="destilados" data-nome="the macallan sherry oak 12 anos 700ml whisky">
          <span class="badge">Single Malt</span>
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/macalan.jpg" alt="The Macallan 12 Anos">
          </div>
          <h3>The Macallan Sherry Oak 12 Anos 700ml</h3>
          <p class="descricao">Whisky escocês single malt envelhecido em barris de carvalho.</p>
          <p class="preco">R$ 659,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('The Macallan 12 Anos', 659.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="destilados" data-nome="whisky old parr 12 anos">
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/old-par.webp" alt="Whisky Old Parr 12 Anos">
          </div>
          <h3>Whisky Old Parr 12 Anos</h3>
          <p class="descricao">Whisky escocês encorpado e suave, envelhecido 12 anos.</p>
          <p class="preco">R$ 164,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Whisky Old Parr 12 Anos', 164.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="destilados" data-nome="gin tanqueray 750ml">
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/tanqueray.jpg" alt="Gin Tanqueray 750ml">
          </div>
          <h3>Gin Tanqueray 750ml</h3>
          <p class="descricao">Gin London Dry clássico, ideal para drinks com tônica e frutas.</p>
          <p class="preco">R$ 129,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Gin Tanqueray 750ml', 129.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="destilados" data-nome="vodka smirnoff 998ml">
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/smirnoff.jpg" alt="Vodka Smirnoff 998ml">
          </div>
          <h3>Vodka Smirnoff 998ml</h3>
          <p class="descricao">Tridestilada, perfeita para caipiroskas e batidas.</p>
          <p class="preco">R$ 44,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Vodka Smirnoff 998ml', 44.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="destilados" data-nome="tequila jose cuervo ouro 750ml">
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/tequila.jpg" alt="Tequila José Cuervo Ouro 750ml">
          </div>
          <h3>Tequila José Cuervo Ouro 750ml</h3>
          <p class="descricao">Tequila mexicana importada para doses e margaritas.</p>
          <p class="preco">R$ 134,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Tequila José Cuervo 750ml', 134.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="destilados" data-nome="whisky ballantines finest 1l">
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/ballantines.jpg" alt="Whisky Ballantine's Finest 1L">
          </div>
          <h3>Whisky Ballantine's Finest 1L</h3>
          <p class="descricao">Blended Scotch equilibrado e suave.</p>
          <p class="preco">R$ 94,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Whisky Ballantines Finest 1L', 94.90)">+ Adicionar ao Carrinho</button>
        </div>

        <!-- CERVEJAS & CONVENIÊNCIA -->
        <div class="card produto-item" data-categoria="cervejas" data-nome="fardo heineken long neck 6 unidades cerveja">
          <span class="badge">Trincando</span>
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/heineken.jpg" alt="Fardo Heineken Long Neck">
          </div>
          <h3>Fardo Heineken Long Neck (6 un)</h3>
          <p class="descricao">Cerveja puro malte 330ml super gelada.</p>
          <p class="preco">R$ 42,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Fardo Heineken 6un', 42.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="cervejas" data-nome="energetico baly 2l">
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/baly.jpg" alt="Energético Baly 2L">
          </div>
          <h3>Energético Baly 2L</h3>
          <p class="descricao">Sabores Tradicional, Tropical, Melancia e Maçã Verde.</p>
          <p class="preco">R$ 12,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Energético Baly 2L', 12.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="cervejas" data-nome="refrigerante coca cola 2l">
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/coca-cola.jpg" alt="Refrigerante Coca-Cola 2L">
          </div>
          <h3>Refrigerante Coca-Cola 2L</h3>
          <p class="descricao">Garrafa 2L super gelada.</p>
          <p class="preco">R$ 10,99</p>
          <button class="btn-card" onclick="adicionarCarrinho('Coca-Cola 2L', 10.99)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="cervejas" data-nome="gelo de coco saborizado 200ml">
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/gelo-coco.jpg" alt="Gelo de Coco / Saborizado">
          </div>
          <h3>Gelo de Coco / Saborizado</h3>
          <p class="descricao">Unidade 200ml para drinks e combos.</p>
          <p class="preco">R$ 3,50</p>
          <button class="btn-card" onclick="adicionarCarrinho('Gelo Saborizado', 3.50)">+ Adicionar ao Carrinho</button>
        </div>

        <!-- TABACARIA -->
        <div class="card produto-item" data-categoria="tabacaria" data-nome="essencia ziggy zomo 50g narguile">
          <span class="badge">Narguilé</span>
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/essencia.jpg" alt="Essências Ziggy / Zomo 50g">
          </div>
          <h3>Essências Zomo 50g</h3>
          <p class="descricao">Diversos sabores frutados, mentolados e doces.</p>
          <p class="preco">R$ 13,00</p>
          <button class="btn-card" onclick="adicionarCarrinho('Essências Ziggy / Zomo 50g', 13.00)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="tabacaria" data-nome="carvao de coco 1kg aluminio narguile">
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/Carvão de Coco 1kg.jpg" alt="Carvão de Coco 1kg + Alumínio">
          </div>
          <h3>Carvão de Coco 1kg + Alumínio</h3>
          <p class="descricao">Carvão hexagonal de alta duração e folha de alumínio reforçada.</p>
          <p class="preco">R$ 28,90</p>
          <button class="btn-card" onclick="adicionarCarrinho('Carvão de Coco 1kg + Alumínio', 28.90)">+ Adicionar ao Carrinho</button>
        </div>

        <div class="card produto-item" data-categoria="tabacaria" data-nome="kit seda piteira isqueiro">
          <span class="badge oferta">Kit Completo</span>
          <div class="imagem">
            <img src="/ProjetoModelo/public/img/kit-case-rosa-completo.webp" alt="Kit Seda + Piteira + Isqueiro">
          </div>
          <h3>Kit Seda + Piteira + Isqueiro</h3>
          <p class="descricao">Sedas King Size, piteiras de papel e isqueiro Clipper/Bic.</p>
          <p class="preco">R$ 15,00</p>
          <button class="btn-card" onclick="adicionarCarrinho('Kit Seda + Piteira + Isqueiro', 15.00)">+ Adicionar ao Carrinho</button>
        </div>

      </div>
    </section>
  </main>
    </main>

    <!-- Botão Flutuante do Carrinho -->
  <button class="btn-carrinho-flutuante" onclick="alternarCarrinho()">
    🛒 Carrinho (<span id="qtdCarrinho">0</span>) - <span id="valorFlutuante">R$ 0,00</span>
  </button>

  <!-- Painel Lateral do Carrinho com Seletor de Taxa de Entrega -->
  <div class="carrinho-overlay" id="carrinhoOverlay">
    <div class="carrinho-painel">
      <div class="carrinho-header">
        <h3>🛒 Seu Pedido</h3>
        <button class="fechar-carrinho" onclick="alternarCarrinho()">✕</button>
      </div>

      <div class="carrinho-itens" id="carrinhoItens">
        <p style="color: #64748b; text-align: center; padding: 20px 0;">Seu carrinho está vazio.</p>
      </div>

      <div class="carrinho-footer">
        <select id="setorEntrega" onchange="atualizarCarrinho()">
          <option value="0" data-nome="Retirar na Loja (Grátis)">🏪 Retirar na Distribuidora (Grátis)</option>
          <option value="5" data-nome="Setor Tradicional" selected>🛵 Setor Tradicional (+ R$ 5,00)</option>
          <option value="5" data-nome="Setor Norte">🛵 Setor Norte (+ R$ 5,00)</option>
          <option value="6" data-nome="Vila São José">🛵 Vila São José (+ R$ 6,00)</option>
          <option value="7" data-nome="Setor Veredas">🛵 Setor Veredas (+ R$ 7,00)</option>
          <option value="10" data-nome="Incra 6 / 7 / 8">🛵 Incra 6 / 7 / 8 (+ R$ 10,00)</option>
          <option value="12" data-nome="Área Rural / Chácaras">🛵 Área Rural / Chácaras (+ R$ 12,00)</option>
        </select>

        <input type="text" id="enderecoCliente" placeholder="📍 Quadra, Conjunto, Casa ou Ponto de Referência">

        <select id="formaPagamento">
          <option value="Pix">💳 Pagamento via Pix</option>
          <option value="Cartão de Crédito/Débito">💳 Cartão na Entrega</option>
          <option value="Dinheiro">💵 Dinheiro</option>
        </select>

        <div class="resumo-valores">
          <div class="linha-resumo">
            <span>Subtotal dos itens:</span>
            <span id="subtotalCarrinho">R$ 0,00</span>
          </div>
          <div class="linha-resumo">
            <span>Taxa de entrega:</span>
            <span id="taxaEntregaTexto">R$ 5,00</span>
          </div>
          <div class="total-texto">
            <span>Total a Pagar:</span>
            <span id="totalCarrinho">R$ 0,00</span>
          </div>
        </div>

        <button class="btn-finalizar-wpp" onclick="finalizarWhatsApp()">✅ Enviar Pedido no WhatsApp</button>
      </div>
    </div>
  </div>

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
          <li><a href="index.html">Início</a></li>
          <li><a href="produto.html">Catálogo Completo</a></li>
          <li><a href="login.html">Área do Cliente</a></li>
          <li><a href="new.html">Criar Conta</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Atendimento</h4>
        <ul class="footer-lista info-contato">
          <li>📍 Brazlândia - DF e Região</li>
          <li>🕒 Seg a Dom: 09h às 23h</li>
          <li>
            <a href="https://wa.me." target="_blank" class="link-destaque">
              📱 (61) 99999-9999 (WhatsApp)
            </a>
          </li>
          <li>
            <a href="#" target="_blank">📸 @distribuidorals</a>
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
        <p>© 2026 Distribuidora LS - Todos os direitos reservados.</p>
        <p class="dev-credito">Desenvolvido por <strong>Lucas</strong></p>
      </div>
    </div>
  </footer>

  <!-- Script Completo do Catálogo e Carrinho -->
  <script>
    let carrinho = JSON.parse(localStorage.getItem('carrinhoLS')) || [];
    let categoriaAtual = 'todos';

    window.addEventListener('DOMContentLoaded', () => {
      atualizarCarrinho();
      const params = new URLSearchParams(window.location.search);
      const catUrl = params.get('cat');
      if (catUrl) {
        const btn = Array.from(document.querySelectorAll('.btn-filtro'))
          .find(b => b.getAttribute('onclick').includes(`'${catUrl}'`));
        if (btn) selecionarCategoria(catUrl, btn);
      }
    });

    function selecionarCategoria(categoria, botaoClicado) {
      categoriaAtual = categoria;
      document.querySelectorAll('.btn-filtro').forEach(btn => btn.classList.remove('ativo'));
      botaoClicado.classList.add('ativo');
      filtrarProdutos();
    }

    function filtrarProdutos() {
      const termo = document.getElementById('campoBusca').value.toLowerCase().trim();
      document.querySelectorAll('.produto-item').forEach(card => {
        const cat = card.getAttribute('data-categoria');
        const nome = card.getAttribute('data-nome').toLowerCase();
        const titulo = card.querySelector('h3').innerText.toLowerCase();

        const bateCategoria = (categoriaAtual === 'todos' || cat === categoriaAtual);
        const bateBusca = (nome.includes(termo) || titulo.includes(termo));

        card.style.display = (bateCategoria && bateBusca) ? 'flex' : 'none';
      });
    }

    function alternarCarrinho() {
      const overlay = document.getElementById('carrinhoOverlay');
      overlay.style.display = (overlay.style.display === 'flex') ? 'none' : 'flex';
    }

    function adicionarCarrinho(nome, preco) {
      const item = carrinho.find(i => i.nome === nome);
      if (item) {
        item.qtd++;
      } else {
        carrinho.push({ nome, preco, qtd: 1 });
      }
      salvarCarrinho();
    }

    function alterarQtd(index, delta) {
      carrinho[index].qtd += delta;
      if (carrinho[index].qtd <= 0) carrinho.splice(index, 1);
      salvarCarrinho();
    }

    function salvarCarrinho() {
      localStorage.setItem('carrinhoLS', JSON.stringify(carrinho));
      atualizarCarrinho();
    }

    function atualizarCarrinho() {
      const listaEl = document.getElementById('carrinhoItens');
      const selectSetor = document.getElementById('setorEntrega');
      const taxa = parseFloat(selectSetor.value) || 0;

      const qtdTotal = carrinho.reduce((acc, i) => acc + i.qtd, 0);
      const subtotal = carrinho.reduce((acc, i) => acc + (i.preco * i.qtd), 0);
      const totalGeral = qtdTotal > 0 ? (subtotal + taxa) : 0;

      document.getElementById('qtdCarrinho').innerText = qtdTotal;
      document.getElementById('valorFlutuante').innerText = `R$ ${subtotal.toFixed(2).replace('.', ',')}`;
      document.getElementById('subtotalCarrinho').innerText = `R$ ${subtotal.toFixed(2).replace('.', ',')}`;
      document.getElementById('taxaEntregaTexto').innerText = `R$ ${taxa.toFixed(2).replace('.', ',')}`;
      document.getElementById('totalCarrinho').innerText = `R$ ${totalGeral.toFixed(2).replace('.', ',')}`;

      if (carrinho.length === 0) {
        listaEl.innerHTML = '<p style="color: #64748b; text-align: center; padding: 20px 0;">Seu carrinho está vazio.</p>';
        return;
      }

      listaEl.innerHTML = carrinho.map((item, idx) => `
        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #e2e8f0; color: #0f172a;">
          <div>
            <strong>${item.qtd}x</strong> ${item.nome}
            <div style="font-size: 12px; color: #10b981; font-weight: 700;">R$ ${(item.preco * item.qtd).toFixed(2).replace('.', ',')}</div>
          </div>
          <div style="display: flex; gap: 6px; align-items: center;">
            <button onclick="alterarQtd(${idx}, -1)" style="width: 26px; height: 26px; border: 1px solid #cbd5e1; border-radius: 6px; cursor: pointer; font-weight: bold;">-</button>
            <button onclick="alterarQtd(${idx}, 1)" style="width: 26px; height: 26px; border: 1px solid #cbd5e1; border-radius: 6px; cursor: pointer; font-weight: bold;">+</button>
          </div>
        </div>
      `).join('');
    }

    function finalizarWhatsApp() {
      if (carrinho.length === 0) return alert('Seu carrinho está vazio!');

      const selectSetor = document.getElementById('setorEntrega');
      const taxa = parseFloat(selectSetor.value) || 0;
      const nomeSetor = selectSetor.options[selectSetor.selectedIndex].getAttribute('data-nome');
      const endereco = document.getElementById('enderecoCliente').value.trim();
      const pagamento = document.getElementById('formaPagamento').value;

      if (taxa > 0 && !endereco) {
        return alert('Por favor, informe sua Quadra, Conjunto e Casa para a entrega!');
      }

      const subtotal = carrinho.reduce((acc, i) => acc + (i.preco * i.qtd), 0);
      const total = subtotal + taxa;

      let msg = `*NOVO PEDIDO - DISTRIBUIDORA LS*\n\n`;
      carrinho.forEach(i => {
        msg += `• ${i.qtd}x ${i.nome} — R$ ${(i.preco * i.qtd).toFixed(2).replace('.', ',')}\n`;
      });
      msg += `\n*Subtotal:* R$ ${subtotal.toFixed(2).replace('.', ',')}`;
      msg += `\n*Entrega (${nomeSetor}):* R$ ${taxa.toFixed(2).replace('.', ',')}`;
      if (endereco) msg += `\n*Endereço:* ${endereco}`;
    }
 </script>