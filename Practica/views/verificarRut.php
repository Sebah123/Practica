

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restauración de Contraseña</title>
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
    <div class="container">
        <div class="row centered-form" style="margin-top: 180px ;">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Verificación de RUT</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="registerUsuario.php" method="POST" id="formulario">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="txtRut" id="txtRut" class="form-control input-sm" placeholder="Rut" maxlength="12" onkeyup="this.value=NumText(this.value)">
                                    </div>
                                </div>
                                
                            </div>

                            <input type="submit" value="Ingresar el RUT" class="btn btn-info btn-block"> <br>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="reset" value="Borrar todo" class="btn btn-info btn-block">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <a href="login.php" class="btn btn-info btn-block">Volver</a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>




</html>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formulario").addEventListener('submit', validarFormulario);
    });

    function validarFormulario(evento) {
        evento.preventDefault();
        var rut = document.getElementById('txtRut').value;
        if (rut.length == 0) {
            alert('Por favor, rellene los datos');
            return;
        }
        this.submit();
    }
</script>