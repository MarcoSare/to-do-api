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

   function getTaskById ($id){
    $taskModel = new taskModel();
    $array = $taskModel->getTaskById($id);
    if($array['status']){
        $this->statusSuccess(200, "Successful", $array["data"]);
    }else{
        $this->status400($array["message"]);
    }
   }

   function getTaskByUser (){
    $taskModel = new taskModel();
    $auth = new auth();
    $status = $auth->authByToken();
    if($status['status']){
        $array = $taskModel->getTaskByUser($status['id']);
    if($array["status"]){
       $this->statusSuccess(200,"Successful", $array["data"]);
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

   function getTaskByProyect ($id_proyect){
    $taskModel = new taskModel();
    $array = $taskModel->getTaskByProyect($id_proyect);
    if($array['status']){
        $this->statusSuccess(200, "Successful", $array["data"]);
    }else{
        $this->status400($array["message"]);
    }
   }

   function completedTask($data){
    $taskModel = new taskModel();
    $auth = new auth();
    $status = $auth->authByToken();
    if($status['status']){
        $array = $taskModel->completedTask($data, $status['id']);
    if($array["status"]){
       $this->statusSuccess(200,$array["message"]);
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


   function updateTask($data){
    $taskModel = new taskModel();
    $auth = new auth();
    $status = $auth->authByToken();
    if($status['status']){
        $array = $taskModel->updateTask($data, $status['id']);
    if($array["status"]){
       $this->statusSuccess(200,$array["message"]);
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