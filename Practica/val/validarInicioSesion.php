<?php
require_once '../bd/conexion.php';
require_once '../bd/data.php';

session_start();


$nom = $_POST["txtRut"];
$pass = $_POST["txtPass"];

$_SESSION['rut'] = $nom;
$_SESSION['pass'] = $pass;


if ($nom != "" && $pass != "") {

    $con = new Conexion();
    $data = new Data($con->getConexion());
    $existe = $data->isUsuarioValido($nom, $pass);
    $valido = $data->isUsuarioDesHabilitado($nom);
    $isAdmin = $data->isUsuarioAdmin($nom);
    if ($existe == true) {
        if ($valido == true) {
            if ($isAdmin == true) {
                header('location: ../views/index.php');
            } else {
                header('location: ../views_usuario/index.php');
            }
        } else {
            echo '<script language="javascript">alert("Usuario deshabilitado. Por favor, enviar ticket para habilitar su cuenta");</script>';
            header("Refresh:0; url=../views/login.php");
        }
    }
    if ($existe == false) {
        echo '<script language="javascript">alert("Datos Incorrectos, por favor, vuelva a intentarlo");</script>';
        header("Refresh:0; url=../views/login.php");
    }
} else {
    echo "PORFAVOR LLENE LOS DATOS";
}
