<?php

class Conexion {

    private $host = "localhost";
    private $user = "root";
    private $passwd = "";
    private $db = "practica";

    private $con;

    public function __construct(){
        $this->con = new mysqli($this->host,$this->user,$this->passwd,$this->db);
        if($this->con->connect_error){
            die("Error Conexión!");
        }
        else{
            
        }
    }

    public function getConexion(){
        return $this->con;
    }

}
