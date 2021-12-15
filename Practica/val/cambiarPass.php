<?php
    require_once '../bd/conexion.php';
    require_once '../bd/data.php';

    
    $con = new Conexion();
    $data = new Data($con->getConexion());

    $n1 = $_POST['txtRut'];
    $n2 = $_POST['txtPass'];

    $data->cambiarPass($n1,$n2); 
    
    header("Location:../views/login.php")
?>