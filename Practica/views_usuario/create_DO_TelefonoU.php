<?php
    require_once '../bd/conexion.php';
    require_once '../bd/data.php';
    
    $con = new Conexion();
    $data = new Data($con->getConexion());

    $n['serie'] = $_POST['txtSerie'];
    $n['marca'] = $_POST['selMarcaTel'];
    $n['modelo'] = $_POST['selModeloTel'];
    $n['tipo_tecno'] = $_POST['selTipoTec'];
    $n['cesfam'] = $_POST['selCesfam'];
    $n['boxx'] = $_POST['selBox'];
    $n['sector'] = $_POST['selSector'];

    $data->crearTelefono($n);

    header("Location:../views_usuario/gestionTelefonoU.php")
?>