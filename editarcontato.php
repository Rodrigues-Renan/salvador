<?php
    require "./conexao.php";

    $resultado = '';

    if(!isset($_SESSION['id'])) {
        header("Location: sair.php");
    } else {
        $query = $conn->prepare("SELECT * FROM contato WHERE fk_id = ? AND id = ?");
        $query->execute([$_SESSION['id'], $_GET['id']]);
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
    }

    if(isset($_POST['editar'])) {
        $nome = $_POST['nome'];
        $numero = $_POST['numero'];

        $query = $conn->prepare("UPDATE contato SET nome = ?, numero = ? WHERE fk_id = ? AND id = ?");
        $query->execute([$nome, $numero, $_SESSION['id'], $_GET['id']]);

        header("Location: paginainicial.php");
    }

    if(isset($_POST['voltar'])) {
        header('Location: paginainicial.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <h1>Editar Contato</h1> <a href='sair.php'>Sair</a>
    </header>

    <div class="editar-contato">
        <form method="POST" style="width: 600px;">
            <div class="inputfield">
                <input type="text" name="nome" id="nome" placeholder="Nome" value="<?=$resultado['nome']?>" required> 
                <i class='bx bxs-rename'></i>
            </div>
            <div class="inputfield">
                <input type="text" name="numero" id="numero" placeholder="Número" value="<?=$resultado['numero']?>" required>
                <i class='bx bxs-phone'></i>
            </div>

            <div class="acoes">
                <button type="submit" class="btn" name="editar">salvar</button>
                <button class="btn" name="voltar">Fechar</button>
            </div>
        </form>
    </div>

    <script>
        function voltar() {
            window.location.href = `paginainicial.php`;
        }
    </script>
</body>
</html>