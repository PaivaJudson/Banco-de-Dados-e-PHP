<?php 

interface ProductDAO {
    public function insert(Product $product);
    public function update(Product $product);
    public function delete($id);
    public function get($id);
    public function getAll();
}

