<?php

// $host = "localhost";
// $user = "root";
// $pass = "root";
// $banco = "local";

$host = "localhost";
$user = "movide65_movidev";
$pass = "aZld7w8D&Kxn";
$banco = "movide65_reuniao2024";

// Conexão com o banco de dados usando MySQLi
$conexao = mysqli_connect($host, $user, $pass, $banco);

// Verifique a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Configurar o conjunto de caracteres para UTF-8
$conexao->set_charset("utf8");

// Agora você pode usar a conexão $conexao para executar consultas MySQLi

?>