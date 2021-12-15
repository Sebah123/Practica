<?php
require_once '../bd/conexion.php';
require_once '../bd/data.php';
$con = new Conexion();
$data = new Data($con->getConexion());

$f['id'] = $_POST['txtId'];
$f['marca'] = $_POST['selMarcaTel']; 
$f['serie'] = $_POST['txtSerie']; 
$f['modelo'] = $_POST['selModeloTel'];
$f['tipo'] = $_POST['selTipoTec']; 
$f['cesfam'] = $_POST['selCesfam']; 
$f['box'] = $_POST['selBox']; 
$f['sector'] = $_POST['selSector']; 

$data->actualizarByIdTelefono($f);
header("Location:../views_usuario/gestionTelefonoU.php");
?>