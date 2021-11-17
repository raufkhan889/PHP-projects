<?php

include_once('db.php');

if (session_id() == '') {
    session_start();
}

class Product extends DB
{
    private $picture;
    private $title;
    private $description;
    private $price;
    private $stock_count;

    public function getProductByCategory($cID)
    {
        $q = "SELECT * FROM products INNER JOIN p_category ON products.category_id = p_category.cID WHERE p_category.cID = $cID";

        $data = $this->conn->query($q);

        if ($data->rowCount() == 0 ||  $data == NULL) {
            // header("location: product_categories.php?cat=error");
            return NULL;
        } else {
            return $data;
        }
    }

    public function addProduct($image, $title, $description, $price, $stock_count, $category_id)
    {
        $q = "INSERT INTO products (picture, title, description, price, stock, category_id) VALUES ('$image', '$title', '$description', $price, $stock_count, $category_id);";

        echo $q;

        if ($this->conn->exec($q)) {
            $_SESSION['status'] = "Product added, Successfully!";
            $_SESSION['status_code'] = "success";
            header("location: manage_products.php");
        } else {
            $_SESSION['status'] = "Unable to Add the Product";
            $_SESSION['status_code'] = "error";
            header("location: manage_products.php");
        }
    }

    public function getAllProducts()
    {
        $q = "SELECT * FROM products INNER JOIN p_category ON products.category_id = p_category.cID";

        $products = $this->conn->query($q);

        return $products;
    }

    public function searchProductByName($name)
    {
        $q = "SELECT * FROM products WHERE title LIKE '%$name%';";

        $data = $this->conn->query($q);

        if ($data->rowCount() == 0) {
            return false;
        } else {
            return $data;
        }
    }

    public function removeProduct($id)
    {
        $q = "DELETE FROM products WHERE pID=$id";

        if ($this->conn->exec($q)) {
            header("location: manage_products.php?msg=User deleted, successfully");
        } else {
            header("location: manage_products.php?msg=Something went wrong!");
        }
    }

    public function getProductByID($id)
    {
        $q = "SELECT * FROM products INNER JOIN p_category ON products.category_id = p_category.cID WHERE products.pID=$id;";

        $data = $this->conn->query($q);
        $product_data = $data->fetch(PDO::FETCH_ASSOC);

        return $product_data;
    }

    public function updateProduct($id, $image, $title, $description, $price, $stock_count, $category_id)
    {
        $q = "UPDATE products SET picture='$image', title='$title', description='$description', price='$price', stock='$stock_count', category_id='$category_id' WHERE pID=$id;";

        if ($this->conn->exec($q)) {
            $_SESSION['status'] = "Product Updated, Successfully!";
            $_SESSION['status_code'] = "success";
            header("location: edit_product_client.php?msg=Product updated successfully&id=$id");
        } else {
            $_SESSION['status'] = "Unable to add the Product";
            $_SESSION['status_code'] = "error";
            header("location: edit_product_client.php?msg=Something went wrong&id=$id");
        }
    }
}
