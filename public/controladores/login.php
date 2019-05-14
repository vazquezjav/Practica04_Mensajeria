<?php

    session_start();
    include '../../config/conexionBD.php';

    $usuario=isset($_POST["correo"]) ? trim($_POST["correo"]):null;
    $contrasena=isset($_POST["contraseña"]) ? trim($_POST["contraseña"]):null;

    $sql="SELECT * FROM usuario WHERE usu_correo='$usuario' and usu_password=MD5('$contrasena')";
    $result=$conn->query($sql);
    $row=mysqli_fetch_array($result);
    if($result->num_rows > 0){
        $_SESSION['isLogged']=TRUE;
        $_SESSION['usu_rol']=$row['usu_rol'];
        if($row['usu_rol']=='A'){
            header("Location: ../../admin/vista/usuario/index_admin.php");
        }else{
            header("Location: ../vista/index.php?correo=$usuario");
        }
        
   }else{
       header("Location: ../vista/login.html");
   }
   $conn->close();
?>