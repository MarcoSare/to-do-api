<?php
include_once('../models/userModel.php');
include_once('responseHttp.php');
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
}



?>