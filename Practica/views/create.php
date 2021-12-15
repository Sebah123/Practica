<?php
require_once '../bd/conexion.php';
require_once '../bd/data.php';
$con = new Conexion();
$data = new Data($con->getConexion());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        #number {
            width: 3em;
        }

        #hi {
            width: 30em;
        }
    </style>

    <script>
        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }

            var input = document.getElementById('number');
            input.addEventListener('input', function() {
                if (this.value.length > 2)
                    this.value = this.value.slice(0, 2);
            })
        }
    </script>
    <title>Crear</title>
</head>

<body>
    <header>
        <div class="row">
            <nav class="grey darken-4">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="../views/index.php" class="brand-logo">Menú</a>
                        <ul id="nav-mobile " class="right hide-on-med-and-dow">
                            <!--
                            <li><a href="../proyecto/views/create.php">Crear Cliente</a></li>
                            <li><a href="../proyecto/views/read.php">Gestionar Clientes</a></li>
                             <li><a href="../proyecto/dump/expotar.php">Exportar base de datos</a></li>-->
                            <li><a href="../views/read.php">Volver</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div>
                <h5 class="left-align">Ingrese un usuario nuevo</h5> <br>
            </div>
            <form action="../val/create_DO.php" method="POST" id="formulario">

                <label>Nombre: </label> <br>
                <input type="text" name="txtName" id="txtName"><br>

                <label>Apellido: </label> <br>
                <input type="text" name="txtApellido" id="txtApellido"><br>

                <label>Rut (con puntos y guión): </label> <br>
                <input type="text" name="txtRut" id="txtRut" maxlength="19"><br>

                <label>Cargo: </label> <br>
                <input type="text" name="txtCargo" maxlength="25" id="txtCargo"><br>

                <label>Email: </label> <br>
                <input type="text" name="txtEmail" maxlength="25" id="txtEmail"><br>

                <input type="reset" name="" id="" class='waves-effect blue darken-4 btn-small' value="Borrar todo">
                <input type="submit" name="" id="" class='waves-effect blue darken-4 btn-small' value="Agregar Usuario">

            </form>
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
        var rut = document.getElementById('txtRut').value;
        var cargo = document.getElementById('txtCargo').value;
        var email = document.getElementById('txtEmail').value;
        if (nombre.length == 0 || apellido.length == 0 || rut.length == 0 || cargo.length == 0 || email.length == 0) {
            alert('Rellene todos los campos por favor');
            return;
        }
        this.submit();
    }
</script>