<?php 
include_once("../vendor/autoload.php");
use Firebase\JWT\JWT;
 //JSON WEB TOKEN
class jsonWebToken{
    function createToken($data){
        $time = time();
        $token = array(
            "iat" => $time,
            "exp" => $time + (60*10),
            "data" => $data
        );
        $jwt = JWT::encode($token, "190801" , "HS256");
        return $jwt;
    }
}
?> 