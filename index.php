<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       <link rel="stylesheet" href="csslogin.css">
    </head>
    <body>
        <div class="box">
        <form method="POST">
            <h1>Login</h1>
            <!--Inputs-->
            <div class="input-box">
                <input type="text" name="user" id="user" placeholder="Username" required> 
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Senha" required> 
                <i class='bx bxs-lock-alt'></i>
            </div>
            <!--esqueceu a senha-->
            <div class="forgot-password">
                <label for=""><input type="checkbox">Lembre-se</label>
                <a href="#">Esqueceu a senha?</a>
            </div>
            <!--botão de login-->
            <button type="submit" class="btn">Login</button>
            <div class="sign-up">
                <p>Não tem uma conta? <a href="#">Criar conta</a></p>
            </div>

        </form>
    </div>
        
   
        <?php
        
        session_start();
        
        
   
    include 'DAO.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    $usuario = new DAO();
    $login = $_POST['user'];
    $senha = $_POST['password'];
    $_SESSION['login'] = $login;
    $usuario->login($login, $senha);
    
    }
    
    
    
        ?>
    </body>
</html>
