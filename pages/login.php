<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'id20732567_login';

$mysqli = new mysqli($host,$username,$password,$database);

if($mysqli ->error){
    die("Erro na conexão com o banco de dados: " . $mysqli->error);
};

?>