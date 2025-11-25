<?php
include "conexao.php";

$id = $_GET["id"];

$stmt = $conn->prepare("DELETE FROM contatos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
exit;
?>
