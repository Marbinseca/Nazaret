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
    <form class="py-3 col-4 p-3 mb-3 m-auto" style="background-color: #e3f2fd; border-radius: 15px" method="POST" action="controlador/modificar_usuario.php" enctype="multipart/form-data">
    <h4 class="text-center">Modificar Usuario</h4> <hr size="4px" color="black"/>
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">

        <?php
        include "controlador/modificar_usuario.php";

        while ($datos = $sql->fetch_object()) { ?>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombres</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nombres ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellido" value="<?= $datos->apellidos ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No. Identificacion</label>
                <input type="number" class="form-control" name="identificacion" value="<?= $datos->identificacion ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fecha" value="<?= $datos->fecha_nacimiento ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" value="<?= $datos->correo ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha Registro</label>
                <input type="date" class="form-control" name="fecharegistro" value="<?= $datos->fecha_registro ?>">
            </div>

            <div class="mb-3">
                <input type="file" class="form-control" id="inputGroupFile04" name="ruta" value="<?= $datos->ruta ?>"
                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>


        <?php }
        ?>


        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-info" name="btnregistrar" >Modificar</button>
            <button type="submit" class="btn btn-light" name="btncancelar" >Cancelar</button>
        </div>
        
    </form>
    
    </div>
    <footer class="py-3 mb-4">
        <p class="text-center text-muted">© 2024 Copyright</p>
    </footer>

</body>

</html>