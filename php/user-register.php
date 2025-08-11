<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->rowCount() > 0) {
        echo "Nome de usuário já existe!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
        if ($stmt->execute([$username, $password])) {
            echo "Usuário registrado com sucesso!";
            header('Location: user-login.php');
        } else {
            echo "Erro ao registrar usuário.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Registrar Usuário</h1>
    </header>
    <main>
        <form method="POST">
            <label for="username">Nome de Usuário:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Registrar</button>
        </form>
    </main>
</body>
</html>