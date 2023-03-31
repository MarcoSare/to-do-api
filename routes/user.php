<?php 
header('Content-Type: application/json');
include_once('../controllers/userController.php');
$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){
    echo 'Hola mundo desde get';
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
    echo 'Hola mundo desde delete';
    exit;
}
