<?php
require_once 'db.php';
require_once 'authenticate.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM medico WHERE id = ?");
$stmt->execute([$id]);

header('Location: index-medico.php');
exit();
?>