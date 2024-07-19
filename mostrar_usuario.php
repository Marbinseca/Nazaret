<?php

include "modelo/conexion.php";
session_start();
error_reporting(0);
$sessionuser = $_SESSION["user"];
if($sessionuser==NULL || $sessionuser== ""){
    header("Location: index.php");
    die();
}


$id = $_GET["id"];

$sql = $conexion->query(" select * from usuarios where id=$id");

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
    <script src="https://kit.fontawesome.com/b422f793d5.js" crossorigin="anonymous"></script>

</head>

<body>
    
    <div class="py-4">
    <form class="col-4 p-3 mb-3 m-auto" style="background-color: #e3f2fd; border-radius: 15px" method="POST">
    <h4 class=" text-center">Mostrar Usuario</h4> <hr size="4px" color="black"/>
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">

        <?php
        include "controlador/mostrar_usuario.php";

        while ($datos = $sql->fetch_object()) { ?>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombres</label>
                <input type="text" readonly class="form-control" name="nombre" value="<?= $datos->nombres ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                <input type="text" readonly class="form-control" name="apellido" value="<?= $datos->apellidos ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No. Identificacion</label>
                <input type="number" readonly class="form-control" name="identificacion"
                    value="<?= $datos->identificacion ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha Nacimiento</label>
                <input type="date" readonly class="form-control" name="fecha" value="<?= $datos->fecha_nacimiento ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="email" readonly class="form-control" name="correo" value="<?= $datos->correo ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha Registro</label>
                <input type="date" readonly class="form-control" name="fecharegistro" value="<?= $datos->fecha_registro ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ruta_Archivo</label>
                <input type="text" readonly class="form-control" name="ruta" value="<?= $datos->ruta ?>">
            </div>

        <?php }
        ?>


        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-info" name="btnmostrar" value="ok"  >Aceptar</button>
        </div>
    </form>
    </div>
    <footer class="py-3 mb-4">
        <p class="text-center text-muted">© 2024 Copyright</p>
    </footer>

</body>

</html>