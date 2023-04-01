<?php
include_once('jwt.php');
include_once('../controllers/responseHttp.php');
class auth extends responseHttp{

    function authByToken(){
        try{
            $token = $this->getToken();
            $jwtObj = new jsonWebToken();
            $decode = $jwtObj->decodeToken($token);
            $array = json_decode(json_encode($decode,true),true);
            $data = $array["data"];
            $this->isExp($data);
            $retorno = array(
                "status" => true,
                "id" => $data["id"]
            );
            return $retorno;
        }catch(Exception $e){
            $this->status401("Usted no tiene permisos");
            exit;
        }
    }


    function getToken(){
            $headers = apache_request_headers();
            $token="";
            if(isset($headers["Authorization"])){
                $token = $headers["Authorization"];
            }else if (isset($headers["authorization"])){
                $token = $headers["authorization"];
            }else{
                $this->status401("Usted no tiene permisos");
                exit;
            }
            return $token;
    }

    function isExp($data){
        $time = time(); 
        if($data["exp"] > $time){
            $this->status401("Token expirado");
            exit;
        }
        return true;
    }
}

?>