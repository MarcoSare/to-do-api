<?php
include_once('../models/taskModel.php'); 
include_once('responseHttp.php');
include_once('../auth/auth.php');

class taskController extends responseHttp{
   function createTask ($data){
    $taskModel = new taskModel();
    $auth = new auth();
    $status = $auth->authByToken();
    if($status['status']){
        $array = $taskModel->createTask($data, $status['id']);
    if($array["status"]){
       $this->statusSuccess(201,$array["message"]);
    }else{
        if($array["message"] == "USTED NO TIENE PERMISOS")
        $this->status401($array["message"]);
        else
        $this->status400($array["message"]);
    }
    }else{
        $this->status400($status["message"]);
    }
   }

   
}