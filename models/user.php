<?php

require_once('enviroments/connection.php');

class UserModel {

    public $conn = null;
    public $users = [];

    public function __construct() {
        $this->conn = new Connection();
    }
    
    public function getUsers()
    {
        $stmt = $this->conn->query("SELECT * FROM users");
        
        while($linhas = $stmt->fetch(PDO::FETCH_OBJ)){
            array_push($this->users, $linhas);
        }

        return $this->users;
    }
}