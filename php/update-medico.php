<?php
require_once 'db.php';
require_once 'authenticate.php';
require_once 'header.php';

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

    <main>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $medicos['nome'] ?>" required>

            <label for="especialidade">Especialidade:</label>
            <input type="text" id="especialidade" name="especialidade" value="<?= $medicos['especialidade'] ?>" required>

            <button type="submit">Atualizar</button>
        </form>