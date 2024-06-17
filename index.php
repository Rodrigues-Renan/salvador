<?php
    require "./conexao.php";

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $query = $conn->prepare("SELECT id FROM usuario WHERE email = ? AND senha = ? LIMIT 1");
        $query->execute([$email, $senha]);

        if ($query->rowCount() > 0) {
            $resultado = $query->fetch(PDO::FETCH_ASSOC);

            $_SESSION['id'] = $resultado['id'];

            header('location: ./paginainicial.php');
        } else {
            session_unset();
            session_destroy();

            $erro = "Email e/ou senha errados!";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
       <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="box">
            <form method="POST">
                <h1>Login</h1>

                <!--Inputs-->
                <div class="inputbox">
                    <div class="inputfield">
                        <input type="email" name="email" id="email" placeholder="Email" required> 
                        <i class='bx bxs-envelope'></i>
                    </div>
                    <div class="inputfield">
                        <input type="password" name="senha" id="senha" placeholder="Senha" required> 
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                </div>
            
                <!--botão de login-->
                <button type="submit" name="login" class="btn">Login</button>
                <div class="sign-up">
                    <p>Não tem uma conta? <a href="./signup.php">Criar conta</a></p>
                </div>
            </form>
        </div>

    <?php if(isset($erro)) echo "<script>alert('".$erro."')</script>"; ?>
    </body>
</html>
