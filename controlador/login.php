<?php
    
    session_start();
   
    if (isset($_POST['submit'])) {

        include '../modelo/conexion.php';

        $user = $_POST['user'];
        $password = $_POST['pass'];
	    $_SESSION["user"] = $user;

        $sql = "select * from login where username = '$user' and password = '$password'";  
        $result = mysqli_query($conexion, $sql);  
       // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count){  
            header("Location: ../tablero.php");
        }  
        else{  
            echo  '<script>
                        window.location.href = "../index.php";
                        alert("Error al iniciar sesion. Usuario o contraseña invalida!")
                    </script>';
            
            session_destroy();
            
            
           
        }     
    }