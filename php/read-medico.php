<?php
require_once 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM medico WHERE id = ?");
$stmt->execute([$id]);
$medicos = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Medico</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Detalhes do Medico</h1>
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
        <?php if ($medicos): ?>
            <p><strong>ID:</strong> <?= $medicos['id'] ?></p>
            <p><strong>Nome:</strong> <?= $medicos['nome'] ?></p>
            <p><strong>Especialidade:</strong> <?= $medicos['especialidade'] ?></p>
            <p>
                <a href="update-medico.php?id=<?= $medicos['id'] ?>">Editar</a>
                <a href="delete-medico.php?id=<?= $medicos['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <p>Medico não encontrado.</p>
        <?php endif; ?>
    </main>
</body>
</html>