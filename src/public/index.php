<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/style.css">
</head>
<body>|
   <container class="container">
        <form action="login.php" method="POST" class="login-form">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </container>
        <?php
        echo "Iniciando testes...\n";

$login = new Login();

// TESTE 1: Email inválido
try {
    $resultado = $login->logar("invalido@email.com", "123");T

    if ($resultado === "Email ou senha inválidos.") {
        echo "Teste 1 OK\n";
    } else {
        echo "Teste 1 FALHOU\n";
    }
} catch (Throwable $e) {
    echo "Erro no Teste 1: " . $e->getMessage() . "\n";
}

// TESTE 2: Campos vazios
try {
    $resultado = $login->logar("", "");

    if ($resultado === "Email ou senha inválidos.") {
        echo "Teste 2 OK\n";
    } else {
        echo "Teste 2 FALHOU\n";
    }
} catch (Throwable $e) {
    echo "Erro no Teste 2: " . $e->getMessage() . "\n";
}

// TESTE 3: Conexão com banco
try {
    if ($pdo) {
        echo "Teste 3 OK (Banco conectado)\n";
    } else {
        echo "Teste 3 FALHOU\n";
    }
} catch (Throwable $e) {
    echo "Erro no Teste 3: " . $e->getMessage() . "\n";
}

echo "Testes finalizados.";
    ?>
</body>
<script src="Assets/script.js"></script>
</html>