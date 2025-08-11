<?php
require_once 'db.php';
require_once 'authenticate.php';
require_once 'header.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT Consulta.*, medico.nome AS medico_nome, paciente.nome AS paciente_nome FROM Consulta
JOIN medico ON Consulta.medico_id = medico.id
JOIN paciente ON Consulta.paciente_id = paciente.id WHERE Consulta.id = ?");
$stmt->execute([$id]);
$consulta = $stmt->fetch(PDO::FETCH_ASSOC);
?>

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