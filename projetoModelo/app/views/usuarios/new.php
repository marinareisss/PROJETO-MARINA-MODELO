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
  <title>Cadastro | Distribuidora LS</title>
  <link rel="icon" type="image/png" href="<?= $baseUrl ?>/public/favicon/icons8-copo-g-48.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg-page: #f1f5f9;
      --bg-card: #ffffff;
      --brand-primary: #0f2942;
      --accent: #1d4ed8;
      --accent-hover: #1e40af;
      --accent-soft: #eff6ff;
      --text-main: #0f172a;
      --text-muted: #64748b;
      --border: #e2e8f0;
      --input-border: #cbd5e1;
    }

    *, *::before, *::after {
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      background-color: var(--bg-page);
      color: var(--text-main);
      margin: 0;
    }

    .topo {
      background-color: var(--brand-primary);
      color: #ffffff;
      padding: 16px 28px;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
    }

    .nome-distribuidora h1 {
      margin: 0;
      font-size: 20px;
      font-weight: 800;
      letter-spacing: 0.02em;
    }

    .nome-distribuidora p {
      margin: 2px 0 0;
      font-size: 12px;
      color: #cbd5e1;
    }

    .menu {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 16px;
      font-size: 14px;
    }

    .menu a {
      color: #e2e8f0;
      text-decoration: none;
      font-weight: 500;
    }

    .menu a:hover {
      color: #ffffff;
    }

    .botao-menu {
      background-color: var(--accent);
      color: #ffffff !important;
      padding: 8px 14px;
      border-radius: 8px;
      font-weight: 600 !important;
    }

    .botao-menu:hover {
      background-color: var(--accent-hover);
    }

    .secao-login {
      min-height: calc(100vh - 140px);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 44px 20px;
      background: linear-gradient(135deg, #e2e8f0 0%, var(--bg-page) 55%, #dbeafe 100%);
    }

    .card-login {
      width: 100%;
      max-width: 520px;
      background-color: var(--bg-card);
      padding: 38px 34px;
      border-radius: 16px;
      border: 1px solid var(--border);
      box-shadow: 0 18px 38px -18px rgba(15, 23, 42, 0.22);
      text-align: center;
    }

    .card-login .subtitulo-secao {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--accent);
      background: var(--accent-soft);
      display: inline-block;
      padding: 5px 12px;
      border-radius: 999px;
      margin: 0 0 10px;
    }

    .card-login h2 {
      font-size: 28px;
      font-weight: 700;
      color: var(--text-main);
      margin: 0 0 10px;
    }

    .card-login .divisor {
      width: 52px;
      height: 3px;
      background: linear-gradient(to right, var(--brand-primary), var(--accent));
      margin: 0 auto 14px;
      border-radius: 2px;
    }

    .card-login .texto-centro {
      font-size: 14px;
      color: var(--text-muted);
      line-height: 1.5;
      margin: 0 0 24px;
    }

    .alerta-erro {
      background-color: #fef2f2;
      color: #b91c1c;
      border: 1px solid #fecaca;
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
      margin-bottom: 16px;
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
      padding: 12px 14px;
      font-family: inherit;
      font-size: 14px;
      color: var(--text-main);
      background-color: #ffffff;
      border: 1px solid var(--input-border);
      border-radius: 10px;
      outline: none;
      transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }

    .campo-grupo input:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(29, 78, 216, 0.14);
    }

    .opcoes-cadastro {
      margin-bottom: 20px;
      font-size: 13px;
    }

    .lembrar-check {
      display: flex;
      align-items: flex-start;
      gap: 8px;
      color: var(--text-muted);
      cursor: pointer;
      line-height: 1.45;
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
      padding: 13px 18px;
      background-color: var(--brand-primary);
      color: #ffffff;
      border: none;
      border-radius: 10px;
      font-family: inherit;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.15s ease;
    }

    .botao-entrar:hover {
      background-color: var(--accent-hover);
    }

    .rodape-form {
      margin-top: 22px;
      padding-top: 16px;
      border-top: 1px solid var(--border);
      text-align: center;
      font-size: 14px;
      color: var(--text-muted);
    }

    .rodape-form p {
      margin: 0;
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
      margin-top: 10px;
      font-size: 13px;
      color: var(--text-muted) !important;
      font-weight: 500 !important;
    }

    .rodape {
      background-color: var(--brand-primary);
      color: #cbd5e1;
      text-align: center;
      padding: 18px 20px;
      font-size: 13px;
    }

    .rodape p {
      margin: 0;
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
    <div class="nome-distribuidora">
      <h1>Distribuidora LS</h1>
      <p>Bebidas &amp; Tabacaria</p>
    </div>

    <nav class="menu">
      <a href="<?= $baseUrl ?>/index.php?controller=painel&action=index">Início</a>
      <a href="<?= $baseUrl ?>/index.php?controller=produto&action=index">Catálogo</a>
      <a href="<?= $baseUrl ?>/index.php?controller=login&action=index">Login</a>
      <a href="<?= $baseUrl ?>/index.php?controller=login&action=registrar">Cadastro</a>
      <a href="<?= $baseUrl ?>/index.php?controller=painel&action=index#contato">Contato</a>
      <a href="<?= $baseUrl ?>/index.php?controller=produto&action=index" class="botao-menu">Ver Catálogo</a>
    </nav>
  </header>

  <main>
    <section class="secao-login">
      <div class="card-login">
        <p class="subtitulo-secao">CRIE SUA CONTA</p>
        <h2>Cadastro</h2>
        <div class="divisor"></div>
        <p class="texto-centro">Preencha seus dados para receber promoções de combos e pedir seus produtos com agilidade na Distribuidora LS.</p>

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
              <span>Declaro que tenho <strong>18 anos ou mais</strong> e concordo com os Termos de Uso da Distribuidora LS.</span>
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
    <p>© <?= date('Y') ?> Distribuidora LS — Todos os direitos reservados.</p>
  </footer>

</body>
</html>