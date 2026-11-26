<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$baseUrl = '/ProjetoModelo';
$usuario = $usuario ?? [];
$idUsuario = (int) ($usuario['id'] ?? ($_GET['id'] ?? 0));
$nomeAtual = (string) ($usuario['nome'] ?? '');
$loginAtual = (string) ($usuario['login'] ?? '');
$perfilAtual = strtolower(trim((string) ($usuario['perfil'] ?? 'aluno')));

$erro = $_SESSION['erro_usuario'] ?? ($erro ?? null);
$sucesso = $_SESSION['sucesso_usuario'] ?? ($sucesso ?? null);
unset($_SESSION['erro_usuario'], $_SESSION['sucesso_usuario']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário - Studio &amp; Salão</title>
    <link rel="shortcut icon" href="<?= $baseUrl ?>/public/vidalab/img_favicon/favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
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
            --danger: #b91c1c;
            --danger-bg: #fef2f2;
            --danger-border: #fecaca;
            --success: #15803d;
            --success-bg: #f0fdf4;
            --success-border: #bbf7d0;
            --radius: 14px;
            --shadow: 0 20px 44px -18px rgba(35, 25, 22, 0.16);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background: radial-gradient(circle at top left, #f6e7e0 0%, var(--bg-page) 52%, #f1e8e2 100%);
            color: var(--text-main);
            padding: 28px 16px;
        }

        .container {
            max-width: 680px;
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
            align-items: flex-start;
            gap: 16px;
        }

        .badge-tag {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--accent);
            background: var(--accent-soft);
            padding: 5px 11px;
            border-radius: 999px;
            margin-bottom: 8px;
        }

        .topo h2 {
            margin: 0;
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 28px;
            font-weight: 700;
            line-height: 1.15;
            color: var(--text-main);
        }

        .topo p {
            margin: 4px 0 0;
            font-size: 14px;
            color: var(--text-muted);
        }

        .resumo-usuario {
            background: var(--accent-soft);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 9px 14px;
            font-size: 13px;
            color: var(--text-muted);
        }

        .resumo-usuario strong {
            color: var(--text-main);
        }

        .corpo {
            padding: 24px 28px 28px;
        }

        .alerta {
            padding: 12px 14px;
            border-radius: 8px;
            font-size: 14px;
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
            margin-bottom: 16px;
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
            box-shadow: 0 0 0 3px rgba(159, 95, 70, 0.16);
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

        .acoes-form {
            margin-top: 8px;
            padding-top: 18px;
            border-top: 1px solid var(--border);
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 18px;
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
            background: var(--accent);
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
            background: var(--accent-soft);
        }

        @media (max-width: 600px) {
            .topo,
            .corpo {
                padding: 20px 16px;
            }

            .grid-campos {
                grid-template-columns: 1fr;
            }

            .acoes-form {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="topo">
                <div>
                    <span class="badge-tag">Studio &amp; Salão • tbl_usuario</span>
                    <h2>Editar Usuário</h2>
                    <p>Atualize os dados da conta, senha ou perfil de acesso.</p>
                </div>

                <?php if ($idUsuario > 0): ?>
                    <div class="resumo-usuario">
                        ID: <strong>#<?= $idUsuario ?></strong>
                    </div>
                <?php endif; ?>
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

                <form action="<?= $baseUrl ?>/index.php?controller=usuario&action=editar<?= $idUsuario > 0 ? '&id=' . $idUsuario : '' ?>" method="POST">
                    <?php if ($idUsuario > 0): ?>
                        <input type="hidden" name="id" value="<?= $idUsuario ?>">
                    <?php endif; ?>

                    <div class="grid-campos">
                        <div class="campo campo-full">
                            <label for="nome">Nome:</label>
                            <input
                                type="text"
                                id="nome"
                                name="nome"
                                value="<?= htmlspecialchars($nomeAtual, ENT_QUOTES, 'UTF-8') ?>"
                                placeholder="Nome completo do usuário"
                                required
                            >
                        </div>

                        <div class="campo">
                            <label for="login">Login:</label>
                            <input
                                type="text"
                                id="login"
                                name="login"
                                value="<?= htmlspecialchars($loginAtual, ENT_QUOTES, 'UTF-8') ?>"
                                placeholder="Login de acesso"
                                required
                            >
                        </div>

                        <div class="campo">
                            <label for="perfil">Perfil do Usuário:</label>
                            <select id="perfil" name="perfil" required>
                                <option value="admin" <?= $perfilAtual === 'admin' ? 'selected' : '' ?>>Administrador</option>
                                <option value="professor" <?= $perfilAtual === 'professor' ? 'selected' : '' ?>>Professor</option>
                                <option value="aluno" <?= $perfilAtual === 'aluno' ? 'selected' : '' ?>>Aluno</option>
                            </select>
                        </div>

                        <div class="campo campo-full">
                            <label for="senha">Senha (Deixe em branco para manter a atual):</label>
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

                    <div class="acoes-form">
                        <a class="btn btn-outline" href="<?= $baseUrl ?>/index.php?controller=usuario&action=index">Voltar</a>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
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