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
                header("Location: welcome.php");
                exit();
            }
        }
        return "Email ou senha inválidos.";
    }

    public function verificarLogado() {
        if (!$_SESSION['logado']) {
            header("Location: index.php");
            exit();
        }
    }

    public function deslogar() {
        session_destroy();
        header("Location: index.php");
        exit();
    }
}