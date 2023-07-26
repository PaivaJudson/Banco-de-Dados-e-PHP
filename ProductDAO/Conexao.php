<?php

$host = 'localhost';
$user = 'root';
$password = "";
$db = 'ProductDAO';


try{
    $conn = new PDO("mysql:dbname=$db;host=$host", $user, "");
}catch(PDOException $e){
    echo "Erro na conexão: ". $e->getMessage();
}
