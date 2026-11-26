<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$baseUrl = '/ProjetoModelo';
$erroCadastro = $_SESSION['erro_cadastro'] ?? null;
unset($_SESSION['erro_cadastro']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro | Salão Bella</title>
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
      max-width: 520px;
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

    .form-login {
      text-align: left;
    }

    .linha-dupla {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 14px;
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

    .opcoes-cadastro {
      margin-bottom: 22px;
      font-size: 13px;
    }

    .lembrar-check {
      display: flex;
      align-items: flex-start;
      gap: 8px;
      color: var(--text-muted);
      cursor: pointer;
      line-height: 1.4;
    }

    .lembrar-check input {
      accent-color: var(--accent);
      width: 15px;
      height: 15px;
      margin-top: 2px;
      flex-shrink: 0;
      cursor: pointer;
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

    @media (max-width: 600px) {
      .linha-dupla {
        grid-template-columns: 1fr;
        gap: 0;
      }
    }
  </style>
</head>
<body>

  <header class="topo">
    <div class="caixa-logo">
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
      <a href="<?= $baseUrl ?>/index.php?controller=login&action=index">Login</a>
      <a href="<?= $baseUrl ?>/index.php?controller=login&action=registrar">Cadastro</a>
      <a href="#contato">Contato</a>
      <a href="<?= $baseUrl ?>/index.php?controller=painel&action=index#agendamento" class="botao-menu">Agendamento</a>
    </nav>
  </header>

  <main>
    <section class="secao-login">
      <div class="card-login">
        <p class="subtitulo-secao">CRIE SUA CONTA</p>
        <h2>Cadastro</h2>
        <div class="divisor"></div>
        <p class="texto-centro">Preencha seus dados para agendar seus horários com facilidade e acompanhar seus atendimentos.</p>

        <?php if (!empty($erroCadastro)): ?>
          <div class="alerta-erro"><?= htmlspecialchars($erroCadastro, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <form class="form-login" action="<?= $baseUrl ?>/index.php?controller=login&action=registrar" method="post">
          <div class="campo-grupo">
            <label for="nome">Nome completo</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" autocomplete="name" required>
          </div>

          <div class="linha-dupla">
            <div class="campo-grupo">
              <label for="whatsapp">WhatsApp</label>
              <input type="tel" id="whatsapp" name="whatsapp" placeholder="(61) 99999-9999" autocomplete="tel" required>
            </div>

            <div class="campo-grupo">
              <label for="email">E-mail</label>
              <input type="email" id="email" name="email" placeholder="exemplo@email.com" autocomplete="email" required>
            </div>
          </div>

          <div class="linha-dupla">
            <div class="campo-grupo">
              <label for="senha">Senha</label>
              <input type="password" id="senha" name="senha" placeholder="Mínimo 6 caracteres" minlength="6" autocomplete="new-password" required>
            </div>

            <div class="campo-grupo">
              <label for="confirmar-senha">Confirmar senha</label>
              <input type="password" id="confirmar-senha" name="confirmar_senha" placeholder="Repita a senha" minlength="6" autocomplete="new-password" required>
            </div>
          </div>

          <div class="opcoes-cadastro">
            <label class="lembrar-check">
              <input type="checkbox" name="termos" value="1" required>
              <span>Concordo com os Termos de Uso e aceito receber lembretes de agendamento no WhatsApp.</span>
            </label>
          </div>

          <button type="submit" class="botao-entrar">Criar minha conta</button>

          <div class="rodape-form">
            <p>Já tem uma conta? <a href="<?= $baseUrl ?>/index.php?controller=login&action=index">Fazer Login</a></p>
            <a href="<?= $baseUrl ?>/index.php?controller=painel&action=index" class="voltar-inicio">← Voltar para o início</a>
          </div>
        </form>
      </div>
    </section>
  </main>

  <footer class="rodape" id="contato">
    <div class="rodape-base">
      <p>© <?= date('Y') ?> Salão Bella — Todos os direitos reservados.</p>
    </div>
  </footer>

</body>
</html>