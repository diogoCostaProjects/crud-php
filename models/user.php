<?php

require_once('enviroments/connection.php');

class UserModel
{

    public $conn = null;
    public $users = [];
    public $user_colors = [];

    public function __construct()
    {
        $this->conn = new Connection();
    }

    public function getUsers()
    {
        $stmt = $this->conn->query("SELECT * FROM users");

        while ($linhas = $stmt->fetch(PDO::FETCH_OBJ)) {
            array_push($this->users, $linhas);
        }

        return $this->users;
    }

    public function update($data)
    {
        try {
            $query = "UPDATE users SET name = :name, email = :email WHERE id = :id";
            $bind = array(':name' => $data['nome'], ':email' => $data['email'], ':id' => $data['id']);

            $this->conn->execute($query, $bind);
            return true;
        }
        catch (Exception $e) {
             return false;
        }
    }

    public function insertColor($data)
    {
        try {
            $query = "INSERT INTO user_colors (user_id, color_id) VALUES (:user_id, :color_id)";
            $bind = array(':user_id' => $data['user_id'], ':color_id' => $data['color_id']);

            $this->conn->execute($query, $bind);
            return true;
        }
        catch (Exception $e) {
             return false;
        }
    }

    public function getColorsUser($idUser)
    {
        $stmt = $this->conn->query("SELECT * FROM user_colors WHERE id='$idUser'");

        while ($linhas = $stmt->fetch(PDO::FETCH_OBJ)) {
            array_push($this->user_colors, $linhas);
        }

        return $this->user_colors;
    }
}
