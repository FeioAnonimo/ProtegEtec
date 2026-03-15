<?php
session_start();
require_once 'config.php';

class Login {
    private $conn;

    public function __construct() {
        global $pdo;
        $this->conn = $pdo;
    }

    public function logar($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($senha, $user['senha'])) {
                $_SESSION['logado'] = true;
                $_SESSION['email'] = $user['email'];
                header("Location: main.php");
                exit();
            }
        }
        return "Email ou senha inválidos.";
    }

    public static function verificarLogado() {
        if (!$_SESSION['logado']) {
            header("Location: index.php");
            exit();
        }
    }

    public static function deslogar() {
        session_destroy();
        header("Location: index.php");
        exit();
    }
}

if (isset($_POST['entrar'])) {
    $login = new Login();
    echo $login->logar($_POST['userename'], $_POST['email'], $_POST['senha']);
}