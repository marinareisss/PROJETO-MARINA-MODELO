<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$baseUrl = '/ProjetoModelo';
$usuarios = $usuarios ?? [];
$erroMsg = $_SESSION['erro_usuario'] ?? ($erro ?? null);
$sucessoMsg = $_SESSION['sucesso_usuario'] ?? ($sucesso ?? null);
unset($_SESSION['erro_usuario'], $_SESSION['sucesso_usuario']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuários</title>
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
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      color: var(--text-main);
      background: linear-gradient(135deg, #e2e8f0 0%, var(--bg-page) 55%, #dbeafe 100%);
      padding: 28px 16px;
    }

    .container {
      max-width: 980px;
      margin: 0 auto;
    }

    .card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow: hidden;
    }

    .topo {
      padding: 24px 28px;
      border-bottom: 1px solid var(--border);
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
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
      margin-bottom: 8px;
    }

    .topo h2 {
      margin: 0;
      font-size: 22px;
      font-weight: 700;
      color: var(--text-main);
    }

    .topo p {
      margin: 4px 0 0;
      font-size: 14px;
      color: var(--text-muted);
    }

    .topo-acoes {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 10px;
    }

    .btn-voltar-inicio {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      height: 40px;
      padding: 0 14px;
      border-radius: 8px;
      background: #ffffff;
      color: var(--text-main);
      border: 1px solid var(--input-border);
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.15s ease;
      white-space: nowrap;
    }

    .btn-voltar-inicio:hover {
      background: #f8fafc;
      border-color: var(--accent);
      color: var(--accent);
    }

    .btn-novo {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      height: 40px;
      padding: 0 16px;
      border-radius: 8px;
      background: var(--brand-primary);
      color: #ffffff;
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      transition: background-color 0.15s ease;
      white-space: nowrap;
    }

    .btn-novo:hover {
      background: var(--accent-hover);
    }

    .corpo {
      padding: 22px 28px 28px;
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

    .barra-filtro {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      margin-bottom: 16px;
    }

    .filtro-input {
      width: 100%;
      max-width: 340px;
      height: 38px;
      padding: 0 12px;
      font-family: inherit;
      font-size: 14px;
      color: var(--text-main);
      background: #ffffff;
      border: 1px solid var(--input-border);
      border-radius: 8px;
      transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }

    .filtro-input:focus {
      outline: none;
      border-color: var(--accent);
      box-shadow: 0 0 0 3px rgba(29, 78, 216, 0.14);
    }

    .contador-registros {
      font-size: 13px;
      color: var(--text-muted);
      font-weight: 500;
    }

    .tabela-wrap {
      width: 100%;
      overflow-x: auto;
      border: 1px solid var(--border);
      border-radius: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
      font-size: 14px;
    }

    thead th {
      background: #f8fafc;
      color: var(--text-muted);
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      padding: 12px 14px;
      border-bottom: 1px solid var(--border);
      white-space: nowrap;
    }

    tbody td {
      padding: 12px 14px;
      border-bottom: 1px solid var(--border);
      color: var(--text-main);
      vertical-align: middle;
    }

    tbody tr:last-child td {
      border-bottom: none;
    }

    tbody tr:hover {
      background: #f8fafc;
    }

    .badge-perfil {
      display: inline-block;
      padding: 4px 10px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 600;
      background: var(--accent-soft);
      color: var(--accent);
      text-transform: capitalize;
    }

    .acoes-celula {
      display: flex;
      align-items: center;
      gap: 8px;
      white-space: nowrap;
    }

    .link-acao {
      display: inline-flex;
      align-items: center;
      height: 30px;
      padding: 0 10px;
      border-radius: 6px;
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
      border: 1px solid var(--input-border);
      color: var(--text-main);
      background: #ffffff;
      transition: all 0.15s ease;
    }

    .link-acao:hover {
      border-color: var(--accent);
      color: var(--accent);
      background: var(--accent-soft);
    }

    .link-excluir {
      color: var(--danger);
      border-color: var(--danger-border);
      background: #ffffff;
    }

    .link-excluir:hover {
      background: var(--danger-bg);
      border-color: var(--danger);
      color: var(--danger);
    }

    .vazio {
      text-align: center;
      padding: 28px 16px;
      color: var(--text-muted);
    }

    @media (max-width: 640px) {
      .topo,
      .corpo {
        padding: 20px 16px;
      }

      .topo-acoes {
        width: 100%;
        flex-direction: column;
      }

      .btn-voltar-inicio,
      .btn-novo {
        width: 100%;
      }

      .filtro-input {
        max-width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="topo">
        <div>
          <span class="badge">tbl_usuario</span>
          <h2>Controle de Usuários</h2>
          <p>Gerencie contas, perfis de acesso e permissões do sistema</p>
        </div>

        <div class="topo-acoes">
          <a href="<?= $baseUrl ?>/index.php" class="btn-voltar-inicio">← Voltar ao Início</a>
          <a href="index.php?controller=usuario&action=cadastrar" class="btn-novo">+ Novo Usuário</a>
        </div>
      </div>

      <div class="corpo">
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

        <div class="barra-filtro">
          <input
            type="search"
            id="filtroUsuario"
            class="filtro-input"
            placeholder="Buscar por nome, login ou perfil..."
            aria-label="Buscar usuário"
          >
          <span class="contador-registros" id="contadorRegistros">
            <?= count($usuarios) ?> <?= count($usuarios) === 1 ? 'registro' : 'registros' ?>
          </span>
        </div>

        <div class="tabela-wrap">
          <table id="tabelaUsuarios">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Login</th>
                <th>Perfil</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($usuarios)): ?>
                <tr>
                  <td colspan="5" class="vazio">Nenhum registro encontrado.</td>
                </tr>
              <?php else: ?>
                <?php foreach ($usuarios as $u): ?>
                  <?php $idU = (int) ($u['id'] ?? 0); ?>
                  <tr class="linha-usuario">
                    <td>#<?= $idU ?></td>
                    <td><?= htmlspecialchars((string) ($u['nome'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string) ($u['login'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                      <span class="badge-perfil">
                        <?= htmlspecialchars((string) ($u['perfil'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
                      </span>
                    </td>
                    <td>
                      <div class="acoes-celula">
                        <a href="index.php?controller=usuario&action=editar&id=<?= $idU ?>" class="link-acao">Editar</a>
                        <a
                          href="index.php?controller=usuario&action=excluir&id=<?= $idU ?>"
                          class="link-acao link-excluir"
                          onclick="return confirm('Deseja excluir este usuário?')"
                        >Excluir</a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    (function () {
      const inputBusca = document.getElementById('filtroUsuario');
      const linhas = Array.from(document.querySelectorAll('#tabelaUsuarios tbody tr.linha-usuario'));
      const contador = document.getElementById('contadorRegistros');
      if (!inputBusca || !contador || linhas.length === 0) return;

      inputBusca.addEventListener('input', function () {
        const termo = inputBusca.value.trim().toLowerCase();
        let visiveis = 0;

        linhas.forEach(function (linha) {
          const texto = linha.textContent.toLowerCase();
          const corresponde = texto.includes(termo);
          linha.style.display = corresponde ? '' : 'none';
          if (corresponde) visiveis += 1;
        });

        contador.textContent = visiveis + (visiveis === 1 ? ' registro' : ' registros');
      });
    })();
  </script>
</body>
</html>