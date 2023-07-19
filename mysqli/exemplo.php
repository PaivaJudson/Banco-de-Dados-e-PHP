<?php

$ligacao = '';

$ligacao = new mysqli("localhost", "root", "", "exemplo");

if($ligaca->connect_error){
    echo "Error: " . $ligacao->connect_error;
}

function inserir($ligacao){
    $query = "INSERT INTO usuarios (nome, idade) VALUES (? , ?)";
    $stm = $ligacao->prepare($query);

    // $nome = "Judson Paiva";
    // $idade = 29;

    $nome = "Leonor Paiva";
    $idade = 25;

    $stm->bind_param("si", $nome, $idade);
    $stm->execute();

    $nome = "Jéssica Paiva";
    $idade = 26;

    $stm->execute();
}

function consultar($ligacao){

    $query = "SELECT * FROM usuarios ORDER BY nome";
    $result = $ligacao->query($query);
    echo "<pre>";
    while($row = $result->fetch_assoc()){
        var_dump($row);
    }

}

consultar($ligacao);