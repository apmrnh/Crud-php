<?php
require_once 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM paciente WHERE id = ?");
$stmt->execute([$id]);
$pacientes = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $tipo_sanguineo = $_POST['tipo_sanguineo'];

    $stmt = $pdo->prepare("UPDATE paciente SET nome = ?, data_nascimento = ?, tipo_sanguineo = ?, WHERE id = ?");
    $stmt->execute([$nome, $dataNascimento, $tipo_sanguineo, $id]);

    header('Location: read-aluno.php?id=' . $id);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Editar Aluno</h1>
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