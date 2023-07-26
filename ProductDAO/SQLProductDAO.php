<?php

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

    }

    public function get($id)
    {

    }

    public function getAll()
    {

    }
}