<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$usuario = $usuario ?? [];
$nomeAtual = (string) ($_POST['nome'] ?? ($usuario['nome'] ?? ''));
$loginAtual = (string) ($_POST['login'] ?? ($usuario['login'] ?? ''));
$perfilAtual = strtolower(trim((string) ($_POST['perfil'] ?? ($usuario['perfil'] ?? 'aluno'))));

$erroMsg = $_SESSION['erro_usuario'] ?? ($erro ?? null);
$sucessoMsg = $_SESSION['sucesso_usuario'] ?? ($sucesso ?? null);
unset($_SESSION['erro_usuario'], $_SESSION['sucesso_usuario']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Usuário</title>
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
      background: linear-gradient(135deg, #e2e8f0 0%, var(--bg-page) 55%, #dbeafe 100%);
    }

    .card {
      width: 100%;
      max-width: 560px;
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

    .grid-campos {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 16px;
    }

    .campo {
      margin-bottom: 4px;
    }

    .campo-full {
      grid-column: 1 / -1;
    }

    .campo label {
      display: block;
      margin-bottom: 6px;
      font-size: 13px;
      font-weight: 600;
      color: var(--text-main);
    }

    .ajuda {
      display: block;
      margin-top: 5px;
      font-size: 12px;
      color: var(--text-muted);
    }

    .input-wrapper {
      position: relative;
      display: flex;
      align-items: center;
    }

    .campo input[type="text"],
    .campo input[type="password"],
    .campo select {
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

    .campo input:focus,
    .campo select:focus {
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

    @media (max-width: 560px) {
      .card {
        padding: 24px 18px;
      }

      .grid-campos {
        grid-template-columns: 1fr;
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
      <span class="badge">Gestão de Usuários</span>
      <h2>Editar Usuário</h2>
      <p>Atualize os dados de acesso, senha ou perfil da conta</p>
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
      <div class="grid-campos">
        <div class="campo campo-full">
          <label for="nome">Nome</label>
          <input
            type="text"
            id="nome"
            name="nome"
            value="<?= htmlspecialchars($nomeAtual, ENT_QUOTES, 'UTF-8') ?>"
            placeholder="Nome completo"
            autocomplete="name"
            required
          >
        </div>

        <div class="campo">
          <label for="login">Login</label>
          <input
            type="text"
            id="login"
            name="login"
            value="<?= htmlspecialchars($loginAtual, ENT_QUOTES, 'UTF-8') ?>"
            placeholder="Login de acesso"
            autocomplete="username"
            required
          >
        </div>

        <div class="campo">
          <label for="perfil">Perfil do Usuário</label>
          <select id="perfil" name="perfil" required>
            <option value="admin" <?= $perfilAtual === 'admin' ? 'selected' : '' ?>>Administrador</option>
            <option value="professor" <?= $perfilAtual === 'professor' ? 'selected' : '' ?>>Professor</option>
            <option value="aluno" <?= $perfilAtual === 'aluno' ? 'selected' : '' ?>>Aluno</option>
          </select>
        </div>

        <div class="campo campo-full">
          <label for="senha">Senha (Deixe em branco para manter a atual)</label>
          <div class="input-wrapper">
            <input
              type="password"
              id="senha"
              name="senha"
              placeholder="Digite uma nova senha (opcional)"
              autocomplete="new-password"
            >
            <button type="button" class="toggle-senha" id="btnToggleSenha" aria-label="Mostrar ou ocultar senha">
              Mostrar
            </button>
          </div>
          <span class="ajuda">Se ficar em branco, a senha atual será mantida.</span>
        </div>
      </div>

      <div class="acoes">
        <a href="index.php?controller=usuario&action=index" class="btn btn-voltar">Voltar</a>
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </div>
    </form>
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