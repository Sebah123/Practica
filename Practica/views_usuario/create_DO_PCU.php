<?php
    require_once '../bd/conexion.php';
    require_once '../bd/data.php';
    
    $con = new Conexion();
    $data = new Data($con->getConexion());

    $n['equipo'] = $_POST['selEquipo'];
    $n['centro'] = $_POST['txtCentro'];
    $n['serie'] = $_POST['txtNumSerie'];
    $n['licencia'] = $_POST['txtLicencia'];
    $n['estado'] = $_POST['selEstado'];
    $n['responsable'] = $_POST['txtResponsable'];
    $n['fecha'] = $_POST['txtDate'];
    $n['marca'] = $_POST['selMarca'];
    $n['modelo'] = $_POST['selModelo'];
    $n['cesfam'] = $_POST['selCesfam'];
    $n['boxx'] = $_POST['selBoxx'];
    $n['sector'] = $_POST['selSector'];

    $data->crearPC($n);

    header("Location:../views_usuario/gestionComputadorU.php")
?>