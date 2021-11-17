<?php

include('db.php');

class Product extends DB
{
    public function addProduct($image, $title, $description, $price, $stock)
    {
        //
        $q = "INSERT INTO products (image, title, description, price, stock) VALUES ('$image', '$title', '$description', $price, $stock)";

        $this->conn->exec($q);

        header('location: add_product.php?msg=product added!');
    }

    public function  editProduct($id)
    {
        //
    }

    public function getAllProduct()
    {
        $q = "SELECT * FROM products";

        return $this->conn->query($q);
    }

    public function getProductByID($id)
    {
        $q = "SELECT * FROM products WHERE id=$id";


        return $this->conn->query($q);
    }
}
