<?php

class Product
{

    private $id;
    private $name;
    private $description;
    private $price;
    private $created_at;
    private $update_at;

    public function __construct($name, $description, $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setNome($name){
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getCreatedAt(){
        return $this->created_at;
    }

    public function setCreatedAt($createdAt){
        $this->created_at = $createdAt;
    }

    public function getUpdateAt(){
        return $this->update_at;
    }

    public function setUpdateAt($updateAt){
        $this->created_at = $updateAt;
    }
}
