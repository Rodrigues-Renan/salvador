<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
     <link rel="stylesheet" href="cssinicial.css">
</head>
<body>
    <header>
        <h1>Contato</h1>
    </header>

    <div id="add-contato-container">
          <button type="submit" class="add-contato" onclick="openPopup()">+</button> 
            <div class="popup" id="popup">
                <form action="">
                    <h2>Contato</h2>
                    <div class="input-box">
                        <input type="text" name="nome" id="nome" placeholder="Nome" required> 
                    </div>
                    <div class="input-box">
                        <input type="tel" name="numero" id="numero" placeholder="Número" required> 
                    </div>
                    <button type="button" onclick="closePopup()">Salvar</button>
                </form>
            </div>
        </div>

     <div id="contato-container">
        <table>
            <p>Editar</p>
            <p>X</p>
            <tr>
                <th>Nome</th>
                <th>Numero</th>
            </tr>
            <tr>
                <td>Ren</td>
                <td>98381954</td>
            </tr>
        </table>
    </div>
    

    <script>
        let popup = document.getElementById("popup");
        
        function openPopup(){
          popup.classList.add("open-popup");
        }
        
        function closePopup(){
          popup.classList.remove("open-popup");
        } 
    </script>
        
            
        
</body>
</html>


    <?php

    session_start();
    
    if (empty($_SESSION['login'])) {
        header('Location:index.php');
    }
    
    

    
    

?>