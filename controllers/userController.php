<?php
include_once('../models/userModel.php');
class userController{
    function register ($data){
        $userModel = new userModel();
        $array = $userModel->register($data);
        if($array["status"]){
            http_response_code(200);
            echo $array["message"];
        }else{
            http_response_code(400);
            echo $array["message"];
        }
    } 
}



?>