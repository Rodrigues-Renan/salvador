<?php
    session_start();

    $host = 'db4free.net';
    $user = 'rrrjhv';
    $pass = 'Eradogelo11';
    $dbname = 'contatosrrrjhv';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'ERRO: ' . $e->getMessage();
    }
