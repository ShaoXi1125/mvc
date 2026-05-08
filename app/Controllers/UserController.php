<?php

namespace App\Controllers;

use App\Models\Claim;
use App\Models\Users;

class UserController{
    public function showLoginForm(){
        require 'views/login.php';
    }

    public function showRegisterForm(){
        require 'views/register.php';
    }   

    public function doLogin(){
        $model = new Users();
        $user = $model->findByUser($_POST['username']);

        if($user && password_verify($_POST['password'],$user['password'])){
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php?action=home");
        }else{
            $error = "Invalid username or password";
            require 'views/login.php';
        }
    }

    public function doRegister(){
        $user = new Users();
        $user->createUser ($_POST['username'],$_POST['password']);
        header("Location: index.php?action=login");
    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
    }
}