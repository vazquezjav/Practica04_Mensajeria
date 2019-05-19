<?php

   # session_start();
    include '../../config/conexionBD.php';
    $codigo=isset($_POST["codigo"]) ? trim($_POST["codigo"]):null;
    $contrasena=isset($_POST["contraseña"]) ? trim($_POST["contraseña"]):null;
    $contrasena_nueva=isset($_POST["nueva_contraseña"]) ? trim($_POST["nueva_contraseña"]):null;
    $correo=isset($_POST["correo"]) ? trim($_POST["correo"]):null;
    echo "<p> $codigo </p>";
    $sql="SELECT * FROM usuario WHERE usu_codigo='$codigo' AND usu_password=MD5('$contrasena')";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        echo "<p> Contrasena CambiadA </p>";
        date_default_timezone_set("America/Guayaquil");
        $modificacion=date('Y-m-d',time());
        $sqlCambiar="UPDATE usuario SET usu_password=MD5('$contrasena_nueva'), usu_fecha_modificacion='$modificacion' WHERE usu_codigo='$codigo'";
       $conn->query($sqlCambiar) ;
       #echo "<a href='../vista/micuenta.php?correo=$correo'> Regresar </a>";
       header("Location: ../vista/micuenta.php?correo=$correo");
    }else{
        header("Location: ../vista/contrasena.php?correo=$correo&codigo=$codigo");
       # header("Location: ../vista/contrasena.php?codigo=$codigo");
   }
   $conn->close();
?>