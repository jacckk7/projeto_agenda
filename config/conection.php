<?php

    $host = "localhost";
    $dbname = "agenda";
    $user = "root";
    $pass = "breno2097";

    try {
        $conn = new PDO("mysql:host=$host", $user, $pass);

        // Ativar modo de erros
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Cria banco de dados se ainda não existir
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        $conn->exec($sql);

        // Conecta ao banco de dados
        $sql = "USE $dbname";
        $conn->exec($sql);

        // Cria tabela agenda se ainda não existir
        $sql = "CREATE TABLE IF NOT EXISTS contacts(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(150),
            phone VARCHAR(20),
            observations TEXT
        )";
        $conn->exec($sql);
    } catch(PDOException $e) {
        $error = $e->getMessage();
        echo "Erro: $error";
    }

?>