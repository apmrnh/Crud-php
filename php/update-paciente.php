<?php
require_once 'db.php';
require_once 'authenticate.php';
require_once 'header.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM paciente WHERE id = ?");
$stmt->execute([$id]);
$pacientes = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $tipo_sanguineo = $_POST['tipo_sanguineo'];

    $stmt = $pdo->prepare("UPDATE paciente SET nome = ?, data_nascimento = ?, tipo_sanguineo = ? WHERE id = ?");
    $stmt->execute([$nome, $dataNascimento, $tipo_sanguineo, $id]);

    header('Location: read-paciente.php?id=' . $id);
}
?>

    <main>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $pacientes['nome'] ?>" required>

            <label for="dataNascimento">Data de Nascimento:</label>
            <input type="date" id="dataNascimento" name="dataNascimento" value="<?= $pacientes['data_nascimento'] ?>" required>

            <label for="tipo_sanguineo">Tipo sanguineo:</label>
            <input type="text" id="tipo_sanguineo" name="tipo_sanguineo" value="<?= $pacientes['tipo_sanguineo'] ?>" required>
            
            <button type="submit">Atualizar</button>
        </form>
    </main>
</body>
</html>