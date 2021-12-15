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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Crear Telefono</title>
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
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
                            <li><a href="../views/gestionCompleta.php">Atrás</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <h5 class="left-align">Ingrese un nuevo Telefono</h5> <br>
        </div>
        <form action="../val/create_DO_Telefono.php" method="POST" id="formulario">

            <label>Numero de Serie: </label> <br>
            <input type="text" name="txtSerie" id="txtSerie"> <br>

            <label>Marca: </label> <br>
            <select name="selMarcaTel" id="selMarcaTel" class="browser-default">
                <?php
                $a = $data->getMarcaTelefono();
                foreach ($a as $fila) {
                    echo "<option value = '" . $fila['id'] . "'>" . $fila['marcaTel'] . "</option>";
                }
                ?>
            </select>
            <a href="../MMTel/createMarcaTel.php">Agregar otra marca</a> <br> <br>

            <div id="hola1"></div>

            <a href="../MMTel/createModeloTel.php">Agregar otro modelo</a> <br> <br>

            <label>Tipo de Tecnología: </label> <br>
            <select name="selTipoTec" id="selTipoTec" class="browser-default">
                <option value="IP" selected>IP</option>
                <option value="Analogico">Analogico</option>
            </select>
            <br>

            <label>Cesfam: </label> <br>
            <select name="selCesfam" id="selCesfam" class="browser-default">
                <?php
                $ces = $data->getCesfam();
                foreach ($ces as $fila) {
                    echo "<option value = '" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
                }
                ?>
            </select>
            <a href="../CBS/crearCesfam.php">Agregar otro Cesfam</a> <br> <br>
            <label>Box: </label> <br>
            <select name="selBox" id="selBox" class="browser-default">
                <?php
                $box = $data->getBoxx();
                foreach ($box as $fila) {
                    echo "<option value = '" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
                }
                ?>
            </select>
            <a href="../CBS/crearBox.php">Agregar otro Box</a> <br> <br>
            <label>Sector: </label> <br>
            <select name="selSector" id="selSector" class="browser-default">
                <?php
                $sec = $data->getSector();
                foreach ($sec as $fila) {
                    echo "<option value = '" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
                }
                ?>
            </select>
            <a href="../CBS/crearSector.php">Agregar otro Sector</a> <br> <br>

            <input type="reset" class='waves-effect blue darken-4 btn-small' value="Borrar todo">
            <input type="submit" class='waves-effect blue darken-4 btn-small' value="Agregar Telefono">

        </form>
    </div>

</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#selMarcaTel').val(1);
        recargarLista();

        $('#selMarcaTel').change(function() {
            recargarLista();
        });
    });
</script>

<script type="text/javascript">
    function recargarLista() {
        $.ajax({
            type: "POST",
            url: "../bd/dataTel.php",
            data: "id=" + $('#selMarcaTel').val(),
            success: function(r) {
                $('#hola1').html(r);
            }
        });
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formulario").addEventListener('submit', validarFormulario);
    });

    function validarFormulario(evento) {
        evento.preventDefault();
        var serie = document.getElementById('txtSerie').value;
        if (serie.length == 0) {
            alert('Rellene todos los campos por favor');
            return;
        }
        this.submit();
    }
</script>