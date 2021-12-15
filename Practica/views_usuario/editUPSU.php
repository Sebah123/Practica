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
    <title>Menú</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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
</head>


<body>
    <header>
        <div class="row">
            <nav class="grey darken-4">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo">Menú</a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <!--<li><a href="create.php">Crear Cliente</a></li>-->
                            <li><a href="gestionUPSU.php">Volver</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <form method="POST" action="update_DO_UPSU.php">
            <?php
            $id = $_GET['id'];

            $lista = $data->getUPSById($id);
            foreach ($lista as $fila) {

                echo "<label>Id: </label><br>";
                echo "<input type='text' name='txtId' value='" . $fila["id"] . "' readonly>";

                echo "<label>Numero de Serie: </label><br>";
                echo "<input type='text' name='txtSerie' value='" . $fila["n_de_serie"] . "'>";
            }
            ?>
            <label>Marca: </label> <br>
            <select name="selMarcaUPS" id="selMarcaUPS" class="browser-default">
                <?php
                $a = $data->getMarcaUPS();
                foreach ($a as $fila) {
                    echo "<option value = '" . $fila['id'] . "'>" . $fila['marcaUPS'] . "</option>";
                }
                ?>
            </select>

            <a href="../MMUPS/createMarcaUPS.php">Agregar otra marca</a> <br> <br>

            <div id="hola"></div>

            <a href="../MMUPS/createModeloUPS.php">Agregar otro modelo</a> <br> <br>


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

            <input type='submit' name='' class='waves-effect blue darken-4 btn-small' value='Actualizar'>;
        </form>

    </div>


    <footer>
    </footer>

</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#selMarcaUPS').val(1);
        recargarLista();

        $('#selMarcaUPS').change(function() {
            recargarLista();
        });
    });
</script>

<script type="text/javascript">
    function recargarLista() {
        $.ajax({
            type: "POST",
            url: "../bd/dataUPS.php",
            data: "id=" + $('#selMarcaUPS').val(),
            success: function(r) {
                $('#hola').html(r);
            }
        });
    }
</script>