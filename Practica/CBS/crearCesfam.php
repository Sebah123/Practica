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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <title>Crear Cesfam</title>
</head>

<body>
    <header>
        <div class="row">
            <nav class="grey darken-4">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="../views/index.php" class="brand-logo">Volver al Menú</a>
                        <ul id="nav-mobile " class="right hide-on-med-and-dow">
                            <!--
                            <li><a href="../proyecto/views/create.php">Crear Cliente</a></li>
                            <li><a href="../proyecto/views/read.php">Gestionar Clientes</a></li>
                             <li><a href="../proyecto/dump/expotar.php">Exportar base de datos</a></li>-->
                            <li><a href="javascript:history.go(-2)">Atrás</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <h5 class="left-align">Crear Box</h5>
        </div>
        <form action="../CBS/crearCesfam_DO.php" method="POST" id="formulario">

            <label>Nombre Cesfam: </label> <br>
            <input type="text" name="txtCesfam" id="txtCesfam" maxlength="14"> <br> 

            <input type="reset" class='waves-effect blue darken-4 btn-small' value="Borrar">
            <input type="submit"  class='waves-effect blue darken-4 btn-small' value="Crear Cesfam"> 

        </form>
    </div>
</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formulario").addEventListener('submit', validarFormulario);
    });

    function validarFormulario(evento) {
        evento.preventDefault();
        var cesfam = document.getElementById('txtCesfam').value;
        if (cesfam.length == 0) {
            alert('Rellene todos los campos por favor');
            return;
        }
        this.submit();
    }
</script>