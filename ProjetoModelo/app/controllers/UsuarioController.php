<?php
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    private $model;

    public function __construct() {
        // Inicia a sessão se não estiver iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Se tentar acessar o CRUD sem logar, vai para a tela de login
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        $this->model = new Usuario();
    }

    public function index() {
        $usuarios = $this->model->all();
        require_once __DIR__ . '/../views/usuarios/index.php';
    }

    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome'   => trim($_POST['nome'] ?? ''),
                'login'  => trim($_POST['login'] ?? ''),
                'senha'  => password_hash($_POST['senha'] ?? '', PASSWORD_DEFAULT),
                'perfil' => trim($_POST['perfil'] ?? 'usuario')
            ];

            $this->model->insert($dados);
            header('Location: index.php?controller=usuario&action=index');
            exit;
        }
        require_once __DIR__ . '/../views/usuarios/cadastrar.php';
    }

    public function editar() {
        $id = $_GET['id'] ?? null;
        if (!$id) die("ID não fornecido.");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome'   => trim($_POST['nome'] ?? ''),
                'login'  => trim($_POST['login'] ?? ''),
                'perfil' => trim($_POST['perfil'] ?? 'usuario')
            ];

            if (!empty($_POST['senha'])) {
                $dados['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            }

            $this->model->update($id, $dados);
            header('Location: index.php?controller=usuario&action=index');
            exit;
        }

        $usuario = $this->model->find($id);

        if (!$usuario) {
            header('Location: index.php?controller=usuario&action=index');
            exit;
        }

        require_once __DIR__ . '/../views/usuarios/editar.php';
    }

    public function excluir() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->model->delete($id);
        }
        header('Location: index.php?controller=usuario&action=index');
        exit;
    }
}