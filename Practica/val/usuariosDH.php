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
    <title>Usuarios deshabilitados</title>
</head>

<body>
    <header>
        <header>
            <div class="row">
                <nav class="grey darken-4">
                    <div class="container">
                        <a href="../views/index.php" class="brand-logo">Volver al Menú</a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="../views/read.php">Volver</a></li>
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
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Rut</th>
                            <th>Cargo</th>
                            <th>Email</th>
                        </tr>
                        <?php
                        $lista = $data->getEstadobyId();

                        foreach ($lista as $fila) {
                                echo "<tr>";
                                echo "<td>" . $fila["id"] . "</td>";
                                echo "<td>" . $fila["nombre"] . "</td>";
                                echo "<td>" . $fila["apellido"] . "</td>";
                                echo "<td>" . $fila["rut"] . "</td>";
                                echo "<td>" . $fila["cargo"] . "</td>";
                                echo "<td>" . $fila["email"] . "</td>";
                                echo "<td>
                            <a href='../val/habilitarUsuario.php?id=" . $fila["id"] . "' class='waves-effect red accent-4 btn-small'>Habilitar</a>
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