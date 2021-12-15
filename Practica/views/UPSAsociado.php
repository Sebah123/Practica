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
    <title>UPS Asociados</title>
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
                            <!-- <li><a href="../val/computadorDH.php">Ver Computadores deshabilitados</a></li> -->
                            <li><a href="../views/gestionUPS.php">Atrás</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- div class="container">
        <a href="../views/create_computador.php" class="waves-effect blue darken-4 btn-large">Crear Computador</a> <br> <br>
        <a href="../views/computadorAsociado.php" class="waves-effect blue darken-4 btn-small">Computadores asociados</a> 
 -->

    <div class="container">
        <h5>Listado de UPS asociados</h5> <br> <br>
        <div class="row">
            <div class="col 1"></div>
            <div class="col 10">
                <table border="1">
                    <tr>
                        <th>Id</th>
                        <th>Numero de Serie</th>
                        <th>Modelo</th>
                        <th>Cesfam</th>
                        <th>Box</th>
                        <th>Sector</th>

                    </tr>
                    <?php
                    $lista = $data->getUPSAsociado();
                    foreach ($lista as $fila) {
                        echo "<tr>";
                        echo "<td>" . $fila["id"] . "</td>";
                        echo "<td>" . $fila["n_de_serie"] . "</td>";
                        echo "<td>" . $fila["modeloUPS"] . "</td>";
                        echo "<td>" . $fila["Cesfam"] . "</td>";
                        echo "<td>" . $fila["Box"] . "</td>";
                        echo "<td>" . $fila["Sector"] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>

</body>

</html>