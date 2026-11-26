<?php
require_once __DIR__ . '/../models/Usuario.php';

class LoginController {
    private $model;

    public function __construct() {
        // Se a sessão não estiver ativa, inicia
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->model = new Usuario();
    }

    // Exibe a tela de login
    public function index() {
        require_once __DIR__ . '/../views/login/index.php';
    }

    // Processa o formulário de login
    public function logar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = trim($_POST['login'] ?? '');
            $senha = $_POST['senha'] ?? '';

            // Como nosso Model não tem busca por coluna específica customizada,
            // podemos usar a conexão PDO diretamente para essa validação rápida
            $db = Database::getConnection();
            $stmt = $db->prepare("SELECT * FROM tbl_usuario WHERE login = :login");
            $stmt->execute(['login' => $login]);
            $usuario = $stmt->fetch();

            // Verifica se o usuário existe e se a senha bate
            if ($usuario && password_verify($senha, $usuario['senha'])) {
                // Cria as variáveis de sessão
                $_SESSION['usuario_id']    = $usuario['id'];
                $_SESSION['usuario_nome']  = $usuario['nome'];
                $_SESSION['usuario_perfil']= $usuario['perfil'];

                header('Location: index.php?controller=painel&action=index');
                exit;
            } else {
                $erro = "Login ou senha incorretos!";
                require_once __DIR__ . '/../views/login/index.php';
            }
        }
    }

    // Cadastro público separado do gerenciamento de usuários
    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $whatsapp = trim($_POST['whatsapp'] ?? '');
            $login = trim($_POST['login'] ?? ($email !== '' ? $email : $nome));
            $senha = $_POST['senha'] ?? '';
            $confirmarSenha = $_POST['confirmar_senha'] ?? $senha;

            if ($nome === '' || $email === '' || $senha === '') {
                $_SESSION['erro_cadastro'] = 'Preencha nome, e-mail e senha.';
                header('Location: index.php?controller=login&action=registrar');
                exit;
            }

            if ($senha !== $confirmarSenha) {
                $_SESSION['erro_cadastro'] = 'As senhas não conferem.';
                header('Location: index.php?controller=login&action=registrar');
                exit;
            }

            $db = Database::getConnection();

            $stmtCheck = $db->prepare("SELECT id FROM tbl_usuario WHERE login = :login OR email = :email LIMIT 1");
            $stmtCheck->execute([
                'login' => $login,
                'email' => $email,
            ]);

            if ($stmtCheck->fetch()) {
                $_SESSION['erro_cadastro'] = 'Já existe uma conta com este e-mail ou login.';
                header('Location: index.php?controller=login&action=registrar');
                exit;
            }

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $perfilPadrao = 'aluno';

            $stmtInsert = $db->prepare(
                "INSERT INTO tbl_usuario (nome, login, email, senha, perfil) VALUES (:nome, :login, :email, :senha, :perfil)"
            );
            $stmtInsert->execute([
                'nome'   => $nome,
                'login'  => $login,
                'email'  => $email,
                'senha'  => $senhaHash,
                'perfil' => $perfilPadrao,
            ]);

            $_SESSION['sucesso_login'] = 'Conta criada com sucesso! Faça login para entrar.';
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        $viewCadastro = __DIR__ . '/../views/login/cadastro.php';
        if (file_exists($viewCadastro)) {
            require_once $viewCadastro;
            return;
        }

        require_once __DIR__ . '/../views/usuarios/new.php';
    }

    // Desloga do sistema
    public function sair() {
        session_destroy();
        header('Location: index.php?controller=login&action=index');
        exit;
    }
}