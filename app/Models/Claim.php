<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Claim extends Database{
    public function getAllClaims(){
        $stmt = $this->conn->prepare("SELECT * FROM claims order by created_at desc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createClaim($user_id,$reason,$amount){
        $stmt = $this->conn->prepare("INSERT INTO claims (user_id,reason, amount) VALUES (?,?,?)");
        $stmt->execute([$user_id, $reason, $amount]);
        return $this->conn->lastInsertId();
    }

    public function getMyClaims($user_id){
        $stmt = $this->conn->prepare("SELECT * FROM claims WHERE user_id = ? order by created_at desc");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}