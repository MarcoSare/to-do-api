<?php
class responseHttp{

    function statusSuccess($code ,$message, $data=null){
        http_response_code($code);
        if(isset($data))
        $array = [
            "message" => $message,
            "data" => $data
        ];
        else
        $array = [
            "message" => $message
        ];
        echo json_encode($array);
    }


    function status400($message){
        http_response_code(400);
        $array = [
            "message" => $message,
            "status" => "Error",
            "code" => "400"
        ];
        echo json_encode($array);
    }

    function status401($message){
        http_response_code(401);
        $array = [
            "message" => $message,
            "status" => "Error",
            "code" => "400"
        ];
        echo json_encode($array);
    }
}

?>