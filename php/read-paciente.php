<?php
require_once 'db.php';
require_once 'authenticate.php';
require_once 'header.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM paciente WHERE id = ?");
$stmt->execute([$id]);
$pacientes = $stmt->fetch(PDO::FETCH_ASSOC);
?>

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