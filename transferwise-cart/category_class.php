<?php

include_once('db.php');

if (session_id() == '') {
    session_start();
}

class Category extends DB
{
    public function getAllCategories()
    {
        $q = "SELECT * FROM p_category";

        return $this->conn->query($q);
    }

    public function addCategoryName($cat)
    {
        $q = "INSERT INTO p_category (name) VALUES ('$cat')";

        if ($this->conn->exec($q)) {
            $_SESSION['status'] = "Category added, Successsfully!";
            $_SESSION['status_code'] = 'success';
            header("location: manage_categories.php");
        } else {
            $_SESSION['status'] = "Something went wrong!";
            $_SESSION['status_code'] = 'error';
            header("location: manage_categories.php?msg=Error!");
        }
    }

    public function deleteCategory($cID)
    {
        $q = "DELETE FROM p_category WHERE cID = $cID";

        if ($this->conn->exec($q)) {
            $_SESSION['status'] = "Category deleted, Successsfully!";
            $_SESSION['status_code'] = 'success';
            header("location: manage_categories.php");
        } else {
            $_SESSION['status'] = "Something went wrong!";
            $_SESSION['status_code'] = 'error';
            header("location: manage_categories.php");
        }
    }


    public function updateCatgory($id, $name)
    {
        $q = "UPDATE p_category SET name = '$name' WHERE id = $id";

        if ($this->conn->exec($q)) {
            header("location: manage_category.php?msg=Category Updated, Successsfully!");
        } else {
            header("location: manage_category.php?msg=Error!");
        }
    }
}
