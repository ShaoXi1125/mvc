<?php

namespace App\Models;
use App\Core\Database;

class Users extends Database{
    public function findByUser($username){
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function createUser($username,$password){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users(username,password) VALUES (?,?)");
        $stmt->execute([$username, $hashedPassword]);
        return $this->conn->lastInsertId();
    }


}