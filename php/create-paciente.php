<?php
require_once 'db.php';
require_once 'authenticate.php';
require_once 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $tipo_sanguineo = $_POST['tipo_sanguineo'];

    $stmt = $pdo->prepare("INSERT INTO paciente (nome, data_nascimento, tipo_sanguineo) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $dataNascimento, $tipo_sanguineo]);

    header('Location: index-paciente.php');
}
?>

        <h1>Adicionar Paciente</h1>
    </header>
    <main>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="dataNascimento">Data de Nascimento:</label>
            <input type="date" id="dataNascimento" name="dataNascimento" required>

            <label for="tipo_sanguineo">Tipo sanguineo:</label>
            <input type="text" id="tipo_sanguineo" name="tipo_sanguineo" required>

            <button type="submit">Adicionar</button>
        </form>
    </main>
</body>
</html>