<?php 
header('Content-Type: application/json');
include_once('../controllers/userController.php');
$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){
    $user = new userController();
    $user->getUser();
    exit;
}
if($method == 'POST'){
    $user = new userController();
    $data = (json_decode(file_get_contents('php://input'),true));
    $user->register($data);
    exit;
}
if($method == 'PATCH'){
    $user = new userController();
    $data = (json_decode(file_get_contents('php://input'),true));
    $user->updateUser($data);
    exit;
}
if($method == 'DELETE'){
    $user = new userController();
    $user->deleteUser();
    exit;
}
