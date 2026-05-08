<?php

namespace App\Core;

use PDO;

class Database{
    public $conn;

    public function __construct(){
        $host = 'localhost';
        $dbname = "company_db";
        $username = "root";
        $password = "123qwe";

        try{
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Database connection failed: " . $e->getMessage());
        }
    }
}