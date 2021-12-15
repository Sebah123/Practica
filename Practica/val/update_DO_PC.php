<?php
    require_once '../bd/conexion.php';
    require_once '../bd/data.php';
    
    $con = new Conexion();
    $data = new Data($con->getConexion());

    $n['id'] = $_POST['txtId'];
    $n['equipo'] = $_POST['selTipoPC'];
    $n['centro'] = $_POST['txtCentro'];
    $n['serie'] = $_POST['txtSerie'];
    $n['licencia'] = $_POST['txtLicencia'];
    $n['estado'] = $_POST['selEstadoPC'];
    $n['responsable'] = $_POST['txtResponsable'];
    $n['fecha'] = $_POST['txtFecha'];
    $n['marca'] = $_POST['selMarca'];
    $n['modelo'] = $_POST['selModelo'];
    $n['cesfam'] = $_POST['selCesfam'];
    $n['boxx'] = $_POST['selBoxx'];
    $n['sector'] = $_POST['selSector'];

    $data->actualizarByIdPC($n);

    header("Location:../views/gestionComputador.php")
?>