<?php
    require_once '../bd/conexion.php';
    require_once '../bd/data.php';
    
    $con = new Conexion();
    $data = new Data($con->getConexion());

    $n['marca'] = $_POST['selMarcaUPS'];
    $n['serie'] = $_POST['txtSerie'];
    $n['modelo'] = $_POST['selModeloUPS'];
    $n['cesfam'] = $_POST['selCesfam'];
    $n['boxx'] = $_POST['selBox'];
    $n['sector'] = $_POST['selSector'];
    

    $data->crearUPS($n);

    header("Location:../views/gestionUPS.php")
?>