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
    <title>Telefonos deshabilitados</title>
</head>

<body>
    <header>
        <header>
            <div class="row">
                <nav class="grey darken-4">
                    <div class="container">
                        <a href="../views/index.php" class="brand-logo">Volver al Menú</a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="../views/gestionTelefono.php">Volver</a></li>
                        </ul>
                    </div>
                    <!--<div class="container">
                    <div class="nav-wrapper">
                        <a href="../index.php" class="brand-logo">Volver al Menú</a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="../views/create.php">Crear Cliente</a></li>
                            <li><a href="../views/read.php">Gestionar Clientes</a></li>
                        </ul>
                    </div>
                
                </div> -->
                </nav>
            </div>

        </header>
        <div class="container">
            <div class="row">
                <div class="col 1"></div>
                <div class="col 8">
                    <table border="1">
                        <tr>
                            <th>Id</th>
                            <th>Numero de Serie</th>
                            <th>Tipo de Tecnología</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Cesfam</th>
                            <th>Box</th>
                            <th>Sector</th>
                        </tr>
                        <?php
                        $lista = $data->getEstadobyIdTelefono();
                        foreach ($lista as $fila) {
                            echo "<tr>";
                            echo "<td>" . $fila["id"] . "</td>";
                            echo "<td>" . $fila["n_serie"] . "</td>";
                            echo "<td>" . $fila["tipo_tecno"] . "</td>";
                            echo "<td>" . $fila["marcaTel"] . "</td>";
                            echo "<td>" . $fila["modeloTel"] . "</td>";
                            echo "<td>" . $fila["Cesfam"] . "</td>";
                            echo "<td>" . $fila["Box"] . "</td>";
                            echo "<td>" . $fila["Sector"] . "</td>";
                            echo "<td>
                            <a href='../val/habilitarTelefono.php?id=" . $fila["id"] . "' class='waves-effect red accent-4 btn-small'>Habilitar</a>
                            </td>";
                            echo "</tr>";
                        }

                        ?>
                    </table>

                </div>
                <div class="col 3"></div>
            </div>
        </div>
</body>

</html>