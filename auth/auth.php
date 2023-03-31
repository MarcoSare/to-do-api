<?php
include_once('jwt.php');
include_once('../controllers/responseHttp.php');
class auth extends responseHttp{

    function authByToken(){
        try{
            $headers = apache_request_headers();
            $token="";
            if(isset($headers["Authorization"])){
                $token = $headers["Authorization"];
            }else if (isset($headers["authorization"])){
                $token = $headers["authorization"];
            }else{
                $this->status401();
                exit;
            }
            $jwtObj = new jsonWebToken();
            $decode = $jwtObj->decodeToken($token);
            $array = json_decode(json_encode($decode,true),true);
            $data = $array["data"];
            $time = time(); 
            if($data["exp"] > $time){
                echo "token expirado";
                exit;
            }
            $retorno = array(
                "status" => true,
                "id" => $data["id"]
            );
            return $retorno;
        }catch(Exception $e){
            $this->status401();
            exit;
        }
    }
}

?>