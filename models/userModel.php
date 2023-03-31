<?php
include_once('dataBase.php');
include_once('../auth/jwt.php');
class userModel extends dataBase{

    function register($data){
        try{
            $param="";
            $param.= "'".$data['first_name']."'";
            $param.= ",'".$data['last_name']."'";
            $param.= ",'".$data['email']."'";
            $param.= ",'".$data['password']."'";
            $param.= ",'".$data['gender']."'";
            $param.= ",'".$data['is_admin']."'";
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

    function login($data){
        try{
            $jwtObj = new jsonWebToken();
            $param="";
            $param.= "'".$data['email']."'";
            $param.= ",'".$data['password']."'";
            $this->query("call login(".$param.");");
            $assoc = $this->getArrayQuery();
            $token = $jwtObj->createToken($assoc);
            $assoc['token'] = $token;
            $array = array(
                "status" => true,
                "data" => $assoc
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

    function updateUser($data, $id){
        try{
            $param="";
            $param.= "'".$id."'";
            $param.= ",'".$data['state']."'";
            $param.= ",'".$data['first_name']."'";
            $param.= ",'".$data['last_name']."'";
            $param.= ",'".$data['email']."'";
            $param.= ",'".$data['password']."'";
            $param.= ",'".$data['gender']."'";
            $param.= ",'".$data['is_admin']."'";
            $param.= ",'".$data['profile_picture']."'";
            $this->query("call update_user(".$param.");");
            $array = array(
                "status" => true,
                "message" => 'El usuario se ha actualizado correctamente' 
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