<?php
require_once 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM medico WHERE id = ?");
$stmt->execute([$id]);
$medicos = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];

    $stmt = $pdo->prepare("UPDATE medico SET nome = ?, especialidade = ? WHERE id = ?");
    $stmt->execute([$nome, $especialidade, $id]);

    header('Location: read-medico.php?id=' . $id);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Medico</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Editar Medico</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li>Pacientes:
                        <a href="/php/create-paciente.php">Adicionar</a> | 
                        <a href="/php/index-paciente.php">Listar</a>
                    </li>
                    <li>Medicos:
                        <a href="/php/create-medico.php">Adicionar</a> | 
                        <a href="/php/index-medico.php">Listar</a>
                    </li>
                    <li>Consultas:
                        <a href="/php/create-consulta.php">Adicionar</a> | 
                        <a href="/php/index-consulta.php">Listar</a>
                    </li>
            </ul>
        </nav>
    </header>
    <main>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $medicos['nome'] ?>" required>

            <label for="especialidade">Especialidade:</label>
            <input type="text" id="especialidade" name="especialidade" value="<?= $medicos['especialidade'] ?>" required>

            <button type="submit">Atualizar</button>
        </form>
    </