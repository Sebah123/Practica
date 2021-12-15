<?php 
require_once '../bd/conexion.php';
require_once '../bd/data.php';

$con = new Conexion();
$data = new Data($con->getConexion());

$m['modelo'] = $_POST['txtModelo'];
$m['marca'] = $_POST['selMarca'];

$data->crearModeloPC($m);

header("Location:../views/create_computador.php")
?>