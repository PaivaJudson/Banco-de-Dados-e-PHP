<?php 

function getConexao()
{
    $host = "localhost";
    $dbname = "biblioteca";
    $user = "root";
    $password = "";
    $conexao = '';

    try {
        $conexao = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    } catch (PDOException $e) {
        die("Erro: " . $e->getMessage());
    }
    return $conexao;
}

function adicionarAutor($autor)
{
    $conexao = getConexao();

    $sql = "INSERT INTO autores(nome) VALUES(:autor)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":autor", $autor);
    $stmt->execute();
}

function adicionarEditora($nome)
{
    $conexao = getConexao();
    $sql = "INSERT INTO editoras(nome) VALUES(:nome)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome", $nome);
    $stmt->execute();
}


function adicionarLivro($titulo, $autor_id, $editora_id)
{
    $conexao = getConexao();
    $sql = "INSERT INTO livros(titulo, autor_id, editora_id) VALUES(:titulo, :autor_id, :editora_id)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":autor_id", $autor_id);
    $stmt->bindParam(":editora_id", $editora_id);
    $stmt->execute();
}


function fazerRegisto()
{
    adicionarAutor("Joao");
    adicionarEditora("Golf - Eventos");
    adicionarLivro("PHP da Vida", 4, 1);
}

fazerRegisto();