<?php
    namespace App\Core;

    class AuthMiddleware{
        public static function isLoggedIn(){
            if(session_status() == PHP_SESSION_NONE) session_start(); 
            if(!isset($_SESSION['user_id'])){
                header("Location: index.php?action=login");
                exit();
            }
        }

        public static function isManager(){
            self::isLoggedIn();
            if($_SESSION['role'] !== 'manager'){
                die("Access denied: Managers only");
            }
        }
    }
