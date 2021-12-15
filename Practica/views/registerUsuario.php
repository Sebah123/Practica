<?php
require_once '../bd/conexion.php';
require_once '../bd/data.php';
$con = new Conexion();
$data = new Data($con->getConexion());

$rut = $_POST['txtRut'];

$existe = $data->isRutExiste($rut);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>

<body style="background-color: #34495e ;">
    <div class="container">
        <div class="row centered-form" style="margin-top: 150px;">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registro de Usuario</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="../val/registrarUsuarioFromLogin.php" method="POST" id="formulario">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="txtName" id="txtName" class="form-control input-sm" placeholder="Nombre" maxlength="16">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="txtApellido" id="txtApellido" class="form-control input-sm" placeholder="Apellido" maxlength="16">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" name="txtEmail" id="txtEmail" class="form-control input-sm" placeholder="Email" maxlength="25">
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <?php
                                        if ($existe == false) {
                                            echo '<input type="text" name="txtRut" id="txtRut" value= ' . $rut . ' class="form-control input-sm" placeholder="Rut" readonly>';
                                        } else {
                                            echo '<script language="javascript">alert("RUT ya registrado, ingrese otro");</script>';
                                            header("Refresh:0; url=verificarRUT.php");
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="password" name="txtPass" id="txtPass" class="form-control input-sm" placeholder="Contraseña" maxlength="20">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="txtCargo" id="txtCargo" class="form-control input-sm" placeholder="Cargo" maxlength="14">
                                    </div>
                                </div>
                            </div>




                            <input type="submit" value="Registrarse" class="btn btn-info btn-block"> <br>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="reset" value="Borrar todo" class="btn btn-info btn-block">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <a href="login.php" class="btn btn-info btn-block">Volver</a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formulario").addEventListener('submit', validarFormulario);
    });

    function validarFormulario(evento) {
        evento.preventDefault();
        var nombre = document.getElementById('txtName').value;
        var apellido = document.getElementById('txtApellido').value;
        var email = document.getElementById('txtEmail').value;
        var rut = document.getElementById('txtRut').value;
        var pass = document.getElementById('txtPass').value;
        var cargo = document.getElementById('txtCargo').value;
        if (nombre.length == 0 || apellido.length == 0 || email.length == 0 || rut.length == 0 || pass.length == 0 || cargo.length == 0) {
            alert('Por favor, rellene todos los datos');
            return;
        }
        this.submit();
    }
</script>