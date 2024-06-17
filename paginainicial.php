<?php
    require "./conexao.php";

    if(!isset($_SESSION['id'])) {
        header("Location: sair.php");
    } else {
        $resultados = '';

        $query = $conn->prepare("SELECT * FROM contato WHERE fk_id = ?");
        $query->execute([$_SESSION['id']]);
    
        if ($query->rowCount() > 0) {
            while ($resultado = $query->fetch(PDO::FETCH_ASSOC)) {
                $resultados .= '<div class="contato">
                                    <div class="info">
                                        <div><i class="bx bxs-user"></i><p>'. $resultado['nome'] .'</p></div>
                                        <div><i class="bx bxs-phone"></i><p style="font-weight: bold;">'. $resultado['numero'] .'</p></div>
                                    </div>
                                    <div class="acoes">
                                        <a class="btn" href="editarcontato.php?id='.$resultado['id'].'">editar</a>
                                        <a class="btn" onclick="deletar('.$resultado['id'].')">deletar</a>
                                    </div>
                                </div>';
            }
        }
    }
    
    if(isset($_POST['cadastrar'])) {
        $nome = $_POST['nome'];
        $numero = $_POST['numero'];

        echo 'oi';

        $query = $conn->prepare("INSERT INTO contato (nome, numero, fk_id) VALUES (?,?,?)");
        $query->execute([$nome, $numero, $_SESSION['id']]);

        header("Location: paginainicial.php");
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
        <h1>Contato</h1> <a class="btn" href='sair.php'>Sair</a>
    </header>

    <div id="add-contato-container">
        <button class="btn" onclick="openPopup()" style="width:17%; margin:0 auto; height:80px;">+ cadastrar contato +</button> 
        <div class="popup" id="popup">
            <form method="POST">
                <h2>cadastrar contato</h2>
                <div class="inputfield">
                    <input type="text" name="nome" id="nome" placeholder="Nome" required>
                    <i class='bx bxs-rename'></i>
                </div>
                <div class="inputfield">
                    <input type="text" name="numero" id="numero" placeholder="Número" required>
                    <i class='bx bxs-phone'></i>
                </div>

                <div class="acoes">
                    <button class="btn" onclick="closePopup()">Fechar</button>
                    <button type="submit" name="cadastrar" class="btn" onclick="closePopup()">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <form id="contato-container">
        <?=$resultados?>
    </form>
    

    <script>
        let popup = document.getElementById("popup");
        
        function openPopup(){
          popup.classList.add("open-popup");
        }
        
        function closePopup(){
          popup.classList.remove("open-popup");
        }

        function deletar(contato) {
            if(confirm('Deletar contato?')) {
                window.location.href = `deletarcontato.php?id=${contato}`;
            } else {
                console.log(`nao`)
            }
        }
    </script>
</body>
</html>