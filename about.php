<?php

session_start();
error_reporting(0);
$sessionuser = $_SESSION["user"];
if ($sessionuser == NULL || $sessionuser == "") {
    header("Location: index.php");
    die();
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nazaret Soft</title>
    <link rel="shortcut icon" href="image/pr.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class= "py-4">
    
    </div>

    <div class="mb-3 p-4">
        <dialog open>
            <h3>
                <p>
                    © Nazaret Soft
                </p>
                <center>
                    Version: 1.0 <br />
                    Date: 2024 <br />
                    Autor: Mseca<hr/>
                    Php: 8.2.12 <br />
                    MySQL: libmysql - mysqlnd 8.2.12 <br />
                    Apache/2.4.58 (Win64) OpenSSL/3.1.3 <br />
                </center>
            </h3>
                <div>
                    <center><button type="button" class="btn btn-secondary" onclick="location.href='tablero.php'">Aceptar</button></center>
                </div>
        </dialog>

        
    </div>
</body>
</html>