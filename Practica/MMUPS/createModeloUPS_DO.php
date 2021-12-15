<?php 
require_once '../bd/conexion.php';
require_once '../bd/data.php';

$con = new Conexion();
$data = new Data($con->getConexion());

$m['modelo'] = $_POST['txtModelo'];
$m['marca'] = $_POST['selMarca'];

$data->crearModeloUPS($m);

header("Location:../views/create_UPS.php")
?>