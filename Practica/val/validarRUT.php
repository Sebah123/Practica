<?php
require_once '../bd/conexion.php';
require_once '../bd/data.php';
$con = new Conexion();
$data = new Data($con->getConexion());

$rut = $_POST['txtRut'];

$existe = $data->isRutExiste($rut);

if($existe == true){
    echo '<script language="javascript">alert("Es valido");</script>';
    header("Location:../views/passOlvidada2.php");
}else{
    echo '<script language="javascript">alert("NO es valido");</script>';
}
?>