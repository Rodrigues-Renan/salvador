<?php
 
class conexao {
    function __construct(){
    
}

 public function conectar(){
     $nome_servidor = "localhost";
    $nome_usuario = "root";
    $senha = "";
    $nome_banco = "contato";
    // Criar conexão
    $conecta = new mysqli($nome_servidor, $nome_usuario, $senha,$nome_banco);
    // Verificar Conexão
    if ($conecta->connect_error) {
    die("Conexão falhou: " . $conecta->connect_error."<br>");
    }
    echo "Conexão realizada com sucesso <br>";
    return $conecta;
 }
}
