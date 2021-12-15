<?php 
require_once '../bd/conexion.php';
require_once '../bd/data.php';

$con = new Conexion();
$data = new Data($con->getConexion());

$m = $_POST['txtCesfam'];

$data->crearCesfam($m);

echo '<script language="javascript">alert("Cesfam Creado");</script>';
header("Refresh:0; url=crearCesfam.php");


?>