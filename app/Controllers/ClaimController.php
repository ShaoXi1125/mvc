<?php

namespace App\Controllers;

use App\Models\Claim;

class ClaimController{
    public function index(){
        $model = new Claim();
        $claims = $model->getAllClaims();
        $title ="Staff Claim List";
        require 'views/list.php';
    }

    public function claimForm(){
        require 'views/claim_form.php';
    }

    public function createClaim(){
        session_start();
        if(!isset($_SESSION['user_id'])){
            header("Location: index.php?action=login");
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $reason = $_POST['claim_description'];
        $amount = $_POST['claim_amount'];

        if(empty($reason) || empty($amount)){
            $error = "Please fill in all fields";
            require 'views/claim_form.php';
            return;
        }

        $model = new Claim();
        $model->createClaim($user_id, $reason, $amount);
        header("Location: index.php?action=home");

    }

    public function myClaims(){
        session_start();

        if(!isset($_SESSION['user_id'])){
            header("Location: index.php?action=login");
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $model = new Claim();
        $claims = $model->getMyClaims($user_id);
        $title = "My Claims";
        require 'views/myList.php';
    }
}