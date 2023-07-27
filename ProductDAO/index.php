<?php

require_once 'Conexao.php';
require_once 'SQLProductDAO.php';


$productDAO = new SQLProductDAO($conn);

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $product = new Product($name, $description, $price);
    $productDAO->insert($product);

    header("Location: index.php");
    exit();
}



if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $productDAO->delete($id);

    header("Location: index.php");
    exit();
}

$products = $productDAO->getAll();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Sistema de Gerenciamento de Produtos</title>
</head>
<body>
  <h1>Produtos</h1>

  <!-- Formulário para adicionar um novo produto -->
  <h2>Adicionar Produto</h2>
  <form method="GET">
    <label for="name">Nome:</label>
    <input type="text" name="name" required><br>

    <label for="description">Descrição:</label>
    <textarea name="description" required></textarea><br>

    <label for="price">Preço:</label>
    <input type="number" name="price" step="0.01" required><br>

    <input type="submit" name="submit" value="Adicionar Produto">
  </form>

  <!-- Tabela para exibir todos os produtos -->
  <h2>Produtos Cadastrados</h2>
  <table>
    <tr>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Preço</th>
      <th>Ações</th>
    </tr>
    <?php foreach ($products as $product) : ?>
      <tr>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo $product['description']; ?></td>
        <td><?php echo $product['price']; ?></td>
        <td>
          <a href="index.php?edit=<?php echo $product['id']; ?>">Editar</a>
          <a href="index.php?delete=<?php echo $product['id']; ?>">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

  <!-- Formulário para editar um produto (será exibido somente quando necessário) -->
  <!-- Lógica de edição aqui -->

</body>
</html>
