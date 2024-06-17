<?php
    session_start();

    $host = 'db4free.net';
    $user = 'brunotznr_0369';
    $pass = 'Mysql@0369';
    $dbname = 'blocozin_0369';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'ERRO: ' . $e->getMessage();
    }
