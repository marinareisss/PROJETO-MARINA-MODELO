<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$baseUrl = '/ProjetoModelo';
$erro = $_SESSION['erro_login'] ?? ($erro ?? null);
$loginAntigo = $_SESSION['login_antigo'] ?? '';
unset($_SESSION['erro_login'], $_SESSION['login_antigo']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Studio &amp; Salão</title>
    <link rel="shortcut icon" href="<?= $baseUrl ?>/public/img_favicon/secador.png" type="image/x-icon">
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
            --error-bg: #fef2f2;
            --error-border: #fecaca;
            --error-text: #b91c1c;
            --radius: 14px;
            --shadow: 0 20px 44px -18px rgba(35, 25, 22, 0.16);
        }

        *, *::before, *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background: radial-gradient(circle at top left, #f6e7e0 0%, var(--bg-page) 52%, #f1e8e2 100%);
            color: var(--text-main);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
        }

        .login-box {
            width: 100%;
            max-width: 390px;
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 32px 28px;
            box-shadow: var(--shadow);
        }

        .selo-salao {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: var(--accent);
            background: var(--accent-soft);
            padding: 5px 11px;
            border-radius: 999px;
            margin-bottom: 12px;
        }

        h2 {
            margin: 0 0 6px;
            font-family: 'Cormorant Garamond', Georgia, serif;
            font-size: 30px;
            font-weight: 700;
            line-height: 1.15;
            color: var(--text-main);
        }

        .subtitulo {
            margin: 0 0 22px;
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.45;
        }

        .alerta-erro {
            background: var(--error-bg);
            border: 1px solid var(--error-border);
            color: var(--error-text);
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 13px;
            margin-bottom: 16px;
        }

        .campo {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-main);
        }

        .input-grupo {
            position: relative;
            display: flex;
            align-items: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            height: 42px;
            padding: 0 12px;
            border: 1px solid var(--input-border);
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            color: var(--text-main);
            background: #ffffff;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        input[type="password"] {
            padding-right: 76px;
        }

        input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(159, 95, 70, 0.16);
        }

        .btn-ver {
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

        .btn-ver:hover {
            background: var(--accent-soft);
            color: var(--accent);
        }

        .btn-entrar {
            width: 100%;
            height: 44px;
            margin-top: 6px;
            border: none;
            border-radius: 8px;
            background: var(--accent);
            color: #ffffff;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.15s ease;
        }

        .btn-entrar:hover {
            background: var(--accent-hover);
        }

        .rodape-link {
            margin-top: 18px;
            padding-top: 14px;
            border-top: 1px solid var(--border);
            text-align: center;
            font-size: 13px;
        }

        .rodape-link a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
        }

        .rodape-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <span class="selo-salao">Studio &amp; Salão</span>
        <h2>Acesso ao Sistema</h2>
        <p class="subtitulo">Entre com seu usuário para gerenciar agenda e atendimentos.</p>

        <?php if (!empty($erro)): ?>
            <div class="alerta-erro" role="alert">
                <?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>

        <form action="<?= $baseUrl ?>/index.php?controller=login&action=logar" method="POST">
            <div class="campo">
                <label for="login">Login:</label>
                <input
                    type="text"
                    id="login"
                    name="login"
                    value="<?= htmlspecialchars($loginAntigo, ENT_QUOTES, 'UTF-8') ?>"
                    placeholder="Seu usuário ou e-mail"
                    required
                    autofocus
                >
            </div>

            <div class="campo">
                <label for="senha">Senha:</label>
                <div class="input-grupo">
                    <input
                        type="password"
                        id="senha"
                        name="senha"
                        placeholder="Sua senha"
                        required
                    >
                    <button type="button" class="btn-ver" id="toggleSenha">Mostrar</button>
                </div>
            </div>

            <button type="submit" class="btn-entrar">Entrar</button>
        </form>

        <div class="rodape-link">
            <a href="<?= $baseUrl ?>/index.php?controller=painel&action=index">← Voltar ao início</a>
        </div>
    </div>

    <script>
        (function () {
            const btn = document.getElementById('toggleSenha');
            const input = document.getElementById('senha');
            if (!btn || !input) return;

            btn.addEventListener('click', function () {
                const mostrar = input.type === 'password';
                input.type = mostrar ? 'text' : 'password';
                btn.textContent = mostrar ? 'Ocultar' : 'Mostrar';
            });
        })();
    </script>
</body>
</html>