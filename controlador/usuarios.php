<?php

if (isset($_POST['btnregistrar'])) {   
    if(is_uploaded_file($_FILES['ruta']['tmp_name'])) { 
     
include '../modelo/conexion.php';
      
        $ruta = "../upload/"; 
        $nombrefinal= trim ($_FILES['ruta']['name']); 
        $upload= $ruta . $nombrefinal;  



        if(move_uploaded_file($_FILES['ruta']['tmp_name'], $upload)) {  
                   
                   $nombre  = $_POST["nombre"]; 
                   $apellido  = $_POST["apellido"]; 
                   $identificacion = $_POST["identificacion"];
                   $fecha = $_POST["fecha"];
                   $correo = $_POST["correo"];
                   $fecharegistro = $_POST["fecharegistro"];


                   $sql=$conexion ->query(" insert into usuarios(nombres, apellidos, identificacion, fecha_nacimiento, 
                   correo, fecha_registro, ruta) values ('$nombre', '$apellido',  $identificacion, '$fecha', '$correo', '$fecharegistro', '$nombrefinal') ");
                    if($sql==1){
                        //header("Location: ../tablero.php");
                        echo 
                            '<script>
                                alert("Usuario registrado correctamente")
                                window.location.href = "../tablero.php";
                            </script>';
                    }else{
                        echo 
                            '<script>
                                alert("Error al registrar al usuario")
                            </script>';
                    }
        }  
    }else{
        echo 
            '<script>
                    alert("Campos Vacios")
                     window.location.href = "../tablero.php";
            </script>';
    }  
 } 
