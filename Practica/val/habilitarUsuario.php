<?php
    require_once '../bd/conexion.php';
    require_once '../bd/data.php';
    
    $con = new Conexion();
    $data = new Data($con->getConexion());
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $data->habilitarById($id);
    }
    
    header("Location:../val/usuariosDH.php");
?>