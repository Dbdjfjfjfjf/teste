<?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'login';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    } else {
        echo "Conexão bem-sucedida";

        // Resto do seu código para inserir os dados na tabela "usuarios"
    }
?>
