<?php
if (isset($_POST['submit'])) {
    $nom = $_POST["nombre"];

    echo "HOLA ".$nom ;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <label>Nombre: </label> <br>
    <input type="text" name="nombre">
    <input type="submit" name="submit">



    </form>
</body>

</html>