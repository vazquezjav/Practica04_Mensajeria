<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Datos Acutlizados</title>
    <style type="text/css" rel="stylesheet">
        .error{
            color: orange;
        }
    </style>
</head>
<body>
    <?php
        include '../../config/conexionBD.php';
        #echo "<p>ppp</p>";

        $cedula=isset($_POST["cedula"]) ? trim($_POST["cedula"]):null;
        $nombre=isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]),"UTF-8"):null;
        $apellido=isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]),"UTF-8"):null;
        $direccion=isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]),"UTF-8"):null;
        $telefono=isset($_POST["telefono"]) ? trim($_POST["telefono"]):null;
        $fechaNacimiento=isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]):null;
        $codigo=isset($_POST["codigo"]) ? trim($_POST["codigo"]):null;

        date_default_timezone_set("America/Guayaquil");
        $modificacion=date('Y-m-d',time());

        $sql="UPDATE usuario SET usu_nombres='$nombre', usu_apellidos='$apellido', usu_cedula='$cedula', usu_direccion='$direccion',
                usu_fecha_nacimiento='$fechaNacimiento', usu_fecha_modificacion='$modificacion' WHERE usu_codigo='$codigo'";

       $sql_correo="SELECT * FROM usuario WHERE usu_codigo='$codigo'";
       $result=$conn->query($sql_correo);  
       if($result->num_rows>0){
           while($row=$result->fetch_assoc()){
               if($row["usu_eliminado"]=='N'){
               $correo=$row["usu_correo"];
               }
           }
       }

        if($conn->query($sql)===TRUE){
            #echo "<p> Actualizado</p>";
            header("Location: ../vista/micuenta.php?correo=$correo");
        }else{
            if($conn->errno ==1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistemas </p>";
                
            }else{
                #echo"<p class='error' Error: ".mysql_error($conn). "</p>";
            }
        }

        $conn->close();
        #echo "<a href='../vista/micuenta.php?correo=$correo'>Regresar</a> "

    ?>

</body>
</html>