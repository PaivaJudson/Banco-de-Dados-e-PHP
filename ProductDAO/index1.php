<?php

require_once 'Conexao.php';
require_once 'SQLProductDAO.php';


$productDAO = new SQLProductDAO($conn);

// Lógica para adicionar um novo produto
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $product = new Product($name, $description, $price);
  $productDAO->insert($product);

  // Redirecionar para a página de listagem de produtos após a adição
  header("Location: index.php");
  exit(); // Encerra a execução para evitar o carregamento da página novamente
}

// Lógica para excluir um produto
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $productDAO->delete($id);

  // Redirecionar para a página de listagem de produtos após a exclusão
  header("Location: index.php");
  exit(); // Encerra a execução para evitar o carregamento da página novamente
}

// Lógica para editar um produto
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $product = $productDAO->get($id);
  // Lógica para exibir o formulário de edição com os dados do produto
}

// Lógica para atualizar um produto após a edição
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $product = new Product($name, $description, $price);
  $product->setId($id);
  $productDAO->update($product);

  // Redirecionar para a página de listagem de produtos após a atualização
  header("Location: index.php");
  exit(); // Encerra a execução para evitar o carregamento da página novamente
}

// Lógica para exibir todos os produtos
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
  <form method="post">
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
  <?php if (isset($product)) : ?>
    <h2>Editar Produto</h2>
    <form method="post">
      <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
      <label for="name">Nome:</label>
      <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br>

      <label for="description">Descrição:</label>
      <textarea name="description" required><?php echo $product['description']; ?></textarea><br>

      <label for="price">Preço:</label>
      <input type="number" name="price" step="0.01" value="<?php echo $product['price']; ?>" required><br>

      <input type="submit" name="update" value="Atualizar Produto">
    </form>
  <?php endif; ?>

</body>
</html>
