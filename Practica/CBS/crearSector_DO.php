<?php 
require_once '../bd/conexion.php';
require_once '../bd/data.php';

$con = new Conexion();
$data = new Data($con->getConexion());

$m = $_POST['txtSector'];

$data->crearSector($m);
echo '<script language="javascript">alert("Sector Creado");</script>';
header("Refresh:0; url=crearSector.php");
?>