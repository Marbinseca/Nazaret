<?php

    include "modelo/conexion.php";
    include "controlador/usuarios.php";
    include "controlador/eliminar_usuario.php";


    session_start();
    error_reporting(0);
    $sessionuser = $_SESSION["user"];
    if ($sessionuser == NULL || $sessionuser == "") {
        header("Location: index.php");
        die();
    }

    
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Nazaret Soft</title>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="shortcut icon" href="image/pr.png" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" />
    <script src="https://kit.fontawesome.com/b422f793d5.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="./image/zon.png" alt="" width="120" height="30" class="d-inline-block align-text-top">

            <h4>Bienvenido: <?php echo $sessionuser ?></h4>

            <h5 type="date" id="fecha">
                <script>
                    let fecha = document.querySelector("#fecha");
                    let meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                    let diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                    let f = new Date();
                    document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                    
                </script>
            </h5>
            

            <h5>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa-solid fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        <li><a class="dropdown-item" href="controlador/excel.php">Descargar Excel</a></li>
                        <li><a class="dropdown-item" href="https://docs.google.com/spreadsheets/create?hl=es"
                                target="_blank">Abrir Google Spreadsheet</a></li>
                        
                        <li><a class="dropdown-item" href="about.php">Acerca de</a></li>
                        
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a  href="controlador/cerrar.php" class="dropdown-item">Salir</a></li>
                    </ul>
                </div>
            </h5>
        </div>
    </nav>


    <div class="row p-2 mx-0">
        <form class="col-4 p-3" style="background-color: #e3f2fd; border-radius: 5px" method="POST" action="controlador/usuarios.php" enctype="multipart/form-data">
            <h4 class=" text-center">Ingresar Usuario</h4>
            <hr size="4px" color="black" />

            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombres</label>
                <input type="text" class="form-control" name="nombre">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellido">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No. Identificacion</label>
                <input type="number" class="form-control" name="identificacion">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="fecha">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha Registro</label>
                <input type="date" class="form-control" name="fecharegistro">
            </div>

            <div class="mb-3">
                <input type="file" class="form-control" id="inputGroupFile04" name="ruta"
                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-primary btn-lg" name="btnregistrar" value="subir_archivo">Registrar</button>
            </div>
        </form>


        <div class="table-responsive col-8 p-1" >
            <table class="table table-hover" id="tabla" method="GET">
                <thead class="table-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Identificacion</th>
                        <th scope="col">Ruta_Archivo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

        </div>

        <tbody>

            <?php

            $sql = $conexion->query("select * from usuarios");
            while ($datos = $sql->fetch_object()) { ?>

                <tr>
                    <td><?= $datos->ID ?></td>
                    <td><?= $datos->nombres ?></td>
                    <td><?= $datos->apellidos ?></td>
                    <td><?= $datos->identificacion ?></td>
                    <td><?= $datos->ruta ?></td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="mostrar_usuario.php?id=<?= $datos->ID ?>" class="btn btn-small btn-info">
                                <i class="fa-solid fa-eye"></i></i></a>
                            <a href="modificar_usuario.php?id=<?= $datos->ID ?>" class="btn btn-small btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i></a>
                            <a onclick="return eliminar()" href="tablero.php?id=<?= $datos->ID ?>"
                                class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </td>
                </tr>



            <?php }
            ?>


        </tbody>

        </table>

    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src=" https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script>
        $("#tabla").DataTable({
            pageLength: 10,
            pagingType: 'simple_numbers',
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",

            },
        });
    </script>

    <script>
            function eliminar() {
            var respuesta = confirm("¿Estas seguro de eliminar el usuario? ¡No podras revertir esta acción!")
            return respuesta
            }
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


    <footer class="py-3 mb-4">
        <hr />
        <p class="text-center text-muted">© 2024 Copyright</p>
    </footer>

</body>

</html>