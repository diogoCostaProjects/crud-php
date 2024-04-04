<?php

require_once('enviroments/connection.php');

class UserModel
{

    public $conn = null;
    public $users = [];

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
            $query = "UPDATE users SET name = '{$data['nome']}', email = '{$data['email']}' WHERE id = '{$data['id']}'";

            $this->conn->query($query);
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
        $stmt = $this->conn->query("SELECT c.* 
                                    FROM colors AS c
                                    INNER JOIN user_colors AS uc ON c.id = uc.color_id
                                    WHERE uc.user_id='$idUser'");

        while ($linhas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user_colors[] = $linhas;
        }

        return $user_colors;
    }

    public function insert($data)
    {
        try {
            $this->conn->query("INSERT INTO users (name, email) VALUES ('{$data['nome']}', '{$data['email']}')");
            $last_id = $this->conn->last_id();

            foreach ($data['cores'] as $cor){
                $this->conn->query("INSERT INTO user_colors (user_id, color_id) VALUES ('{$last_id}', '{$cor}')");
            }

            return true;
        }
        catch (Exception $e) {
             return false;
        }
    }

    public function delete($data)
    {
        try {
            $this->conn->query("DELETE FROM users WHERE id='{$data['id']}'");
            return true;
        }
        catch (Exception $e) {
             return false;
        }
    }

    public function deleteUserColors($data)
    {
        try {
            $this->conn->query("DELETE FROM user_color WHERE user_id='{$data['id']}'");
            return true;
        }
        catch (Exception $e) {
             return false;
        }
    }

    //obs: o certo seria criar um model para colors, fiz no mesmo model de usuário pois tinha pouco tempo restante para a tarefa
    public function getAllColors()
    {
        $stmt = $this->conn->query("SELECT * FROM colors");
        $colors = [];

        while ($linhas = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($colors, $linhas);
        }

        return $colors;
    }
}
