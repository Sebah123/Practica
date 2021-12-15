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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Gestion Telefono</title>
    <style type="text/css">
        #buscar {
            width: 38em;
        }
    </style>
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
                            <li><a href="../val/UPSDH.php">Ver UPS deshabilitados</a></li>
                            <li><a href="../views/gestionCompleta.php">Atrás</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="container">
        <a href="../views/create_UPS.php" class="waves-effect blue darken-4 btn-large">Crear UPS</a> <br> <br>
        <!-- <a href="../views/UPSAsociado.php" class="waves-effect blue darken-4 btn-small">UPS asociados</a> -->

        <h5>Listado de UPS</h5> <br> <br>
        <div class="row">
            <form action="" method="GET">
                <label>Buscar por Cesfam: </label> <br>
                <input type="text" name="txtBuscar" id="buscar" maxlength="14">
                <input type="submit" name="btnBuscar" value="Buscar" class='waves-effect green darken-4 btn'>
            </form>


            <div class="col 1"></div>
            <div class="col 8">
                <table border="1">
                    <tr>
                        <th>Id</th>
                        <th>Numero de Serie</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Cesfam</th>
                        <th>Box</th>
                        <th>Sector</th>
                        <th>Acciones</th>
                    </tr>
                    <?php
                    if (isset($_GET['btnBuscar'])) {
                        $buscar = $_GET['txtBuscar'];
                        if (empty($buscar)) {
                            echo '<script language="javascript">alert("Por favor, rellene el campo");</script>';
                        }

                        $lista = $data->buscarUPS($buscar);
                        foreach ($lista as $fila) {
                            if ($fila["estado"] == 1) {
                                echo "<tr>";
                                echo "<td>" . $fila["id"] . "</td>";
                                echo "<td>" . $fila["n_de_serie"] . "</td>";
                                echo "<td>" . $fila["marcaUPS"] . "</td>";
                                echo "<td>" . $fila["modeloUPS"] . "</td>";
                                echo "<td>" . $fila["Cesfam"] . "</td>";
                                echo "<td>" . $fila["Box"] . "</td>";
                                echo "<td>" . $fila["Sector"] . "</td>";
                                echo "<td> 
                                        <a href='../val/delete_DO_UPS.php?id=" . $fila["id"] . "' class='waves-effect red accent-4 btn-small'><i class='tiny material-icons'>delete</i></a>
                                        <a href='editUPS.php?id=" . $fila["id"] . "' class='waves-effect blue darken-4 btn-small'><i class='tiny material-icons'>edit</i></a>
                                    </td>";
                                echo "</tr>";
                            }
                        }
                    } else {
                        $lista = $data->getUPS();
                        foreach ($lista as $fila) {
                            if ($fila["estado"] == 1) {
                                echo "<tr>";
                                echo "<td>" . $fila["id"] . "</td>";
                                echo "<td>" . $fila["n_de_serie"] . "</td>";
                                echo "<td>" . $fila["marcaUPS"] . "</td>";
                                echo "<td>" . $fila["modeloUPS"] . "</td>";
                                echo "<td>" . $fila["Cesfam"] . "</td>";
                                echo "<td>" . $fila["Box"] . "</td>";
                                echo "<td>" . $fila["Sector"] . "</td>";
                                echo "<td> 
                                    <a href='../val/delete_DO_UPS.php?id=" . $fila["id"] . "' class='waves-effect red accent-4 btn-small'><i class='tiny material-icons'>delete</i></a>
                                    <a href='editUPS.php?id=" . $fila["id"] . "' class='waves-effect blue darken-4 btn-small'><i class='tiny material-icons'>edit</i></a>
                                </td>";
                                echo "</tr>";
                            }
                        }
                    }
                    ?>
                </table>

            </div>



        </div>
</body>

</html>