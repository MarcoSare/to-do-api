<?php
include_once('../models/userModel.php');
include_once('responseHttp.php');
include_once('../auth/auth.php');
class userController extends responseHttp{
    function register ($data){
        $userModel = new userModel();
        $array = $userModel->register($data);
        if($array["status"]){
           $this->statusSuccess(201,$array["message"]);
        }else{
            $this->status400($array["message"]);
        }
    } 

    function login ($data){
        $userModel = new userModel();
        $array = $userModel->login($data);
        if($array["status"]){
           $this->statusSuccess(200,"login success", $array["data"]);
        }else{
            $this->status400($array["message"]);
        }
    } 
    function updateUser($data){
        $userModel = new userModel();
        $auth = new auth();
        $status = $auth->authByToken();
        if($status['status']){
            $array = $userModel->updateUser($data, $status['id']);
        if($array["status"]){
           $this->statusSuccess(200,$array["message"]);
        }else{
            $this->status400($array["message"]);
        }
        }else{
            echo $status['message'];
            exit;
        }
    } 

    function deleteUser(){
        $userModel = new userModel();
        $auth = new auth();
        $status = $auth->authByToken();
        if($status['status']){
            $array = $userModel->deleteUser($status['id']);
        if($array["status"]){
           $this->statusSuccess(200,$array["message"]);
        }else{
            $this->status400($array["message"]);
        }
        }else{
            echo $status['message'];
            exit;
        }
    } 

    function getUser(){
        $userModel = new userModel();
        $auth = new auth();
        $status = $auth->authByToken();
        if($status['status']){
            $array = $userModel->getUser($status['id']);
        if($array["status"]){
           $this->statusSuccess(200,"Request success",$array["data"] );
        }else{
            $this->status400($array["message"]);
        }
        }else{
            echo $status['message'];
            exit;
        }
    } 
}



?>