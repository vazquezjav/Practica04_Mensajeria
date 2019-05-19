<!DOCTYPE html>
<html>
    <head>
        <title>Nuevo Mensaje</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        include '../../config/conexionBD.php';

        $remitente=$_GET["remitente"];
         echo "<h1> $remitente </h1>";

         $destinatario=isset($_POST["destinatario"]) ? trim($_POST["destinatario"]):null;
         $asunto=isset($_POST["asunto"]) ? trim($_POST["asunto"]):null;
         $mensaje=isset($_POST["mensaje"]) ? trim($_POST["mensaje"]):null;

         date_default_timezone_set("America/Guayaquil");
         $fecha=date('Y-m-d H:i:s',time());
 
         $sql="INSERT INTO mensaje VALUES(0,'$remitente','$destinatario','$asunto','$mensaje','$fecha','N') ";

         if($conn->query($sql)===TRUE){
             header("Location: ../vista/index.php?correo=$remitente");
            #echo "<p> Se ha enviado correctamente el mensaje  </p>";
        }
        $conn->close();
        #echo "<a href='../vista/index.php?correo=$remitente'>Regresar</a> "

        ?>
    </body>

</html>

    
