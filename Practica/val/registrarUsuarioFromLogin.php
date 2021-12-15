<?php
    require_once '../bd/conexion.php';
    require_once '../bd/data.php';
    
    $con = new Conexion();
    $data = new Data($con->getConexion());

    $n['id'] = $_POST['txtid'];
    $n['nombre'] = $_POST['txtName'];
    $n['apellido'] = $_POST['txtApellido'];
    $n['rut'] = $_POST['txtRut'];
    $n['pass'] = $_POST['txtPass'];
    $n['cargo'] = $_POST['txtCargo'];
    $n['email'] = $_POST['txtEmail'];

    $data->crearUsuarioFromLogin($n);

    header("Location:../views/login.php")
?>