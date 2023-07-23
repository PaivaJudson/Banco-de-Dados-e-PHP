<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'cadastro';


try{
    $conn = new PDO("mysql:dbname=$db;host=$host", $user, $password);
}catch(PDOException $e){
    echo "Erro na conexão: ". $e->getMessage();
}
