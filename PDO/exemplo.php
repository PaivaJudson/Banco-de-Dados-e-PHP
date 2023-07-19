<?php 

$conexao = "";

try{
    
    $conexao = new PDO("mysql:dbname=exemplo;host=localhost", "root", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){

    die("Erro ao conectar: " . $e->getMessage());
}


function inserir($nome, $idade){
    
    global $conexao;
    $sql = "INSERT INTO usuarios (nome, idade) VALUES (:nome , :idade)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":idade", $idade);
    $stmt->execute();
}

function consultar()
{
    global $conexao;
    $query = "SELECT * FROM usuarios ORDER BY nome";
    $result = $conexao->prepare($query);

    $result->execute();

    $lista = $result->fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>";
    var_dump($lista);
}

function procurar($id)
{
    $sql = "SELECT * FROM usuarios WHERE id=:id";

    global $conexao;
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "<prep>";
    var_dump($result);
}

function modificar($id, $nome, $idade)
{
    global $conexao;
    $sql = "UPDATE usuarios SET nome=:nome, idade=:idade WHERE id=:id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":idade", $idade);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function apagar($id)
{
    global $conexao;

    $sql = "DELETE FROM usuarios WHERE id=:id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}



// inserir("Quissanga Coge", 12);

// modificar(4, "Maria Muhangueno", 75);

apagar(5);
