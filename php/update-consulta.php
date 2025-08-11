<?php
require_once 'db.php';
require_once 'authenticate.php';
require_once 'header.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM Consulta WHERE id = ?");
$stmt->execute([$id]);
$consulta = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT id, nome FROM medico");
$medicos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT id, nome FROM paciente");
$pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $observacoes = $_POST['observacoes'];
    $data_hora = $_POST['data_hora'];
    $medico_id = $_POST['medico_id'];
    $paciente_id = $_POST['paciente_id'];

    $stmt = $pdo->prepare("UPDATE Consulta SET observacoes = ?, data_hora = ?, medico_id = ?, paciente_id = ? WHERE id = ?");
    $stmt->execute([$observacoes, $data_hora, $medico_id, $paciente_id, $id]);

    header('Location: read-consulta.php?id=' . $id);
}
?>

    <main>
        <form method="POST">
            <label for="observacoes">Observações:</label>
            <input type="text" id="observacoes" name="observacoes" value="<?= $consulta['observacoes'] ?>" required>

            <label for="data_hora">Data e Hora:</label>
            <input type="datetime-local" id="data_hora" name="data_hora" value="<?= $consulta['data_hora'] ?>" required>

            <label for="medico_id">Medico:</label>
            <select id="medico_id" name="medico_id" required>
                <option value="">Selecione o medico</option>
                <?php foreach ($medicos as $medico): ?>
                    <option value="<?= $medico['id'] ?>" <?= $medico['id'] == $consulta['medico_id'] ? 'selected' : '' ?>>
                        <?= $medico['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="paciente_id">Paciente:</label>
            <select id="paciente_id" name="paciente_id" required>
                <option value="">Selecione o paciente</option>
                <?php foreach ($pacientes as $paciente): ?>
                    <option value="<?= $paciente['id'] ?>" <?= $paciente['id'] == $consulta['paciente_id'] ? 'selected' : '' ?>>
                        <?= $paciente['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Atualizar</button>
        </form>
    </main>
</body>
</html>