<?php
include_once('dataBase.php');
class userModel extends dataBase{

    function register($data){
        try{
            $param="";
            $param.= "'".$data['first_name']."'";
            $param.= "'".$data['last_name']."'";
            $param.= "'".$data['email']."'";
            $param.= "'".$data['password']."'";
            $param.= "'".$data['gender']."'";
            $param.= "'".$data['is_admin']."'";
            $this->query("call register_user(".$param.");");
            $array = array(
                "status" => true,
                "message" => 'El usuario se ha registrado correctamente' 
            );
            return $array;
        }
        catch(Exception $e){
            $array = array(
                "status" => false,
                "message" => $e->getMessage()
            );
            return $array;
        }
    }

}

?>