<?php

class Product{

    private $id;
    private $name;
    private $description;
    private $price;
    private $created_at;
    private $update_at;

    public function __construct($name, $description, $price){
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    




}
