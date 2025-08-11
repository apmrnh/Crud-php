<?php
require_once 'db.php';
require_once 'authenticate.php';
require_once 'header.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM medico WHERE id = ?");
$stmt->execute([$id]);
$medicos = $stmt->fetch(PDO::FETCH_ASSOC);
?>

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