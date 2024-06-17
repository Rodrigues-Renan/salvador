<?php
    require "./conexao.php";

    if (isset($_POST['cadastrar'])) {
        $user = $_POST['user'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $query = $conn->prepare("SELECT email FROM usuario WHERE email = ? LIMIT 1");
        $query->execute([$email]);

        if ($query->rowCount() > 0) {
            $erro_email = "Email já cadastrado";
        } else {
            $query = $conn->prepare("INSERT INTO usuario (username, fullname, email, senha) VALUES (?,?,?,?)");
            $query->execute([$user, $fullname, $email, $senha]);

            header('location: ./index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
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
                <!--fullname-->
                <div class="inputfield">
                    <input type="text" name="fullname" id="fullname" placeholder="Full name" required>
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

            <button type="submit" name="cadastrar" class="btn">Registrar</button>
        </form>
    </div>


    <script>
        let user = document.querySelector('#user');
        let fullname = document.querySelector('#fullname');
        let email = document.querySelector('#email');
        let senha = document.querySelector('#senha');
    </script>

    <?php if(isset($erro_email)) echo "<script>alert('".$erro_email."')</script>"; ?>
</body>
</html>