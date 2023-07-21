<?php

function conectar_se()
{
    $host = "localhost";
    $dbname = "livraria";
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

function adicionarLivro($titulo, $autor, $ano_publicado)
{
    $conexao = conectar_se();

    $sql = "INSERT INTO livros (titulo, autor, ano_publicado) VALUES (:titulo, :autor, :ano_publicado)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":autor", $autor);
    $stmt->bindParam(":ano_publicado", $ano_publicado);
    $stmt->execute();
}

function listarLivros()
{
    $conexao = conectar_se();
    $sql = "SELECT * FROM livros";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function atualizarLivro($id, $titulo, $autor, $ano_publicado)
{
    $conexao = conectar_se();
    $sql = "UPDATE livros SET titulo=:titulo, autor=:autor, ano_publicado=:ano_publicado WHERE id=:id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":autor", $autor);
    $stmt->bindParam(":ano_publicado", $ano_publicado);
    $stmt->execute();
}

function excluirLivro($id)
{
    $conexao = conectar_se();

    $sql="DELETE FROM livros WHERE id=:id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}










function adicionar_muitos_livros()
{
    $livros = array(
        array("A Guerra dos Tronos", "George R. R. Martin", 1996),
        array("1984", "George Orwell", 1949),
        array("Harry Potter e a Pedra Filosofal", "J.K. Rowling", 1997),
        array("O Senhor dos Anéis: A Sociedade do Anel", "J.R.R. Tolkien", 1954),
        array("Dom Quixote", "Miguel de Cervantes", 1605),
        array("Cem Anos de Solidão", "Gabriel García Márquez", 1967),
        array("Orgulho e Preconceito", "Jane Austen", 1813),
        array("A Divina Comédia", "Dante Alighieri", 1320),
        array("A Revolução dos Bichos", "George Orwell", 1945)
    );
    // Loop para adicionar os livros ao banco de dados
    foreach ($livros as $livro) {
        adicionarLivro($livro[0], $livro[1], $livro[2]);
    }
}


