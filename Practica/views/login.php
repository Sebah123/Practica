<?php

require_once '../bd/conexion.php';
require_once '../bd/data.php';
$con = new Conexion();
$data = new Data($con->getConexion());


session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 
    <link rel="stylesheet" type="text/css" href="../bd/estilo.css" media="screen" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>

    <script type="text/javascript">
        function NumText(string) { 
            //solo letras y numeros y los cácteres especiales que se requieran
            var out = '';
            //Se añaden las letras, números y carácteres válidos
            var filtro = '1234567890kK.-'; //Caracteres validos

            for (var i = 0; i < string.length; i++)
                if (filtro.indexOf(string.charAt(i)) != -1)
                    out += string.charAt(i);
            return out;
        }
    </script>


</head>

<body style="background-color: #34495e ;">
    <section class="vh-100 gradient-custom" style="margin-top: -53px;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <form action="../val/validarInicioSesion.php" method="POST" id="formulario">


                                    <h2 class="fw-bold mb-2 text-uppercase">Inicio de Sesión</h2>
                                    <p class="text-white-50 mb-5">Por favor, ingrese su Rut y Contraseña para Ingresar al Sistema</p>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeEmailX">Rut (con puntos y guíon)</label>
                                        <input type="text" id="txtRut" name="txtRut" maxlength="12" class="form-control form-control-lg"  onkeyup="this.value=NumText(this.value)"/>

                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordX">Contraseña</label>
                                        <input type="password" id="txtPass" name="txtPass" maxlength="20" class="form-control form-control-lg" />
                                    </div>

                                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="../views/passOlvidada.php">¿Ha olvidado la contraseña?</a></p>

                                    <input type="submit" class="btn btn-outline-light btn-lg px-5" value="Iniciar sesión">

                            </div>

                            </form>

                            <div>
                                <p class="mb-0">¿No tiene una cuenta? <a href="verificarRut.php" class="text-white-50 fw-bold">Registrarse</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<?php

?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formulario").addEventListener('submit', validarFormulario);
    });

    function validarFormulario(evento) {
        evento.preventDefault();
        var rut = document.getElementById('txtRut').value;
        var pass = document.getElementById('txtPass').value;
        if (rut.length == 0 || pass.length == 0) {
            alert('Rellene todos los campos por favor');
            var rut = document.getElementById('txtRut').value = "";
            var pass = document.getElementById('txtPass').value = "";
            return;
        }
        this.submit();
    }
</script>