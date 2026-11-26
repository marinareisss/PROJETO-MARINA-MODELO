<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$erroMsg = $_SESSION['erro_usuario'] ?? ($erro ?? null);
$sucessoMsg = $_SESSION['sucesso_usuario'] ?? ($sucesso ?? null);
$dadosAntigos = $_SESSION['dados_usuario'] ?? ($_POST ?? []);
unset($_SESSION['erro_usuario'], $_SESSION['sucesso_usuario'], $_SESSION['dados_usuario']);

$nomeAntigo = (string) ($dadosAntigos['nome'] ?? '');
$emailAntigo = (string) ($dadosAntigos['email'] ?? '');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Usuário — Salão</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg-page: #f8fafc;
      --bg-card: #ffffff;
      --brand-primary: #1e1b4b;
      --accent: #7c3aed;
      --accent-hover: #6d28d9;
      --accent-soft: #f3e8ff;
      --text-main: #0f172a;
      --text-muted: #64748b;
      --border: #e2e8f0;
      --input-border: #cbd5e1;
      --danger: #b91c1c;
      --danger-bg: #fef2f2;
      --danger-border: #fecaca;
      --success: #15803d;
      --success-bg: #f0fdf4;
      --success-border: #bbf7d0;
      --radius: 14px;
      --shadow: 0 18px 38px -18px rgba(15, 23, 42, 0.22);
    }

    *, *::before, *::after {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px 16px;
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      color: var(--text-main);
      background: linear-gradient(135deg, #f1f5f9 0%, var(--bg-page) 55%, #ede9fe 100%);
    }

    .card {
      width: 100%;
      max-width: 460px;
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 32px 28px;
    }

    .card-header {
      margin-bottom: 22px;
    }

    .badge {
      display: inline-block;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--accent);
      background: var(--accent-soft);
      padding: 5px 11px;
      border-radius: 999px;
      margin-bottom: 10px;
    }

    .card-header h2 {
      margin: 0;
      font-size: 24px;
      font-weight: 700;
      color: var(--text-main);
    }

    .card-header p {
      margin: 6px 0 0;
      font-size: 14px;
      color: var(--text-muted);
    }

    .alerta {
      padding: 11px 14px;
      border-radius: 10px;
      font-size: 13px;
      font-weight: 500;
      margin-bottom: 18px;
      border: 1px solid transparent;
    }

    .alerta-erro {
      background: var(--danger-bg);
      border-color: var(--danger-border);
      color: var(--danger);
    }

    .alerta-sucesso {
      background: var(--success-bg);
      border-color: var(--success-border);
      color: var(--success);
    }

    .campo {
      margin-bottom: 16px;
    }

    .campo label {
      display: block;
      margin-bottom: 6px;
      font-size: 13px;
      font-weight: 600;
      color: var(--text-main);
    }

    .campo input[type="text"],
    .campo input[type="email"] {
      width: 100%;
      height: 42px;
      padding: 0 12px;
      font-family: inherit;
      font-size: 14px;
      color: var(--text-main);
      background: #ffffff;
      border: 1px solid var(--input-border);
      border-radius: 8px;
      transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }

    .campo input:focus {
      outline: none;
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.14);
    }

    .acoes {
      margin-top: 22px;
      padding-top: 18px;
      border-top: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 10px;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      height: 42px;
      padding: 0 18px;
      border-radius: 8px;
      font-family: inherit;
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      border: 1px solid transparent;
      cursor: pointer;
      transition: all 0.15s ease;
    }

    .btn-primary {
      background: var(--brand-primary);
      color: #ffffff;
    }

    .btn-primary:hover {
      background: var(--accent-hover);
    }

    .btn-voltar {
      background: #ffffff;
      color: var(--text-main);
      border-color: var(--input-border);
    }

    .btn-voltar:hover {
      background: #f8fafc;
    }

    @media (max-width: 480px) {
      .card {
        padding: 24px 18px;
      }

      .acoes {
        flex-direction: column-reverse;
      }

      .btn {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="card-header">
      <span class="badge">Salão • Equipe &amp; Acesso</span>
      <h2>Novo Usuário</h2>
      <p>Cadastre um membro da equipe para acessar o sistema do salão</p>
    </div>

    <?php if (!empty($sucessoMsg)): ?>
      <div class="alerta alerta-sucesso" role="status">
        <?= htmlspecialchars($sucessoMsg, ENT_QUOTES, 'UTF-8') ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($erroMsg)): ?>
      <div class="alerta alerta-erro" role="alert">
        <?= htmlspecialchars($erroMsg, ENT_QUOTES, 'UTF-8') ?>
      </div>
    <?php endif; ?>

    <form method="POST">
      <div class="campo">
        <label for="nome">Nome</label>
        <input
          type="text"
          id="nome"
          name="nome"
          value="<?= htmlspecialchars($nomeAntigo, ENT_QUOTES, 'UTF-8') ?>"
          placeholder="Ex: Ana Paula Silva"
          autocomplete="name"
          required
        >
      </div>

      <div class="campo">
        <label for="email">E-mail</label>
        <input
          type="email"
          id="email"
          name="email"
          value="<?= htmlspecialchars($emailAntigo, ENT_QUOTES, 'UTF-8') ?>"
          placeholder="ana@salao.com.br"
          autocomplete="email"
          required
        >
      </div>

      <div class="acoes">
        <a href="index.php?controller=usuario&action=index" class="btn btn-voltar">Voltar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>
</body>
</html>