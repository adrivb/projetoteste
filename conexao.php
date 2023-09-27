<?php

//Inicio da conexao com o banco de dados utilizando PDO
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "artesao";
$port = 3306;

try {
    //Conexao com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexao sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    echo "Conexao com banco de dados realizado com sucesso.";
} catch (PDOException $err) {
    echo "Erro: Conexao com banco de dados nao realizado com sucesso. Erro gerado " . $err->getMessage();
}
    //Fim da conexÃ£o com o banco de dados utilizando PDO
