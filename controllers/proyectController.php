<?php
include_once('../models/proyectModel.php'); 
include_once('responseHttp.php');
include_once('../auth/auth.php');

class proyectController extends responseHttp{
   function createProyect ($data){
    $proyModel = new proyectModel();
    $auth = new auth();
    $status = $auth->authByToken();
    if($status['status']){
        $array = $proyModel->createProyect($data, $status['id']);
    if($array["status"]){
       $this->statusSuccess(201,$array["message"]);
    }else{
        $this->status400($array["message"]);
    }
    }else{
        $this->status400($status["message"]);
    }
   }

   function getById ($id){
    $proyModel = new proyectModel();
    $array = $proyModel->getById($id);
    if($array["status"]){
       $this->statusSuccess(200,"Succesful",$array["data"]);
    }else{
        $this->status400($array["message"]);
    }
    }

    function getByUser(){
        $proyModel = new proyectModel();
        $auth = new auth();
        $status = $auth->authByToken();
        if($status['status']){
            $array = $proyModel->getByUser($status['id']);
        if($array["status"]){
           $this->statusSuccess(200,"Successful", $array["data"]);
        }else{
            $this->status400($array["message"]);
        }
        }else{
            $this->status400($status["message"]);
        }
       }
   
}