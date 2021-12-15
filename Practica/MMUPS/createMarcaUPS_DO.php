<?php 
require_once '../bd/conexion.php';
require_once '../bd/data.php';

$con = new Conexion();
$data = new Data($con->getConexion());

$m = $_POST['txtMarca'];

$data->crearMarcaUPS($m);

header("Location:../views/create_UPS.php")
?>