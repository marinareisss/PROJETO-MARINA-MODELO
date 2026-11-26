<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$erroMsg = $_SESSION['erro_login'] ?? ($erro ?? null);
$loginAntigo = $_SESSION['login_antigo'] ?? ($_POST['login'] ?? '');
unset($_SESSION['erro_login'], $_SESSION['login_antigo']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — Sistema Escolar</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
      --danger: #b91c1c;
      --danger-bg: #fef2f2;
      --danger-border: #fecaca;
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
      background: linear-gradient(135deg, #e2e8f0 0%, var(--bg-page) 55%, #dbeafe 100%);
    }

    .login-card {
      width: 100%;
      max-width: 400px;
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 32px 28px;
    }

    .login-header {
      margin-bottom: 22px;
      text-align: center;
    }

    .login-badge {
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

    .login-header h2 {
      margin: 0;
      font-size: 24px;
      font-weight: 700;
      color: var(--text-main);
    }

    .login-header p {
      margin: 6px 0 0;
      font-size: 14px;
      color: var(--text-muted);
    }

    .alerta-erro {
      background: var(--danger-bg);
      color: var(--danger);
      border: 1px solid var(--danger-border);
      border-radius: 10px;
      padding: 11px 14px;
      font-size: 13px;
      font-weight: 500;
      margin-bottom: 18px;
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

    .input-wrapper {
      position: relative;
      display: flex;
      align-items: center;
    }

    .campo input[type="text"],
    .campo input[type="password"] {
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

    .campo input[type="password"] {
      padding-right: 76px;
    }

    .campo input:focus {
      outline: none;
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(29, 78, 216, 0.14);
    }

    .toggle-senha {
      position: absolute;
      right: 8px;
      background: transparent;
      border: none;
      color: var(--text-muted);
      font-family: inherit;
      font-size: 12px;
      font-weight: 600;
      padding: 6px 8px;
      border-radius: 6px;
      cursor: pointer;
    }

    .toggle-senha:hover {
      background: var(--accent-soft);
      color: var(--accent);
    }

    .btn-entrar {
      width: 100%;
      height: 44px;
      margin-top: 6px;
      background: var(--brand-primary);
      color: #ffffff;
      border: none;
      border-radius: 8px;
      font-family: inherit;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.15s ease;
    }

    .btn-entrar:hover {
      background: var(--accent-hover);
    }

    .login-footer {
      margin-top: 20px;
      padding-top: 14px;
      border-top: 1px solid var(--border);
      text-align: center;
      font-size: 12px;
      color: var(--text-muted);
    }
  </style>
</head>
<body>
  <div class="login-card">
    <div class="login-header">
      <span class="login-badge">Sistema Escolar</span>
      <h2>Acesso ao Sistema</h2>
      <p>Informe suas credenciais para entrar</p>
    </div>

    <?php if (!empty($erroMsg)): ?>
      <div class="alerta-erro" role="alert">
        <?= htmlspecialchars($erroMsg, ENT_QUOTES, 'UTF-8') ?>
      </div>
    <?php endif; ?>

    <form action="index.php?controller=login&action=logar" method="POST">
      <div class="campo">
        <label for="login">Login</label>
        <input
          type="text"
          id="login"
          name="login"
          value="<?= htmlspecialchars($loginAntigo, ENT_QUOTES, 'UTF-8') ?>"
          placeholder="Digite seu login"
          autocomplete="username"
          required
        >
      </div>

      <div class="campo">
        <label for="senha">Senha</label>
        <div class="input-wrapper">
          <input
            type="password"
            id="senha"
            name="senha"
            placeholder="Digite sua senha"
            autocomplete="current-password"
            required
          >
          <button type="button" class="toggle-senha" id="btnToggleSenha" aria-label="Mostrar ou ocultar senha">
            Mostrar
          </button>
        </div>
      </div>

      <button type="submit" class="btn-entrar">Entrar</button>
    </form>

    <div class="login-footer">
      Área restrita • Uso institucional
    </div>
  </div>

  <script>
    (function () {
      const btn = document.getElementById('btnToggleSenha');
      const inputSenha = document.getElementById('senha');
      if (!btn || !inputSenha) return;

      btn.addEventListener('click', function () {
        const visivel = inputSenha.type === 'text';
        inputSenha.type = visivel ? 'password' : 'text';
        btn.textContent = visivel ? 'Mostrar' : 'Ocultar';
      });
    })();
  </script>
</body>
</html>