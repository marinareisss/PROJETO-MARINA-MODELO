<?php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../models/Usuario.php';

class LoginController {
    private $model;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->model = new Usuario();
    }

    // Exibe a tela de login
    public function index() {
        $viewPath = __DIR__ . '/../views/login/index.php';
        if (!file_exists($viewPath)) {
            die('View de login não encontrada em: ' . $viewPath);
        }

        require_once $viewPath;
    }

    // Processa o formulário de login
    public function logar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = trim($_POST['login'] ?? '');
            $senha = $_POST['senha'] ?? '';
            $_SESSION['login_antigo'] = $login;

            $db = Database::getConnection();
            $stmt = $db->prepare('SELECT * FROM tbl_usuario WHERE login = :login LIMIT 1');
            $stmt->execute(['login' => $login]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                session_regenerate_id(true);
                unset($_SESSION['login_antigo'], $_SESSION['erro_login']);
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_perfil'] = $usuario['perfil'];

                header('Location: /ProjetoModelo/index.php?controller=painel&action=index');
                exit;
            }

            $_SESSION['erro_login'] = 'Login ou senha incorretos!';
            header('Location: /ProjetoModelo/index.php?controller=login&action=index');
            exit;
        }

        $this->index();
    }

    // Exibe e processa o cadastro público de cliente
    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $whatsapp = trim($_POST['whatsapp'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $endereco = trim($_POST['endereco'] ?? '');
            $senha = $_POST['senha'] ?? '';
            $termos = $_POST['termos'] ?? '';

            $_SESSION['dados_cadastro'] = [
                'nome' => $nome,
                'whatsapp' => $whatsapp,
                'email' => $email,
                'endereco' => $endereco,
            ];

            if ($nome === '' || ($email === '' && $whatsapp === '') || $endereco === '' || $senha === '') {
                $_SESSION['erro_cadastro'] = 'Preencha todos os campos obrigatórios.';
                header('Location: /ProjetoModelo/index.php?controller=login&action=registrar');
                exit;
            }

            if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['erro_cadastro'] = 'Informe um e-mail válido.';
                header('Location: /ProjetoModelo/index.php?controller=login&action=registrar');
                exit;
            }

            if (mb_strlen($senha) < 6) {
                $_SESSION['erro_cadastro'] = 'A senha deve ter pelo menos 6 caracteres.';
                header('Location: /ProjetoModelo/index.php?controller=login&action=registrar');
                exit;
            }

            if (empty($termos)) {
                $_SESSION['erro_cadastro'] = 'Confirme que tem 18 anos ou mais e aceita os termos.';
                header('Location: /ProjetoModelo/index.php?controller=login&action=registrar');
                exit;
            }

            $loginAcesso = $email !== '' ? $email : $whatsapp;

            try {
                $db = Database::getConnection();

                $stmtCheck = $db->prepare('SELECT id FROM tbl_usuario WHERE login = :login LIMIT 1');
                $stmtCheck->execute(['login' => $loginAcesso]);
                if ($stmtCheck->fetch()) {
                    $_SESSION['erro_cadastro'] = 'Este e-mail ou login já está cadastrado.';
                    header('Location: /ProjetoModelo/index.php?controller=login&action=registrar');
                    exit;
                }

                $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
                $stmtInsert = $db->prepare(
                    'INSERT INTO tbl_usuario (nome, login, senha, perfil) VALUES (:nome, :login, :senha, :perfil)'
                );
                $stmtInsert->execute([
                    'nome' => $nome,
                    'login' => $loginAcesso,
                    'senha' => $senhaHash,
                    'perfil' => 'cliente',
                ]);

                unset($_SESSION['dados_cadastro']);
                $_SESSION['sucesso_login'] = 'Conta criada com sucesso! Faça login para continuar.';
                header('Location: /ProjetoModelo/index.php?controller=login&action=index');
                exit;
            } catch (PDOException $e) {
                $_SESSION['erro_cadastro'] = 'Não foi possível concluir o cadastro no momento.';
                header('Location: /ProjetoModelo/index.php?controller=login&action=registrar');
                exit;
            }
        }

        $viewCadastro = __DIR__ . '/../views/login/cadastro.php';
        if (!file_exists($viewCadastro)) {
            die('View de cadastro não encontrada em: ' . $viewCadastro);
        }

        require_once $viewCadastro;
    }

    // Encerra a sessão do usuário
    public function sair() {
        $_SESSION = [];
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
        header('Location: /ProjetoModelo/index.php?controller=login&action=index');
        exit;
    }
}