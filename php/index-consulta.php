<?php
require_once 'db.php';
require_once 'authenticate.php';
require_once 'header.php';

$stmt = $pdo->query("SELECT Consulta.*, medico.nome AS medico_nome, paciente.nome AS paciente_nome FROM Consulta
JOIN medico ON Consulta.medico_id = medico.id
JOIN paciente ON Consulta.paciente_id = paciente.id");
$consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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