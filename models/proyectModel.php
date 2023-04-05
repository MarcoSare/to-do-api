<?php
include_once('dataBase.php');
class proyectModel extends dataBase {
    function createProyect($data, $idUser){
        try{
            date_default_timezone_set('America/Mexico_City');
            $dateTime = date("Y-m-d G:i:s");
            $image = (isset($data["image"])? "'".($data["image"])."'" : 'null');
            $desc =  (isset($data["description"])? "'".($data["description"])."'" : 'null');
            $param="";
            $param.= "'".$idUser."'";
            $param.= ",'".$data['name']."'";
            $param.= ",".$desc."";
            $param.= ",".$image."";
            $param.= ",'".$dateTime."'";
            //echo $param;
            //exit;
            $this->query("call create_proyect(".$param.");");
            $array = array(
                "status" => true,
                "message" => 'El proyecto se ha registrado correctamente' 
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

    function getById($id){
        try{
            $this->query("call get_proyect_by_id('".$id."');");
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

    function getByUser($idUser){
        try{
            $this->query("call get_proyect_by_user('".$idUser."');");
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

    function updateProyect($data, $idUser){
        try{
            $param="";
            $param.= "'".$data['id']."'";
            $param.= ",'".$idUser."'";
            $param.= ",'".$data['name']."'";
            $param.= ",'".$data['description']."'";
            $param.= ",'".$data['image']."'";
            //echo $param;
            //exit;
            $this->query("call update_proyect(".$param.");");
            $array = array(
                "status" => true,
                "message" => 'El proyecto se ha actualizado correctamente' 
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

    function deleteProyect($data, $idUser){
        try{
            $param="";
            $param.= "'".$data['id']."'";
            $param.= ",'".$idUser."'";
            $this->query("call delete_proyect(".$param.");");
            $array = array(
                "status" => true,
                "message" => 'El proyecto se ha eliminado correctamente' 
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