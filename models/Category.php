<?php
require_once '../db.php';
class Category
{
    private $id;
    private $title;
    private $description;
    public function __construct($id)
    {
        global $mysqli;
        $query = "SELECT title, description FROM categories WHERE category_id=$id";
        $result = $mysqli->query($query);
        $category_data = $result->fetch_assoc();
        $this->id = $id;
        $this->title = $category_data['title'];
        $this->description = $category_data['description'];
    }
    public static function getAll()
    {
        global $mysqli;
        $query = "SELECT category_id FROM categories";
        $result = $mysqli->query($query);
        $categories = [];
        while ($category_data = $result->fetch_assoc()) {
            $categories[] = new Category($category_data['category_id']);
        }
        return $categories;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getId()
    {
        return $this->id;

    }   
    

    public function createTable($new_category) 
    {
        global $mysqli;
        $query = "UPDATE categories SET category='$new_category'";
    }
}

