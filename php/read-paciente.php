<?php
require_once 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM paciente WHERE id = ?");
$stmt->execute([$id]);
$pacientes = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Paciente</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Detalhes do Paciente</h1>
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
        <?php if ($pacientes): ?>
            <p><strong>ID:</strong> <?= $pacientes['id'] ?></p>
            <p><strong>Nome:</strong> <?= $pacientes['nome'] ?></p>
            <p><strong>Data de Nascimento:</strong> <?= $pacientes['data_nascimento'] ?></p>
            <p><strong>Tipo sanguineo:</strong> <?= $pacientes['tipo_sanguineo'] ?></p>
            <p>
                <a href="update-paciente.php?id=<?= $pacientes['id'] ?>">Editar</a>
                <a href="delete-paciente.php?id=<?= $pacientes['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <p>Paciente não encontrado.</p>
        <?php endif; ?>
    </main>
</body>
</html>