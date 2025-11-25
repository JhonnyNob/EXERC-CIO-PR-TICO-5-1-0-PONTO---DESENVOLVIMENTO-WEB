<?php
include "conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];

if ($id == "") {
    $stmt = $conn->prepare("INSERT INTO contatos (nome, email, telefone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $telefone);
    
} else {

    $stmt = $conn->prepare("UPDATE contatos SET nome = ?, email = ?, telefone = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nome, $email, $telefone, $id);
}

$stmt->execute();
$stmt->close();

header("Location: index.php");
exit;
?>
