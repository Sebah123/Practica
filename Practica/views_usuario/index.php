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
    <title>Menú</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        footer {
            background-color: black;
            position: absolute;
            bottom: 0;
            width: 100%
        }
    </style>

</head>


<body background="../archivos/imagen.png">
    <header>
        <div class="row">
            <nav class="grey darken-4">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="../views_usuario/index.php" class="brand-logo">Menú</a>
                        <ul id="nav-mobile " class="right hide-on-med-and-dow">
                            <!--
                            <li><a href="../proyecto/views/create.php">Crear Cliente</a></li>
                            <li><a href="../proyecto/views/read.php">Gestionar Clientes</a></li>
                             <li><a href="../proyecto/dump/expotar.php">Exportar base de datos</a></li>-->
                            <!--<li><a href="../views/create.php">Crear Usuarios</a></li>-->
                            <!-- <li><a href="../views/read.php">Gestionar Usuarios</a></li> -->
                            <li><a href="../views_usuario/gestionCompletaU.php">Gestionar Inventario</a></li>
                            <li><a href="../val/cerrar_sesion.php">Cerrar sesión</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="container">
        <br>
        <p>
            <?php
            $lista = $data->getNombreByRUT($rut);
            foreach ($lista as $nombre) {
                
            echo '<h3 class="center">Bienvenido/a , ' . $nombre['nombre'] . '</h3>';
            }
            ?>
        <h3 class="center">Gestión de Inventario</h3>
        <h5 class="center">CORMUN Rancagua</h5>
        </p>
        <br>
    </div>


    <footer class="page-footer grey darken-4">
        <div class="container">
            <div class="row">
            <div class="col l6 s12">
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Redes Sociales</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="https://2020.cormun.cl/">Pagina Oficial</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Instagram </a></li>
                        <li><a class="grey-text text-lighten-3" href="https://www.facebook.com/corporacionmunicipal.derancagua">Facebook</a></li>
                        <li><a class="grey-text text-lighten-3" href="https://www.youtube.com/user/cormunrancagua">Youtube</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2021 Derechos Reservados
            </div>
        </div>
    </footer>

</body>

</html>