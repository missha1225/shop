<?php
require_once "../db.php";
require_once "../models/Product.php";

class Order 
{
    private $id;
    private $status;
    private $address;

    public function __construct($id)
    {
        global $mysqli;
        $query = "SELECT status, address FROM orders WHERE order_id=$id";
        $result = $mysqli->query($query);
        $order_data = $result->fetch_assoc();
        $this->id = $id;
        $this->status = $order_data['status'];
        $this->address = $order_data['address'];
    }

    public static function getAll()
    {
        global $mysqli;

        $query = "SELECT order_id FROM orders";
        $result = $mysqli->query($query);

        $orders = [];
        while ($order_data = $result->fetch_assoc()) {
            $orders[] = new Order($order_data['order_id']);
        }

        return $orders;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getProductTotal($product_id)
    {
        global $mysqli;
        $query = "SELECT count*price as productTotal FROM order_products WHERE order_id={$this->id} AND product_id=$product_id;";
        $result = $mysqli->query($query);
        $result_assoc = $result->fetch_assoc();
        return $result_assoc['productTotal'];
    }
    
    public function getTotal()
    {
        global $mysqli;
        $query = "SELECT SUM(count*price) as total FROM order_products WHERE order_id={$this->id};";
        $result = $mysqli->query($query);
        $result_assoc = $result->fetch_assoc();
        var_dump($result_assoc);
        return $result_assoc['total'];
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setStatus($status)
    {
        global $mysqli;
        $this->status = $status;
        $query = "UPDATE orders SET status=$status WHERE order_id={$this->id};";
        $mysqli->query($query);
    }

    public function setAddress($address)
    {
        global $mysqli;
        $this->address = $address;
        $query = "UPDATE orders SET address=$address WHERE order_id={$this->id};";
        $mysqli->query($query);
    }

    public function setCount($count, $product_id)
    {
        global $mysqli;
        $query = "UPDATE order_products SET count=$count WHERE order_id={$this->id} AND product_id={$product_id};";
        $mysqli->query($query);
    }

    public function deleteProduct($product_id)
    {
        global $mysqli;
        $query = "DELETE FROM order_products WHERE order_id={$this->id} AND product_id=$product_id;";
        $mysqli->query($query);
    }

    public function deleteOrder($id)
    {
        global $mysqli;
        $query = "DELETE FROM order WHERE order_id=$id";
        $mysqli->query($query);
        $query_2 = "DELETE FROM order_products WHERE order_id=$id;";
        $mysqli->query($query);
        $this->__destruct();
    }

    public static function create($address)
    {
        global $mysqli;
        $query = "INSERT INTO orders (status, address, user_id) VALUES (1, '$address', 0)";
        $result = $mysqli->query($query);
        $new_order = new Order($mysqli->insert_id);
        return $new_order;
    }

    public function addOrderProduct($product_id, $size_id, $count)
    {
        global $mysqli;
        $product = new Product($product_id);
        $product_price = $product->getPrice();
        $query_check = "SELECT * FROM order_products WHERE order_id={$this->id} AND product_id=$product_id AND size_id=$size_id AND count=$count";
        $result_check = $mysqli->query($query_check);
        $result_check_assoc = $result_check->fetch_assoc();
        if ($result_check_assoc == NULL) {
            $query = "INSERT INTO order_products (order_id, product_id, size_id, price, count) VALUES ({$this->id}, $product_id, $size_id, $product_price, $count)";
            $result = $mysqli->query($query);
        }
    }
}
