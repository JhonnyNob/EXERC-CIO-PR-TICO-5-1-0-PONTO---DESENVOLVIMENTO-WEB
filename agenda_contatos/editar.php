<?php
include "conexao.php";

$id = $_GET["id"];

$stmt = $conn->prepare("SELECT * FROM contatos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$contato = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Contato - Agenda Rosa</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">

    <h1>Editar Contato</h1>

    <div class="card">
        <form method="POST" action="salvar.php">
            <input type="hidden" name="id" value="<?= $contato['id'] ?>">

            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" value="<?= $contato['nome'] ?>" required>
            </div>

            <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="email" value="<?= $contato['email'] ?>" required>
            </div>

            <div class="form-group">
                <label>Telefone</label>
                <input type="text" name="telefone" value="<?= $contato['telefone'] ?>" required>
            </div>

            <button class="btn-primary">Salvar</button>
            <a href="index.php"><button type="button" class="btn-secondary">Cancelar</button></a>
        </form>
    </div>

</div>
</body>
</html>
