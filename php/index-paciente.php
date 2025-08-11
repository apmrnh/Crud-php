<?php
require_once 'db.php';
require_once 'authenticate.php';
require_once 'header.php';

$stmt = $pdo->query("SELECT * FROM paciente");
$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <main>
        <h2>Lista de Pacientes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Tipo Sanguineo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pacientes as $paciente): ?>
                    <tr>
                        <td><?= $paciente['id'] ?></td>
                        <td><?= $paciente['nome'] ?></td>
                        <td><?= $paciente['data_nascimento'] ?></td>
                        <td><?= $paciente['tipo_sanguineo'] ?></td>
                        <td>
                            <a href="read-paciente.php?id=<?= $paciente['id'] ?>">Visualizar</a>
                            <a href="update-paciente.php?id=<?= $paciente['id'] ?>">Editar</a>
                            <a href="delete-paciente.php?id=<?= $paciente['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Alunos</p>
    </footer>
</body>
</html>