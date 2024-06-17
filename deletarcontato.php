<?php
    require './conexao.php';

    if(!isset($_SESSION['id'])) {
        header("Location: sair.php");
    }

    $query = $conn->prepare("DELETE FROM contato WHERE id = ?");
    $query->execute([$_GET['id']]);

    header("Location: paginainicial.php");