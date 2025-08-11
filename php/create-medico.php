<?php
require_once 'db.php';
require_once 'authenticate.php';
require_once 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];

    $stmt = $pdo->prepare("INSERT INTO medico (nome, especialidade) VALUES (?, ?)");
    $stmt->execute([$nome, $especialidade]);

    header('Location: index-medico.php');
}
?>

    <main>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="especialidade">Especialidade:</label>
            <input type="text" id="especialidade" name="especialidade" required>

            <button type="submit">Adicionar</button>
        </form>
    </main>
</body>
</html>