<?php
require_once '../bd/conexion.php';
require_once '../bd/data.php';
$con = new Conexion();
$data = new Data($con->getConexion());

$id = $_GET['id'];

$lista = $data->getClienteById($id);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
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
</head>


<body>
    <header>
        <div class="row">
            <nav class="grey darken-4">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="../views/index.php" class="brand-logo">Menú</a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <!--<li><a href="create.php">Crear Cliente</a></li>-->
                            <li><a href="../views/read.php">Volver</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <form method="POST" action="../val/update_DO.php">
            <?php
            foreach ($lista as $fila) {

                echo "<label>Id: </label><br>";
                echo "<input type='text' name='txtid' value='" . $fila["id"] . "' readonly>";

                echo "<label>Nombre: </label><br>";
                echo "<input type='text' name='txtname' maxlength='' value='" . $fila["nombre"] . "'>";

                echo "<label>Apellido: </label><br>";
                echo "<input type='text' name='txtapellido' maxlength='' value='" . $fila["apellido"] . "'>";

                echo "<label>Rut: </label><br>";
                echo "<input type='text' name='txtrut' value='" . $fila["rut"] . "'>";

                echo "<label>Cargo: </label><br>";
                echo "<input type='text' name='txtcargo' maxlength = '25' value='" . $fila["cargo"] . "'>";

                echo "<label>Email: </label><br>";
                echo "<input type='text' name='txtemail' maxlength = '25' value='" . $fila["email"] . "'>";

                echo "<input type='submit' name='' class='waves-effect blue darken-4 btn-small' value='Actualizar'>";
            }
            ?>
        </form>

    </div>

    <footer>
    </footer>

</body>

</html>

