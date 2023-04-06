<?php
header('Content-Type: application/json');
include_once('../auth/auth.php'); 
include_once('../controllers/responseHttp.php');
 if($_SERVER['REQUEST_METHOD'] == "POST"){
    try{
    $data = json_decode(file_get_contents('php://input'),true);
    $auth = new auth();
    $resp = new responseHttp(); 
    $token_data = $auth->authByToken();
    $image = $data["imagen"];
    $image = str_replace('data:image/png;base64,','',$image);
    $image = str_replace(' ',"+",$image);
    $imgName = "ImagenesUsuarios/foto_perfil_".$token_data['id'].'.jpg';
    $host= $_SERVER["HTTP_HOST"];
    if (file_put_contents($imgName, base64_decode($image))){
        $array = [
            "link" => "http://".$host.getPath()."ImagenesUsuarios/foto_perfil_".$token_data['id'].'.jpg'
        ];
        $resp->statusSuccess(200,"Se ha subido exitosamente la imagen", $array);
    }else{
        $resp->status400("Error: no se ha subido exitosamente la imagen");
    }
    }
    catch(Exception $e){
        $resp->status400("Ha ocurrido un error inesperado");
    }
}

function getPath(){
    $data = explode("/",$_SERVER["REQUEST_URI"]); 
    $path ="";
    for($i=0;count($data)-1>$i;$i++)
    $path.= $data[$i]."/";
    return $path;
}

?>