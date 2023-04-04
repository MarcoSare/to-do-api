<?php
class dataBase{
    function __construct(){}
    var $conn;
    var $restQuery;

    function connection(){
        $this->conn = mysqli_connect("localhost", "admin", "1234" ,"to_do_list");
        return $this->conn;
    }

    function query($query){
        mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
        $this->connection();
        $this->restQuery = mysqli_query($this->conn, $query);
        $this->close();
        $this->restQuery;
    }

    function getArrayQuery(){
        $array= array();
        while($row=mysqli_fetch_assoc($this->restQuery)){
            $array = $row;
        }
        return $array;
    }

    function getArray(){
        $array= array();
        while($row=mysqli_fetch_assoc($this->restQuery)){
            $array[] = $row;
        }
        return $array;
    }

    function close(){
        mysqli_close($this->conn);
    }
}

?>