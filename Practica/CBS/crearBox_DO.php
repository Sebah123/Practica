<?php 
require_once '../bd/conexion.php';
require_once '../bd/data.php';

$con = new Conexion();
$data = new Data($con->getConexion());

$ups = $_POST['pruebaTXT'];

$m = $_POST['txtBoxx'];

$data->crearBox($m);
echo '<script language="javascript">alert("Box Creado");</script>';

header("Refresh:0; url=crearBox.php");
?>