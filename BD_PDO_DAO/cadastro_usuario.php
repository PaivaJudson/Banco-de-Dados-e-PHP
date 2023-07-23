<?php 

require_once 'conexao.php';
require_once 'Usuario.php';
require_once 'UsuarioDAO.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $usuario = new Usuario();
    $usuario->nome = $_POST['nome'];
    $usuario->email = $_POST['email'];
    $usuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $dao = new UsuarioDAO($conn);
    $dao->inserirUsuario($usuario);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>

<body>
    <h2>Cadastro de Usuário</h2>
    <form method="post" action="">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Senha:</label>
        <input type="password" name="senha" required><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>