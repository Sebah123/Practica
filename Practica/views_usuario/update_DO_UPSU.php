<?php
require_once '../bd/conexion.php';
require_once '../bd/data.php';
$con = new Conexion();
$data = new Data($con->getConexion());

$f['id'] = $_POST['txtId'];
$f['marca'] = $_POST['selMarcaUPS']; 
$f['serie'] = $_POST['txtSerie']; 
$f['modelo'] = $_POST['selModeloUPS'];
$f['cesfam'] = $_POST['selCesfam']; 
$f['box'] = $_POST['selBox']; 
$f['sector'] = $_POST['selSector']; 


$data->actualizarByIdUPS($f);
header("Location:../views_usuario/gestionUPSU.php");
?>