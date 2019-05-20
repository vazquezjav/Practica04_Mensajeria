<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
        .error{
            color: orange;
        }
    </style>
</head>
<body>
    <?php
        include '../../config/conexionBD.php';

        $cedula=isset($_POST["cedula"]) ? trim($_POST["cedula"]):null;
        $nombres=isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]),"UTF-8"):null;
        $apellidos=isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]),"UTF-8"):null;
        $direccion=isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]),"UTF-8"):null;
        $telefono=isset($_POST["telefono"]) ? trim($_POST["telefono"]):null;
        $fechaNacimiento=isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]):null;
        $correo=isset($_POST["correo"]) ? trim($_POST["correo"]):null;
        $contraseña=isset($_POST["contrasena"]) ? trim($_POST["contrasena"]):null;

        $nombre_img=isset($_FILES["imagen"]["name"]) ?trim($_FILES["imagen"]["name"]):null;
        #echo "<h1> $nombre_img </h1>";
        #$contenido_img= addslashes(file_get_contents($nombre_img));
        #$contenido_img=isset($_FILES["imagen"]["tmp_name"])? trim($_FILES["imagen"]["tmp_name"]):null;

        $imagenES=$conn->real_escape_string(file_get_contents($_FILES["imagen"]["tmp_name"]));

        date_default_timezone_set("America/Guayaquil");
        $modificacion=date('Y-m-d',time());
        
        

        $sql="INSERT INTO usuario VALUES(0,'$cedula','$nombres','$apellidos','$direccion','$telefono','$correo',MD5('$contraseña'),'$fechaNacimiento','N',null,null,'U')";
        
        


        if($conn->query($sql)===TRUE ){
            $sql_usuario="SELECT * FROM usuario WHERE usu_correo='$correo'";
            $result=$conn->query($sql_usuario);
            $row=mysqli_fetch_array($result);
            $cod_usu=$row["usu_codigo"];
    
            $sql_img="INSERT INTO imagen VALUES(0,'$nombre_img','$imagenES','$modificacion','$cod_usu')";
            if($conn->query($sql_img) === TRUE){
                #echo "<p> Se imagen </p>";

                header("Location: ../vista/login.html");
            }else{
                #echo "<p> No imagen </p>";
            }

        }else{
            if($conn->errno ==1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistemas </p>";
                
            }else{
                echo"<p class='error' Error: ".mysql_error($conn). "</p>";
            }
        }
        
        #$img_codigo=$conn->insert_id;
        #echo "<img src='ver.php?codigo=$img_codigo' style='position:absolute; top=0; left:0;' alt=''>";
        $conn->close();
       # echo "<a href='../vista/crear_usuario.html'>Regresar</a> "
        

    ?>

</body>
</html>
