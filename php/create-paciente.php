<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $tipo_sanguineo = $_POST['tipo_sanguineo'];

    $stmt = $pdo->prepare("INSERT INTO paciente (nome, data_nascimento, tipo_sanguineo) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $dataNascimento, $tipo_sanguineo]);

    header('Location: index-paciente.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Paciente</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Adicionar Paciente</h1>
    </header>
    <main>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="dataNascimento">Data de Nascimento:</label>
            <input type="date" id="dataNascimento" name="dataNascimento" required>

            <label for="tipo_sanguineo">Tipo sanguineo:</label>
            <input type="text" id="tipo_sanguineo" name="tipo_sanguineo" required>

            <button type="submit">Adicionar</button>
        </form>
    </main>
</body>
</html>