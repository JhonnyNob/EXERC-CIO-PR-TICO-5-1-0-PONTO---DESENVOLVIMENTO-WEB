<?php
include "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda Rosa</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="script.js"></script>
</head>
<body>
<div class="container">

    <h1>Agenda de Contatos Rosa</h1>

    <div class="card">
        <h2>Cadastrar Contato</h2>

        <form method="POST" action="salvar.php">
            <input type="hidden" name="id" value="">

            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" required>
            </div>

            <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Telefone</label>
                <input type="text" name="telefone" required>
            </div>

            <button class="btn-primary" type="submit">Salvar</button>
            <button class="btn-secondary" type="reset">Limpar</button>
        </form>
    </div>

    <div class="card">
        <h2>Lista de Contatos</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>

            <?php
            $result = $conn->query("SELECT * FROM contatos ORDER BY id DESC");

            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>

            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['nome']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['telefone']) ?></td>
                <td>
                    <a class="link" href="editar.php?id=<?= $row['id'] ?>">Editar</a> |
                    <a class="link" href="excluir.php?id=<?= $row['id'] ?>" onclick="return confirmarExclusao()">Excluir</a>
                </td>
            </tr>

            <?php
                endwhile;
            else:
                echo "<tr><td colspan='5'>Nenhum contato cadastrado</td></tr>";
            endif;
            ?>
        </table>
    </div>

</div>
</body>
</html>
