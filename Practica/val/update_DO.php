<?php
require_once '../bd/conexion.php';
require_once '../bd/data.php';
$con = new Conexion();
$data = new Data($con->getConexion());

$f['id'] = $_POST['txtid'];
$f['nombre'] = $_POST['txtname']; 
$f['apellido'] = $_POST['txtapellido']; 
$f['rut'] = $_POST['txtrut']; 
$f['cargo'] = $_POST['txtcargo']; 
$f['email'] = $_POST['txtemail'];


$data->actualizarById($f);
header("Location:../views/read.php");
?>