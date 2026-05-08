<?php

    namespace App\Controllers;
    use App\Models\Claim;
    use App\Core\AuthMiddleware;


    class ManagerController{
        public function __construct(){
            AuthMiddleware::isManager();
        }

        public function index(){
            $model = new Claim();
            $claims = $model->getAllClaims();
            $title ="Staff Claim List";
            require 'views/list.php';
        }
        
        
    }