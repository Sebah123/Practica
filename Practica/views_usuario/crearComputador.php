<?php
require_once '../bd/conexion.php';
require_once '../bd/data.php';
$con = new Conexion();
$data = new Data($con->getConexion());

session_start();

$rut = $_SESSION['rut'];



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Crear computador</title>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script>
        function verificar1() {
            tipo = document.getElementById('cbox1').checked;
            if (tipo) {
                document.getElementById('cbox2').disabled = true;
                document.getElementById('cbox3').disabled = true;
            } else {
                document.getElementById('cbox2').disabled = false;
                document.getElementById('cbox3').disabled = false;
            }
        }

        function verificar2() {
            tipo = document.getElementById('cbox2').checked;
            if (tipo) {
                document.getElementById('cbox1').disabled = true;
                document.getElementById('cbox3').disabled = true;
            } else {
                document.getElementById('cbox1').disabled = false;
                document.getElementById('cbox3').disabled = false;
            }
        }

        function verificar3() {
            tipo = document.getElementById('cbox3').checked;
            if (tipo) {
                document.getElementById('cbox1').disabled = true;
                document.getElementById('cbox2').disabled = true;
            } else {
                document.getElementById('cbox1').disabled = false;
                document.getElementById('cbox2').disabled = false;
            }
        }

        function verificar4() {
            tipo = document.getElementById('cboxNuevo').checked;
            if (tipo) {
                document.getElementById('cboxUsado').disabled = true;
                document.getElementById('cboxReacondi').disabled = true;
            } else {
                document.getElementById('cboxUsado').disabled = false;
                document.getElementById('cboxReacondi').disabled = false;
            }
        }

        function verificar5() {
            tipo = document.getElementById('cboxUsado').checked;
            if (tipo) {
                document.getElementById('cboxNuevo').disabled = true;
                document.getElementById('cboxReacondi').disabled = true;
            } else {
                document.getElementById('cboxNuevo').disabled = false;
                document.getElementById('cboxReacondi').disabled = false;
            }
        }

        function verificar6() {
            tipo = document.getElementById('cboxReacondi').checked;
            if (tipo) {
                document.getElementById('cboxUsado').disabled = true;
                document.getElementById('cboxNuevo').disabled = true;
            } else {
                document.getElementById('cboxUsado').disabled = false;
                document.getElementById('cboxNuevo').disabled = false;
            }
        }

        function verificar7() {
            tipo = document.getElementById('cboxidmarca').checked;
            if (tipo) {
                console.log("ID = ");
            }
        }


        function obtenerFecha(e) {

            var fecha = moment(e.value);
            console.log("Fecha original:" + e.value);
            console.log("Fecha formateada es: " + fecha.format("YYYY/MM/DD"));
        }

        function limpiarTodo() {
            tipo = document.getElementById('hola');
            if (tipo) {
                document.getElementById('cbox2').disabled = false;
                document.getElementById('cbox1').disabled = false;
                document.getElementById('cbox3').disabled = false;

                document.getElementById('cboxUsado').disabled = false;
                document.getElementById('cboxNuevo').disabled = false;
                document.getElementById('cboxReacondi').disabled = false;
            }
        }

        function isLicencia() {

            // Accedemos al botón
            var l = document.getElementById('txtLicencia');

            // evento para el input radio del "si"
            txt = document.getElementById('cboxLic').checked;

            if (txt) {
                l.disabled = false;
            } else {
                l.disabled = true;
            }
        }

        function hola() {
            var c = document.getElementById('selMarca');
            if (c) {
                console.log(c)
            }
        }
        $(document).ready(function() {
            var id = $('#selEquipo').val(); //#addLocationIdReq es el identificador
            // de tu elemento
            console.log(id);
        });
        $(document).ready(function() {
            var id = $('#selEstado').val(); //#addLocationIdReq es el identificador
            // de tu elemento
            console.log(id);
        });
        $(document).ready(function() {
            var id = $('#selMarca').val(); //#addLocationIdReq es el identificador
            // de tu elemento
            console.log(id);
        });

        function holaa() {
            var i = document.getElementsByTagName("option");

        }
    </script>
</head>

<body>
    <header>
        <div class="row">
            <nav class="grey darken-4">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo">Volver al Menú</a>
                        <ul id="nav-mobile " class="right hide-on-med-and-dow">
                            <!--
                            <li><a href="../proyecto/views/create.php">Crear Cliente</a></li>
                            <li><a href="../proyecto/views/read.php">Gestionar Clientes</a></li>
                             <li><a href="../proyecto/dump/expotar.php">Exportar base de datos</a></li>-->
                            <li><a href="gestionComputadorU.php">Atrás</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <h5 class="left-align">Ingrese un nuevo computador</h5> <br>
        </div>
        <form action="create_DO_PCU.php" method="POST" id="formulario">
            <label>Tipo de Equipo: </label>
            <select name="selEquipo" id="selEquipo" class="browser-default">

                <option value="PC">PC</option>
                <option value="Notebook">Notebook</option>
                <option value="All in One">All in One</option>

            </select>

            <label>Centro de Costo: </label> <br>
            <input type="text" name="txtCentro" id="txtCentro"> <br>

            <label>Numero de Serie: </label> <br>
            <input type="text" name="txtNumSerie" id="txtNumSerie"> <br>

            <p>
                <label>
                    <input type="checkbox" id="cboxLic" value="1" onclick="isLicencia()" />
                    <span>¿Tiene Licencia?</span>
                </label>
            </p>

            <label>Licencia: </label>
            <input type="text" name="txtLicencia" id="txtLicencia" disabled="disabled"> <br>

            <label>Estado: </label>
            <select name="selEstado" id="selEstado" class="browser-default">

                <option value="Nuevo">Nuevo</option>
                <option value="Usado">Usado</option>
                <option value="Reacondicionado">Reacondicionado</option>

            </select>

            <label>Responsable: </label> <br>
            <?php
            $hola = $data->getNombreByRUT($rut);
            foreach ($hola as $nombre) {
                echo '<input type="text" name="txtResponsable" value="' . $nombre['nombre'] . '" readonly>';
            }
            ?>


            <label>Fecha de Ingreso: </label> <br>
            <input type="date" name="txtDate" id="" onchange="obtenerFecha(this)">


            <label>Marca: </label> <br>


            <select name="selMarca" id="selMarca" class="browser-default">


                <?php
                $lista = $data->getMarca();
                foreach ($lista as $fila) {
                    echo "<option  value = '" . $fila['id'] . "'>" . $fila['nombre_marca'] . "</option>";
                }
                ?>
            </select>

            <a href="../MMPC/createMarca.php">Agregar otra marca</a>

            <br>
            <br>
            <div id="select2lista"></div>
            <a href="../MMPC/createModelo.php">Agregar otro modelo</a> <br> <br>

            
            <label>Cesfam: </label> <br>
            <select name="selCesfam" id="selCesfam" class="browser-default">

                <?php
                $a = $data->getCesfam();
                foreach ($a as $fila) {
                    echo "<option value = '" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
                }
                ?>
            </select>
            <a href="../CBS/crearCesfam.php">Agregar otro Cesfam</a> <br> <br>

            <label>Box: </label> <br>
            <select name="selBoxx" id="selBoxx" class="browser-default">

                <?php
                $b = $data->getBoxx();
                foreach ($b as $fila) {
                    echo "<option value = '" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
                }
                ?>
            </select>
            <a href="../CBS/crearBox.php">Agregar otro Box</a>  <br> <br>

            <label>Sector: </label> <br>
            <select name="selSector" id="selSector" class="browser-default">

                <?php
                $c = $data->getSector();
                foreach ($c as $fila) {
                    echo "<option value = '" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
                }
                ?>
            </select> 
            <a href="../CBS/crearSector.php">Agregar otro Sector</a> <br> <br>

            <input type="reset" name="" id="hola" class='waves-effect blue darken-4 btn-small' value="Borrar todo" onclick="limpiarTodo()">
            <input type="submit" name="" id="" class='waves-effect blue darken-4 btn-small' value="Agregar Equipo">

        </form>

</body>


</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formulario").addEventListener('submit', validarFormulario);
    });

    function validarFormulario(evento) {
        evento.preventDefault();
        var centro = document.getElementById('txtCentro').value;
        var serie = document.getElementById('txtNumSerie').value;
        if (centro.length == 0 || serie.length == 0) {
            alert('Rellene todos los campos por favor');
            return;
        }
        this.submit();
    }
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#selMarca').val(1);
        recargarLista();

        $('#selMarca').change(function() {
            recargarLista();
        });
    });
</script>

<script type="text/javascript">
    function recargarLista() {
        $.ajax({
            type: "POST",
            url: "../bd/dataprueba.php",
            data: "id=" + $('#selMarca').val(),
            success: function(r) {
                $('#select2lista').html(r);
            }
        });
    }
</script>