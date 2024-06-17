<?php
    session_start();

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'contato';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'ERRO: ' . $e->getMessage();
    }