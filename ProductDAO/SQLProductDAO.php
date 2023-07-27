<?php

require_once 'ProductDAO.php';

class SQLProductDAO implements ProductDAO{

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function insert(Product $product)
    {
        $sql = "INSERT INTO products(name, description, price) VALUES( ? , ? , ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product->getName(), $product->getDescription(), $product->getPrice()]);
        $product->setId($this->pdo->lastInsertId());
    }

    public function update(Product $product){
        $sql = "UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product->getName(), $product->getDescription(), $product->getPrice(), $product->getId()]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function get($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
