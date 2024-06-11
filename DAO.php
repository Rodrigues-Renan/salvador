<?php

include './conexao.php';


class DAO {
    
public function login($email, $senha) {
    $conexao = new conexao();
    $conecta = $conexao->conectar();
    
    $sql = "select email, senha from usuario where senha = '$senha' and email = '$email'";
    
    
    
    $resultado = $conecta->query($sql);
    
    if ($resultado->num_rows>0) {
        
    
        while ($linha = $resultado->fetch_assoc()) {

                header('Location:paginainicial.php');

                die;
            }
        } else {
            echo "Deu erro";
        }
    }
    
    

    
    public function signup($nome, $email, $senha) {
        $conexao = new conexao();
        $conecta = $conexao->conectar();

        $sql = "INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES (NULL, '$nome', '$email', '$senha');";

        if ($conecta->query($sql) === TRUE) {
            echo "Conta criada com sucesso";
            die;
        } else {
            echo "erro: " . $sql . "<br>" . $conecta->error . "<br>";
        }
    }
    
    
    
}



