<?php
require_once '../db.php';

class Collection 
{
    private $id;
    private $title;
    private $description;
    
    public function __construct($id)
    {
        global $mysqli;

        $query = "SELECT title, description FROM collections WHERE collection_id=$id";
        $result = $mysqli->query($query);
        $collection_data = $result->fetch_assoc();

        $this->id = $id;
        $this->title = $collection_data['title'];
        $this->description = $collection_data['description'];
    }

    public static function getAll()
    {
        global $mysqli;
        $query = "SELECT collection_id FROM collections";
        $result = $mysqli->query($query);

        $collections = [];
        while ($collection_data = $result->fetch_assoc()) {
            $collections[] = new Collection($collection_data['collection_id']);
        }
        return $collections;
    }

    public function getTitle()
    {
        return $this->title;
    }

}
