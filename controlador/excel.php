<?php

session_start();
error_reporting(0);
$sessionuser = $_SESSION["user"];
if($sessionuser==NULL || $sessionuser== ""){
    header("Location:../index.php");
    die();
}

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=documento_exportado_" . date('Y:m:d:m:s') . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

?>


<div class="table-responsive col-8 p-1">
    <table class="table table-striped table-hover mt-2 table-bordered" id="tabla" method="GET">
        <thead class="table-info table-bordered align-middle">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Identificacion</th>
                <th scope="col">Fecha_Nacimiento</th>
                <th scope="col">Correo</th>
                <th scope="col">Fecha_Registro</th>
                <th scope="col">Ruta_Archivo</th>
            </tr>

        </thead>

</div>

<tbody>

    <?php

    include "../modelo/conexion.php";
    $sql = $conexion->query("select * from usuarios");
    while ($datos = $sql->fetch_object()) { ?>

        <tr>
            <td><?= $datos->ID ?></td>
            <td><?= $datos->nombres ?></td>
            <td><?= $datos->apellidos ?></td>
            <td><?= $datos->identificacion ?></td>
            <td><?= $datos->fecha_nacimiento?></td>
            <td><?= $datos->correo?></td>
            <td><?= $datos->fecha_registro?></td>
            <td><?= $datos->ruta ?></td>

        </tr>



    <?php }
    ?>


</tbody>

</table>

</div>