<?php
 
if (isset($_POST['btnregistrar'])) {   
    if(is_uploaded_file($_FILES['ruta']['tmp_name'])) { 
     
    include '../modelo/conexion.php';
      
        $ruta = "../upload/"; 
        $nombrefinal= trim ($_FILES['ruta']['name']); 
        $upload= $ruta . $nombrefinal;  



        if(move_uploaded_file($_FILES['ruta']['tmp_name'], $upload)) {  

                   $id = $_POST["id"];
                   $nombre  = $_POST["nombre"]; 
                   $apellido  = $_POST["apellido"]; 
                   $identificacion = $_POST["identificacion"];
                   $fecha = $_POST["fecha"];
                   $correo = $_POST["correo"];
                   $fecharegistro = $_POST["fecharegistro"];


                   $sql=$conexion ->query(" update usuarios set nombres='$nombre', apellidos='$apellido', identificacion=$identificacion,
                    fecha_nacimiento='$fecha', correo='$correo', fecha_registro='$fecharegistro', ruta='$nombrefinal' where id=$id ");

                    if($sql==1){
                        //header("Location: ../tablero.php");
                        echo 
                            '<script>
                                alert("Usuario modificado correctamente")
                                window.location.href = "../tablero.php";
                            </script>';
                    }else{
                        echo 
                            '<script>
                                alert("Error al modificar el usuario")
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

if(isset($_POST['btncancelar'])){
    header('Location:../tablero.php');

}


