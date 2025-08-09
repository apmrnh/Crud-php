<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT Consulta.*, medico.nome AS medico_nome, paciente.nome AS paciente_nome FROM Consulta
JOIN medico ON Consulta.medico_id = medico.id
JOIN paciente ON Consulta.paciente_id = paciente.id");
$consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Consultas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Lista de Consultas</h1>
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
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Observações</th>
                    <th>Data e hora</th>
                    <th>Medico</th>
                    <th>Paciente</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultas as $consulta): ?>
                    <tr>
                        <td><?= $consulta['id'] ?></td>
                        <td><?= $consulta['observacoes'] ?></td>
                        <td><?= $consulta['data_hora'] ?></td>
                        <td><?= $consulta['medico_nome'] ?></td>
                        <td><?= $consulta['paciente_nome'] ?></td>
                        <td>
                            <a href="read-consulta.php?id=<?= $consulta['id'] ?>">Visualizar</a>
                            <a href="update-consulta.php?id=<?= $consulta['id'] ?>">Editar</a>
                            <a href="delete-consulta.php?id=<?= $consulta['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir esta consulta?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>