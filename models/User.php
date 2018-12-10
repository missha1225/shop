<?php

require_once '../db.php';

class User 
{
    private $id;
    private $name;
    private $email;
    private $role;

    public function __construct($id)
    {
        global $mysqli;

        $query = "SELECT name, email, role FROM users WHERE user_id=$id";
        $result = $mysqli->query($query);
        $user_data = $result->fetch_assoc();

        $this->id = $id;
        $this->name = $user_data['name'];
        $this->email = $user_data['email'];
        $this->role = $user_data['role'];
    }

    public static function getAll()
    {
        global $mysqli;

        $query = "SELECT user_id FROM users";
        $result = $mysqli->query($query);

        $users = [];
        while ($user_data = $result->fetch_assoc()) {
            $users[] = new User($user_data['user_id']);
        }

        return $users;
    }

    public function updatePass($new_pass) 
    {
        global $mysqli;

        $query = "UPDATE users SET pass='$new_pass' WHERE user_id=" . $this->id;
        $result = $mysqli->query($query);
        
        return $result;
    }

    public static function getByEmailPass ($email, $pass){
        global $mysqli;
        $query = "SELECT user_id FROM users WHERE email='$email' AND pass='$pass'";
        $result = $mysqli->query($query);
        
        if ($result != NULL) {
            header ('Location: main.php');
        } else {
            echo 'Ошибка'; 
        }
    }

}

// $res = User::getByEmailPass('admin@admin.ru', '123456');
// var_dump($res);