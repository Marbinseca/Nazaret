<?php

if(!empty($_GET["id"])) {
    include "modelo/conexion.php";
    $id = $_GET["id"];
    $sql=$conexion ->query("delete from usuarios where id=$id");
    if ($sql==1) {
        echo 
        '<script>
                 alert("Usuario eliminado correctamente")
        </script>';
    } else {
        echo 
        '<script>
             alert("Error al eliminar Usuario")
        </script>';
    }
    
}