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


    function getTaskById($id){
        try{
            $this->query("call get_task_by_id('".$id."');");
            $assoc = $this->getArrayQuery();
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


    function getTaskByUser($idUser){
        try{
            $this->query("call get_task_by_user('".$idUser."');");
            $assoc = $this->getArray();
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

    function getTaskByProyect($id_proyect){
        try{
            $this->query("call get_task_by_proyect('".$id_proyect."');");
            $assoc = $this->getArray();
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

    function completedTask($data, $idUser){
        try{
            date_default_timezone_set('America/Mexico_City');
            $dateTime = date("Y-m-d G:i:s");
            $param="";
            $param.= "'".$data["id_task"]."'";
            $param.= ",'".$idUser."'";
            $param.= ",'".$dateTime."'";
            //echo $param;
            //exit;
            $this->query("call task_completed(".$param.");");
            $array = array(
                "status" => true,
                "message" => 'La tarea se ha completado correctamente' 
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

    function updateTask($data, $idUser){
        try{
            $param="";
            $param.= "'".$data["id_task"]."'";
            $param.= ",'".$idUser."'";
            $param.= ",'".$data["name"]."'";
            $param.= ",'".$data["description"]."'";
            $param.= ",'".$data["is_done"]."'";
            $param.= ",'".$data["observations"]."'";
            $param.= ",'".$data["dead_line"]."'";
            //echo $param;
            //exit;
            $this->query("call update_task(".$param.");");
            $array = array(
                "status" => true,
                "message" => 'La tarea se ha actualizado correctamente' 
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