<?php

require_once '../db.php';

class Product 
{
    private $product_id;
    private $title;
    private $price;
    private $image;
    private $description;
    private $category_id;
    private $collection_id;
    private $out_of_stock;

    public function __construct($id)
    {
        global $mysqli;

        $query = "SELECT title, description, price, image, category_id, collection_id, out_of_stock FROM products WHERE product_id=$id";
        $result = $mysqli->query($query);
        $product_data = $result->fetch_assoc();

        $this->product_id = $id;
        $this->title = $product_data['title'];
        $this->description = $product_data['description'];
        $this->price = $product_data['price'];
        $this->image = $product_data['image'];
        $this->category_id = $product_data['category_id'];
        $this->collection_id = $product_data['collection_id'];
        $this->out_of_stock = $product_data['out_of_stock'];
    }

    public static function getAll($category_id = false, $collection_id = false, $order_id = false)
    {
        global $mysqli;
        $conditions = '';
        $tables = 'products p';
        if ($category_id) {
            $conditions .= " AND p.category_id=$category_id";
        }
        if ($collection_id) {
            $conditions .= " AND p.collection_id=$collection_id";
        }

        if ($order_id) {
            $conditions .= " AND op.product_id=p.product_id AND op.order_id=$order_id";
            $tables .= ', order_products op';
        }


        $query = "SELECT p.product_id FROM $tables WHERE 1 $conditions ORDER BY p.product_id";
       

        $result = $mysqli->query($query);

        $products = [];
        while ($product_data = $result->fetch_assoc()) {
            $products[] = new Product($product_data['product_id']);
        }

        return $products;
    }

    public function getSizes()
    {
        global $mysqli;
        $query = "SELECT size_id FROM product_sizes WHERE product_id={$this->product_id} ORDER BY size_id";
        $result = $mysqli->query($query);
        $sizes = [];
        while ($size_item = $result->fetch_assoc()) {
            $sizes[] = $size_item;
        }
        return $sizes;
    }

    public function getSizeIdAndValues() {
        global $mysqli;
        $query = "SELECT ps.size_id, value FROM sizes, product_sizes ps WHERE product_id={$this->product_id} AND ps.size_id=sizes.size_id";
        $result = $mysqli->query($query);
        $sizes = [];
        while ($size_item = $result->fetch_assoc()) {
            $sizes[] = $size_item;
        }
        return $sizes;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getImage()
    {
        return $this->image;
    }
  
    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function getCollectionId()
    {
        return $this->collection_id;
    }

    public function getOutOfStock()
    {
        return $this->out_of_stock;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    // public function update($) 
    // {
    //     global $mysqli;

    //     $query = "UPDATE users SET pass='$new_pass' WHERE user_id=" . $this->id;
    //     $result = $mysqli->query($query);
        
    //     return $result;
    // }

}

// SELECT * FROM order_products op, products p
// WHERE op.order_id=1 AND op.product_id=p.product_id
