function obtener() {
    let nom = document.getElementById("rut").value;
    let pass = document.getElementById("password").value;
    console.log(nom + " ---- " + pass);
    $.post("../val/validarInicioSesion.php", { rut: nom, pass: password },
        function(data) {
            console.log(data);
            if (data == "true") {
                window.location = "../views/index.php";
            }
            if (data == "false") {
                $("#error").html("ERROR EN SUS CREDENCIALES BB");
            }

        });
}