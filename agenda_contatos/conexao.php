<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "agenda";


$conn = new mysqli($host, $usuario, $senha);

if ($conn->connect_error) {
    die("Erro ao conectar ao MySQL: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $banco");

$conn->select_db($banco);

$conn->query("
CREATE TABLE IF NOT EXISTS contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(30) NOT NULL
)
");

$conn->set_charset("utf8mb4");
?>
