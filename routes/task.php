<?php 
header('Content-Type: application/json');
include_once('../controllers/taskController.php');
$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){
  
}
if($method == 'POST'){
    $task = new taskController();
    $data = (json_decode(file_get_contents('php://input'),true));
    $task->createTask($data);
    exit;
}
if($method == 'PATCH'){
   
   
}
if($method == 'DELETE'){
   
}
