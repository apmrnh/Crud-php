<?php
require_once 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT Consulta.*, medico.nome AS medico_nome, paciente.nome AS paciente_nome FROM Consulta
JOIN medico ON Consulta.medico_id = medico.id
JOIN paciente ON Consulta.paciente_id = paciente.id WHERE Consulta.id = ?");
$stmt->execute([$id]);
$consulta = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Consulta</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Detalhes da Consulta</h1>
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
        <?php if ($consulta): ?>
            <p><strong>ID:</strong> <?= $consulta['id'] ?></p>
            <p><strong>Observações:</strong> <?= $consulta['observacoes'] ?></p>
            <p><strong>Data e Hora:</strong> <?= $consulta['data_hora'] ?></p>
            <p><strong>Médico:</strong> <?= $consulta['medico_nome'] ?></p>
            <p><strong>Paciente:</strong> <?= $consulta['paciente_nome'] ?></p>
            <p>
                <a href="update-consulta.php?id=<?= $consulta['id'] ?>">Editar</a>
                <a href="delete-consulta.php?id=<?= $consulta['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <p>Consulta não encontrada.</p>
        <?php endif; ?>
    </main>
</body>
</html>