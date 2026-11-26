<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$baseUrl = '/ProjetoModelo';
$usuarios = $usuarios ?? [];
$sucesso = $_SESSION['sucesso_usuario'] ?? ($sucesso ?? null);
$erro = $_SESSION['erro_usuario'] ?? ($erro ?? null);
unset($_SESSION['sucesso_usuario'], $_SESSION['erro_usuario']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários — Distribuidora LS</title>
    <link rel="icon" type="image/png" href="<?= $baseUrl ?>/public/favicon/icons8-copo-g-48.png">
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
            background: linear-gradient(135deg, #e2e8f0 0%, var(--bg-page) 55%, #dbeafe 100%);
            color: var(--text-main);
            padding: 28px 16px;
        }

        .container {
            max-width: 1040px;
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
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .badge-topo {
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
            font-size: 24px;
            font-weight: 700;
            line-height: 1.2;
            color: var(--text-main);
        }

        .topo p {
            margin: 4px 0 0;
            font-size: 14px;
            color: var(--text-muted);
        }

        .acoes-topo {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 10px 16px;
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

        .btn-outline {
            background: #ffffff;
            color: var(--text-main);
            border-color: var(--input-border);
        }

        .btn-outline:hover {
            background: #f8fafc;
        }

        .corpo {
            padding: 22px 28px 28px;
        }

        .alerta {
            padding: 12px 14px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 18px;
            border: 1px solid transparent;
        }

        .alerta-sucesso {
            background: var(--success-bg);
            border-color: var(--success-border);
            color: var(--success);
        }

        .alerta-erro {
            background: var(--danger-bg);
            border-color: var(--danger-border);
            color: var(--danger);
        }

        .barra-ferramentas {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .campo-busca {
            width: 100%;
            max-width: 340px;
            height: 40px;
            padding: 0 12px;
            border: 1px solid var(--input-border);
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            color: var(--text-main);
            background: #ffffff;
        }

        .campo-busca:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(29, 78, 216, 0.14);
        }

        .contador {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 500;
        }

        .tabela-responsiva {
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

        th {
            background: #f8fafc;
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            padding: 12px 16px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        td {
            padding: 13px 16px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
            background: #f1f5f9;
            color: var(--text-main);
        }

        .badge-admin {
            background: var(--accent-soft);
            color: var(--accent);
            border: 1px solid #bfdbfe;
        }

        .acoes-linha {
            display: inline-flex;
            gap: 8px;
            white-space: nowrap;
        }

        .acao-link {
            padding: 6px 11px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid transparent;
        }

        .acao-editar {
            color: var(--accent);
            background: var(--accent-soft);
            border-color: #bfdbfe;
        }

        .acao-editar:hover {
            background: #dbeafe;
        }

        .acao-excluir {
            color: var(--danger);
            background: var(--danger-bg);
            border-color: var(--danger-border);
        }

        .acao-excluir:hover {
            background: #fee2e2;
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

            .acoes-topo {
                width: 100%;
            }

            .acoes-topo .btn {
                flex: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="topo">
                <div>
                    <span class="badge-topo">Distribuidora LS • tbl_usuario</span>
                    <h2>Controle de Usuários</h2>
                    <p>Gerencie os colaboradores, operadores e perfis de acesso da Distribuidora LS.</p>
                </div>

                <div class="acoes-topo">
                    <a class="btn btn-outline" href="<?= $baseUrl ?>/index.php?controller=painel&action=index">← Início</a>
                    <a class="btn btn-primary" href="<?= $baseUrl ?>/index.php?controller=usuario&action=cadastrar">+ Novo Usuário</a>
                </div>
            </div>

            <div class="corpo">
                <?php if (!empty($sucesso)): ?>
                    <div class="alerta alerta-sucesso" role="status">
                        <?= htmlspecialchars($sucesso, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($erro)): ?>
                    <div class="alerta alerta-erro" role="alert">
                        <?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                <?php endif; ?>

                <div class="barra-ferramentas">
                    <input
                        type="search"
                        id="buscaUsuario"
                        class="campo-busca"
                        placeholder="Buscar por nome, login ou perfil..."
                        aria-label="Buscar usuário"
                    >
                    <span class="contador" id="contadorUsuarios">
                        <?= count($usuarios) ?> usuário(s) encontrado(s)
                    </span>
                </div>

                <div class="tabela-responsiva">
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
                                    <?php
                                        $id = (int) ($u['id'] ?? 0);
                                        $nome = (string) ($u['nome'] ?? '');
                                        $login = (string) ($u['login'] ?? '');
                                        $perfil = (string) ($u['perfil'] ?? '');
                                        $isAdmin = strtolower(trim($perfil)) === 'admin';
                                    ?>
                                    <tr class="linha-usuario">
                                        <td><?= $id ?></td>
                                        <td><?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($login, ENT_QUOTES, 'UTF-8') ?></td>
                                        <td>
                                            <span class="badge <?= $isAdmin ? 'badge-admin' : '' ?>">
                                                <?= htmlspecialchars($perfil, ENT_QUOTES, 'UTF-8') ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="acoes-linha">
                                                <a
                                                    class="acao-link acao-editar"
                                                    href="<?= $baseUrl ?>/index.php?controller=usuario&action=editar&id=<?= $id ?>"
                                                >
                                                    Editar
                                                </a>
                                                <a
                                                    class="acao-link acao-excluir"
                                                    href="<?= $baseUrl ?>/index.php?controller=usuario&action=excluir&id=<?= $id ?>"
                                                    onclick="return confirm('Deseja excluir o usuário <?= htmlspecialchars(addslashes($nome), ENT_QUOTES, 'UTF-8') ?>?')"
                                                >
                                                    Excluir
                                                </a>
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
            const busca = document.getElementById('buscaUsuario');
            const linhas = Array.from(document.querySelectorAll('#tabelaUsuarios tbody tr.linha-usuario'));
            const contador = document.getElementById('contadorUsuarios');
            if (!busca || !contador) return;

            busca.addEventListener('input', function () {
                const termo = busca.value.trim().toLowerCase();
                let visiveis = 0;

                linhas.forEach(function (linha) {
                    const corresponde = termo === '' || linha.textContent.toLowerCase().includes(termo);
                    linha.style.display = corresponde ? '' : 'none';
                    if (corresponde) visiveis++;
                });

                contador.textContent = visiveis + ' usuário(s) encontrado(s)';
            });
        })();
    </script>
</body>
</html>