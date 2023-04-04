<?php 
header('Content-Type: application/json');
include_once('../controllers/proyectController.php');
$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){
    $proyect = new proyectController();
   if(isset($_REQUEST['id'])){
   $id = $_REQUEST['id'];
    $proyect->getById($id);
    exit;
   }else {
    $proyect->getByUser();
   }
}
if($method == 'POST'){
    $proyect = new proyectController();
    $data = (json_decode(file_get_contents('php://input'),true));
    $proyect->createProyect($data);
    exit;
}
if($method == 'PATCH'){
   
}
if($method == 'DELETE'){
  
}
