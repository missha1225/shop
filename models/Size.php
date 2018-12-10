<?php
require_once "../db.php";

class Size 
{
    private $id;
    private $value;
    
    public function __construct($id)
    {
        global $mysqli;
        $query = "SELECT value FROM sizes WHERE size_id=$id";
        $result = $mysqli->query($query);
        $size_data = $result->fetch_assoc();
        $this->id = $id;
        $this->value = $size_data['value'];
    }

    public function getProductValue($product_id)
    {
        global $mysqli;
        $query = "SELECT product_id as productValue FROM product_sizes WHERE size_id={$this->id} AND product_id=$product_id;";
        $result = $mysqli->query($query);
        $result_assoc = $result->fetch_assoc();
        return $result_assoc['productValue'];
    }

    public function getValue()
    {
        return $this->value;
    }   

    public function updateValue($value)
    {
        global $mysqli;
        $this->value = $value;
        $query = "UPDATE sizes SET value=$value WHERE size_id={$this->id};";
        $mysqli->query($query);
    }

    public function updateProductValue($value, $product_id)
    {
        global $mysqli;
        $query = "UPDATE product_sizes SET value=$value WHERE size_id={$this->id} AND product_id={$product_id};";
        $mysqli->query($query);
    }

    public function deleteProductValue($product_id)
    {
        global $mysqli;
        $query = "DELETE FROM product_sizes WHERE size_id={$this->id} AND product_id=$product_id;";
        $mysqli->query($query);
    }

    public function deleteValue($id)
    {
        global $mysqli;
        $query = "DELETE FROM sizes WHERE size_id=$id";
        $mysqli->query($query);
        $query_2 = "DELETE FROM product_sizes WHERE size_id=$id;";
        $mysqli->query($query);
        $this->__destruct();
    }
}
