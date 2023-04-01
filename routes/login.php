<?php 
header('Content-Type: application/json');
include_once('../controllers/userController.php');
$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST'){
    $user = new userController();
    $data = (json_decode(file_get_contents('php://input'),true));
    $user->login($data);
    exit;
}

