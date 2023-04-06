<?php 
header('Content-Type: application/json');
include_once('../controllers/taskController.php');
$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){
   if(isset($_REQUEST['id'])){
    $task = new taskController();
    $task->getTaskById($_REQUEST['id']);
    exit;
   }else {
    if(isset($_REQUEST['id_proyect'])){
        $task = new taskController();
        $task->getTaskByProyect($_REQUEST['id_proyect']);
    }
    else{
        $task = new taskController();
        $task->getTaskByUser();
    }
   }
}
if($method == 'POST'){
    $task = new taskController();
    $data = (json_decode(file_get_contents('php://input'),true));
    $task->createTask($data);
    exit;
}
if($method == 'PATCH'){
    $task = new taskController();
    $data = (json_decode(file_get_contents('php://input'),true));
    if (isset($_REQUEST['completed'])){
        $task->completedTask($data);
    }else{
        $task->updateTask($data);
    }
   
   
}
if($method == 'DELETE'){
   
}
