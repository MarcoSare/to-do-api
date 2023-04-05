<?php
include_once('dataBase.php');

class taskModel extends dataBase {
    function createTask($data, $idUser){
        try{
            $desc =  (isset($data["description"])? "'".($data["description"])."'" : 'null');
            $param="";
            $param.= "'".$data["id_proyect"]."'";
            $param.= ",'".$idUser."'";
            $param.= ",'".$data['name']."'";
            $param.= ",".$desc."";
            $param.= ",'".$data['observations']."'";
            $param.= ",'".$data['dead_line']."'";
            //echo $param;
            //exit;
            $this->query("call create_task(".$param.");");
            $array = array(
                "status" => true,
                "message" => 'La tarea se ha registrado correctamente' 
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