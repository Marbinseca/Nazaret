<?php

include "modelo/conexion.php";
include "controlador/login.php";

?>


<html>

<head>
    <title>Nazaret Soft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/pr.png" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/b422f793d5.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <div id="form" class="input">
        <div>
            <img src="./image/zon.png" alt="" width="210" height="50" class="d-inline-block align-text-top">
        </div>
        <hr/>
        <center><h3>Iniciar Sesion</h3></center>
        <form name="form" action="controlador/login.php" onsubmit="return isvalid()" method="POST" class="p-4">

            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                <input type="text" placeholder="Usuario" class="form-control" id="user" name="user">
            </div>

            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                <input type="password" placeholder="Contraseña" class="form-control" id="pass" name="pass">
                
            </div>

            <hr/>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" id="btn" name="submit" value="Login">Ingresar</button>
            </div>
        </form>
    </div>
    <script>
        function isvalid() {
            var user = document.form.user.value;
            var pass = document.form.pass.value;
            if (user.length == "" && pass.length == "") {
                alert(" Los campos usuario y contraseña estan vacios!");
                return false;
            }
            else if (user.length == "") {
                alert(" El campo usuario esta vacio!");
                return false;
            }
            else if (pass.length == "") {
                alert(" El campo contraseña esta vacio!");
                return false;
            }

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <footer class="py-3 mb-4">
        <p class="text-center text-muted">© 2024 Copyright</p>
    </footer>

</body>

</html>