<?php

spl_autoload_register(function($class){
    $file = str_replace(['App\\','\\'], ['app/','/'], $class) . '.php';
    if(file_exists($file)){
        require_once $file;
    }
});

$action = $_GET['action'] ?? 'login';

use App\Controllers\ClaimController;
use App\Controllers\UserController;

$auth = new UserController();
// $app = new ClaimController();
// $app->index();

switch($action){
    case 'login':
        $auth -> showLoginForm();
        break;
    case 'register':
        $auth -> showRegisterForm();
        break;
    case 'login_post':
        $auth -> doLogin();
        break;
    case 'register_post':
        $auth -> doRegister();
        break;
    case 'logout':
        $auth -> logout();
        break;
    case 'home':
        $app = new ClaimController();
        $app->claimForm();
        break;
    case 'create_claim':
        $app = new ClaimController();
        $app->createClaim();
        break;
    case 'my_claims':
        $app = new ClaimController();
        $app->myClaims();
        break;
}