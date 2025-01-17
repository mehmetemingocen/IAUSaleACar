<?php
require_once 'dbConfig.php';
$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM cars WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header('Location: adminPage.php');
exit;
?>