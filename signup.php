<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="csssignup.css">
</head>
<body>
    <div class="box">
        <form method="POST">
                <h1>Registro</h1>

            <div class="inputbox">
                <!--username-->
                <div class="inputfield">
                    <input type="text" name="user" id="user" placeholder="User" required>
                    <i class='bx bxs-user'></i>

                </div>
                <!--email-->
                <div class="inputfield">
                    <input type="email" name="email" id="email" placeholder="E-mail" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <!--Senha-->
                <div class="inputfield">
                    <input type="password" name="senha" id="senha" placeholder="Senha" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
         
            </div>
            <label><input type="checkbox">Declaro que todas essas infomações são verdadeiras </label>
            <button type="submit" class="btn">Registrar</button>
        </form>
        
    </div>
    
</body>
</html>



    <?php
   
    include './DAO.php';
    session_start();
    $usuario = new DAO();
    if($_SERVER["REQUEST_METHOD"]=="POST") {
    $login = $_POST['user'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $usuario->signup($login,$email, $senha);
    }
    
        ?>