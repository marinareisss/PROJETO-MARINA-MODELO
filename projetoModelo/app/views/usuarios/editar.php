<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$baseUrl = '/ProjetoModelo';
$erroMsg = $_SESSION['erro_login'] ?? ($erroLogin ?? ($erro ?? null));
$sucessoMsg = $_SESSION['sucesso_login'] ?? null;
$loginAntigo = $_SESSION['login_antigo'] ?? '';
unset($_SESSION['erro_login'], $_SESSION['sucesso_login'], $_SESSION['login_antigo']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entrar | Distribuidora LS</title>
  <link rel="icon" type="image/png" href="<?= $baseUrl ?>/public/favicon/icons8-copo-g-48.png">
  <link rel="stylesheet" href="<?= $baseUrl ?>/app/views/css/global.css">
  <link rel="stylesheet" href="<?= $baseUrl ?>/app/views/css/newprod.css">
  <!-- css produto colocado para manter o estilo do rodapé -->
  <link rel="stylesheet" href="<?= $baseUrl ?>/app/views/css/produto.css">
  <style>
    :root {
      --brand-primary: #0f2942;
      --accent: #1d4ed8;
      --accent-hover: #1e40af;
    }

    .btn-auth,
    .btn-nav {
      background-color: var(--brand-primary);
      color: #ffffff;
    }

    .btn-auth:hover,
    .btn-nav:hover {
      background-color: var(--accent-hover);
    }

    .auth-footer a,
    .form-opcoes a {
      color: var(--accent);
    }
  </style>
</head>
<body id="topo">
  <header>
    <div class="header-container">
      <div class="logo">
        <a href="<?= $baseUrl ?>/index.php?controller=painel&action=index" class="logo-link">
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
          <a href="<?= $baseUrl ?>/index.php?controller=painel&action=index">Início</a>
          <a href="<?= $baseUrl ?>/index.php?controller=produto&action=index">Catálogo</a>
          <a href="#contato">Contato</a>
        </div>
        <div class="nav-acoes">
          <a href="<?= $baseUrl ?>/index.php?controller=login&action=index" class="btn-entrar">Entrar</a>
          <a href="<?= $baseUrl ?>/index.php?controller=login&action=registrar" class="btn-nav">Criar Conta</a>
        </div>
      </nav>
    </div>
  </header>

  <main>
    <section class="auth-section">
      <div class="auth-card">
        <div class="auth-header">
          <div class="auth-icone-box">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#0f172a" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
          </div>
          <h2>Área do Cliente</h2>
          <p>Entre na sua conta para agilizar seu delivery</p>
        </div>

        <?php if (!empty($sucessoMsg)): ?>
          <p class="sucesso-login" role="status"><?= htmlspecialchars($sucessoMsg, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>

        <?php if (!empty($erroMsg)): ?>
          <p class="erro-login" role="alert"><?= htmlspecialchars($erroMsg, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>

        <form id="formLoginLS" method="POST" action="<?= $baseUrl ?>/index.php?controller=login&action=logar">
          <div class="form-grupo">
            <label for="emailLogin">Login (E-mail, WhatsApp ou Usuário)</label>
            <div class="input-wrapper">
              <span class="input-icon" aria-hidden="true">📱</span>
              <input
                type="text"
                id="emailLogin"
                name="login"
                value="<?= htmlspecialchars($loginAntigo, ENT_QUOTES, 'UTF-8') ?>"
                placeholder="Digite seu login ou e-mail"
                autocomplete="username"
                required
              >
            </div>
          </div>

          <div class="form-grupo">
            <label for="senhaLogin">Senha</label>
            <div class="input-wrapper">
              <span class="input-icon" aria-hidden="true">🔑</span>
              <input
                type="password"
                id="senhaLogin"
                name="senha"
                placeholder="Digite sua senha"
                autocomplete="current-password"
                required
              >
              <button type="button" class="btn-ver-senha" onclick="alternarSenha()" aria-label="Mostrar ou ocultar senha" title="Mostrar/Ocultar senha">👁️</button>
            </div>
          </div>

          <div class="form-opcoes">
            <label class="checkbox-label">
              <input type="checkbox" id="lembrarLogin" name="lembrar" value="1"> Lembrar de mim
            </label>
            <a href="https://wa.me/5561999999999" target="_blank" rel="noopener noreferrer">Esqueci a senha</a>
          </div>

          <button type="submit" class="btn-auth">Entrar na Conta →</button>
        </form>

        <div class="auth-divisor">
          <span>ou</span>
        </div>

        <div class="auth-footer">
          <p>Ainda não tem cadastro? <a href="<?= $baseUrl ?>/index.php?controller=login&action=registrar">Criar conta grátis</a></p>
        </div>
      </div>
    </section>
  </main>

  <!-- Rodapé -->
  <footer id="contato">
    <div class="container footer-grid">
      <!-- Coluna 1: Marca e Aviso -->
      <div class="footer-col">
        <h3 class="footer-logo">DISTRIBUIDORA <span>LS</span></h3>
        <p class="footer-desc">
          Bebidas geladas, combos de whisky e tabacaria completa com entrega rápida e segura na sua região.
        </p>
        <div class="aviso-idade">
          🔞 Venda proibida para menores de 18 anos. Beba com moderação.
        </div>
      </div>

      <!-- Coluna 2: Navegação -->
      <div class="footer-col">
        <h4>Navegação</h4>
        <ul class="footer-lista">
          <li><a href="<?= $baseUrl ?>/index.php?controller=painel&action=index">Início</a></li>
          <li><a href="<?= $baseUrl ?>/index.php?controller=produto&action=index">Catálogo Completo</a></li>
          <li><a href="<?= $baseUrl ?>/index.php?controller=login&action=index">Área do Cliente</a></li>
          <li><a href="<?= $baseUrl ?>/index.php?controller=login&action=registrar">Criar Conta</a></li>
        </ul>
      </div>

      <!-- Coluna 3: Atendimento e Contato -->
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

      <!-- Coluna 4: Pagamento -->
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
    function alternarSenha() {
      const input = document.getElementById('senhaLogin');
      if (!input) return;
      input.type = input.type === 'password' ? 'text' : 'password';
    }

    (function () {
      const inputLogin = document.getElementById('emailLogin');
      const checkLembrar = document.getElementById('lembrarLogin');
      const form = document.getElementById('formLoginLS');
      if (!inputLogin || !checkLembrar || !form) return;

      const loginSalvo = localStorage.getItem('loginSalvoLS');
      if (loginSalvo && !inputLogin.value) {
        inputLogin.value = loginSalvo;
        checkLembrar.checked = true;
      }

      form.addEventListener('submit', function () {
        if (checkLembrar.checked) {
          localStorage.setItem('loginSalvoLS', inputLogin.value.trim());
        } else {
          localStorage.removeItem('loginSalvoLS');
        }
      });
    })();
  </script>
</body>
</html>