<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$baseUrl = '/ProjetoModelo';
$erroLogin = $_SESSION['erro_login'] ?? ($erro ?? null);
$sucessoLogin = $_SESSION['sucesso_login'] ?? null;
unset($_SESSION['erro_login'], $_SESSION['sucesso_login']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Salão Bella</title>
  <link rel="shortcut icon" href="<?= $baseUrl ?>/public/img_favicon/secador.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= $baseUrl ?>/app/views/css/style.css">
  <style>
    :root {
      --bg-page: #faf7f5;
      --bg-card: #ffffff;
      --accent: #9f5f46;
      --accent-hover: #824b36;
      --accent-soft: #fdf4f0;
      --text-main: #231916;
      --text-muted: #6e5d56;
      --border: #eadfd9;
      --input-border: #d8c7be;
    }

    body {
      font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
      background-color: var(--bg-page);
      color: var(--text-main);
      margin: 0;
    }

    .secao-login {
      min-height: calc(100vh - 90px);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 50px 20px;
      background: linear-gradient(135deg, #fdf8f5 0%, #f5ebe4 100%);
    }

    .card-login {
      width: 100%;
      max-width: 440px;
      background-color: var(--bg-card);
      padding: 40px 34px;
      border-radius: 18px;
      border: 1px solid var(--border);
      box-shadow: 0 15px 35px rgba(35, 25, 22, 0.10);
      text-align: center;
    }

    .card-login .subtitulo-secao {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 2px;
      color: var(--accent);
      margin-bottom: 8px;
    }

    .card-login h2 {
      font-family: 'Cormorant Garamond', Georgia, serif;
      font-size: 32px;
      color: var(--text-main);
      margin: 0 0 12px;
    }

    .card-login .divisor {
      width: 50px;
      height: 3px;
      background: linear-gradient(to right, var(--accent), #d7b892);
      margin: 0 auto 14px;
      border-radius: 2px;
    }

    .card-login .texto-centro {
      font-size: 14px;
      color: var(--text-muted);
      line-height: 1.5;
      margin-bottom: 26px;
    }

    .alerta-erro {
      background-color: #fdeceb;
      color: #9e2a2b;
      border: 1px solid #f5c2c7;
      border-radius: 10px;
      padding: 10px 14px;
      font-size: 13px;
      margin-bottom: 18px;
      text-align: left;
    }

    .alerta-sucesso {
      background-color: #eef8f1;
      color: #1f6f3e;
      border: 1px solid #b7e4c7;
      border-radius: 10px;
      padding: 10px 14px;
      font-size: 13px;
      margin-bottom: 18px;
      text-align: left;
    }

    .form-login {
      text-align: left;
    }

    .campo-grupo {
      margin-bottom: 18px;
    }

    .campo-grupo label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: var(--text-main);
      margin-bottom: 6px;
    }

    .campo-grupo input {
      width: 100%;
      padding: 13px 15px;
      font-size: 14px;
      color: var(--text-main);
      background-color: #fcfaf8;
      border: 1.5px solid var(--input-border);
      border-radius: 10px;
      outline: none;
      box-sizing: border-box;
      transition: all 0.2s ease;
    }

    .campo-grupo input:focus {
      background-color: #ffffff;
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(159, 95, 70, 0.14);
    }

    .opcoes-login {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 24px;
      font-size: 13px;
    }

    .lembrar-check {
      display: flex;
      align-items: center;
      gap: 6px;
      color: var(--text-muted);
      cursor: pointer;
    }

    .lembrar-check input {
      accent-color: var(--accent);
      width: 15px;
      height: 15px;
      cursor: pointer;
    }

    .link-esqueci {
      color: var(--accent);
      text-decoration: none;
      font-weight: 600;
    }

    .link-esqueci:hover {
      text-decoration: underline;
    }

    .botao-entrar {
      width: 100%;
      padding: 14px;
      background-color: var(--accent);
      color: #ffffff;
      border: none;
      border-radius: 30px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.2s ease, transform 0.2s ease;
    }

    .botao-entrar:hover {
      background-color: var(--accent-hover);
      transform: translateY(-1px);
    }

    .rodape-form {
      margin-top: 24px;
      padding-top: 18px;
      border-top: 1px solid var(--border);
      text-align: center;
      font-size: 14px;
      color: var(--text-muted);
    }

    .rodape-form a {
      color: var(--accent);
      font-weight: 700;
      text-decoration: none;
    }

    .rodape-form a:hover {
      text-decoration: underline;
    }

    .voltar-inicio {
      display: inline-block;
      margin-top: 12px;
      font-size: 13px;
      color: var(--text-muted) !important;
      font-weight: 500 !important;
    }

    @media (max-width: 480px) {
      .card-login {
        padding: 30px 22px;
      }
    }
  </style>
</head>
<body>

  <header class="topo">
    <div class="caixa-logo">
      <svg class="icone-logo" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g stroke="#f5e6d3" stroke-width="1.3">
          <polygon points="50,5 68,28 50,50 32,28" />
          <polygon points="50,95 68,72 50,50 32,72" />
          <polygon points="5,50 28,32 50,50 28,68" />
          <polygon points="95,50 72,32 50,50 72,68" />
          <polygon points="18,18 45,25 50,50 25,45" />
          <polygon points="82,18 75,45 50,50 55,25" />
          <polygon points="18,82 25,55 50,50 45,75" />
          <polygon points="82,82 55,75 50,50 75,55" />
        </g>
        <circle cx="50" cy="50" r="18" fill="#9f5f46" stroke="#f5e6d3" stroke-width="1.2"/>
        <text x="50" y="55" text-anchor="middle" fill="#ffffff" font-family="Cormorant Garamond, serif" font-size="16" font-weight="700">SB</text>
      </svg>

      <div class="nome-salao">
        <h1>Salão Bella</h1>
        <p>Beleza e cuidado em cada detalhe</p>
      </div>
    </div>

    <nav class="menu">
      <a href="<?= $baseUrl ?>/index.php?controller=painel&action=index">Início</a>
      <a href="<?= $baseUrl ?>/index.php?controller=painel&action=index#sobre">Sobre</a>
      <a href="<?= $baseUrl ?>/index.php?controller=produto&action=index">Serviços</a>
      <a href="<?= $baseUrl ?>/index.php?controller=painel&action=index#galeria">Galeria</a>
      <a href="<?= $baseUrl ?>/index.php?controller=usuario&action=index">Gerenciar Usuários</a>
      <a href="<?= $baseUrl ?>/index.php?controller=login&action=index">Login</a>
      <a href="<?= $baseUrl ?>/index.php?controller=login&action=registrar">Cadastro</a>
      <a href="#contato">Contato</a>
      <a href="<?= $baseUrl ?>/index.php?controller=painel&action=index#agendamento" class="botao-menu">Agendamento</a>
    </nav>
  </header>

  <main>
    <section class="secao-login">
      <div class="card-login">
        <p class="subtitulo-secao">ÁREA DO CLIENTE</p>
        <h2>Bem-vinda de volta</h2>
        <div class="divisor"></div>
        <p class="texto-centro">Acesse sua conta para gerenciar seus horários e históricos de atendimento.</p>

        <?php if (!empty($sucessoLogin)): ?>
          <div class="alerta-sucesso"><?= htmlspecialchars($sucessoLogin, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <?php if (!empty($erroLogin)): ?>
          <div class="alerta-erro"><?= htmlspecialchars($erroLogin, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <form class="form-login" action="<?= $baseUrl ?>/index.php?controller=login&action=logar" method="post">
          <div class="campo-grupo">
            <label for="email">Login ou E-mail</label>
            <input type="text" id="email" name="login" placeholder="Digite seu login ou e-mail" autocomplete="username" required>
          </div>

          <div class="campo-grupo">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" autocomplete="current-password" required>
          </div>

          <div class="opcoes-login">
            <label class="lembrar-check">
              <input type="checkbox" name="lembrar" value="1">
              <span>Lembrar meu acesso</span>
            </label>
            <a href="<?= $baseUrl ?>/index.php?controller=login&action=registrar" class="link-esqueci">Criar nova conta</a>
          </div>

          <button type="submit" class="botao-entrar">Entrar na conta</button>

          <div class="rodape-form">
            <p>Ainda não tem cadastro? <a href="<?= $baseUrl ?>/index.php?controller=login&action=registrar">Criar uma conta</a></p>
            <a href="<?= $baseUrl ?>/index.php?controller=painel&action=index" class="voltar-inicio">← Voltar para a página inicial</a>
          </div>
        </form>
      </div>
    </section>
  </main>

  <footer class="rodape" id="contato">
    <div class="rodape-conteudo">
      <div class="rodape-coluna">
        <h3>Salão Bella</h3>
        <p>Beleza, autoestima e cuidado em cada detalhe. Um espaço pensado especialmente para realçar o melhor de você.</p>
      </div>

      <div class="rodape-coluna">
        <h4>Horário de Atendimento</h4>
        <p>Segunda a Sexta: 09h às 19h</p>
        <p>Sábado: 08h30 às 18h</p>
        <p class="fechado">Domingo: Fechado</p>
      </div>

      <div class="rodape-coluna">
        <h4>Contato e Localização</h4>
        <p>📍 Av. Principal, Quadra 10, Loja 02 - Centro</p>
        <p>📱 WhatsApp: (61) 99999-9999</p>
        <p>📸 Instagram: @salaobella.oficial</p>
      </div>
    </div>

    <div class="rodape-base">
      <p>© <?= date('Y') ?> Salão Bella — Todos os direitos reservados.</p>
      <p class="desenvolvedor">Desenvolvido por <strong>Marina Reis</strong></p>
    </div>
  </footer>

</body>
</html>