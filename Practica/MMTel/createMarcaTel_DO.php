<?php 
require_once '../bd/conexion.php';
require_once '../bd/data.php';

$con = new Conexion();
$data = new Data($con->getConexion());

$m = $_POST['txtMarca'];

$data->crearMarcaTel($m);

header("Location:../views/create_telefono.php")
?>