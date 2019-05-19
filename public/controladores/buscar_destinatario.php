<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body >
   <?php
       session_start();
        include '../../config/conexionBD.php';

        $destinatario = $_GET['cedula'];
        $remitente=$_SESSION['usu_correo'];
       # echo "<p>".$cedula ."</p>";
        if($destinatario == ""){
            echo "<p></p>";
        }else{
            $sql="SELECT * FROM mensaje WHERE men_destinatario LIKE '%$destinatario%' and men_remitente = '$remitente'";
            $result=$conn->query($sql);
            echo "<h1> Resultados Busqueda</h1>";
            echo "<table border='1'";
            if($result->num_rows>0){
                echo "<tr>";
                    echo "<th>Fecha</th>";
                    echo "<th>Destinatario</th>";
                    echo "<th> Asunto</th>";
                    echo "<th>Mensaje</th>";
                    echo "</tr>";
                echo "<tr>";
                while($row=$result->fetch_assoc()){
                    if($row["men_eliminado"]=='N'){
                
                    echo "  <td align=center>" .$row["men_fecha"]."</td>";
                    echo "  <td align=center>" .$row["men_destinatario"]."</td>";
                    echo "  <td align=center>" .$row["men_asunto"]."</td>";
                    echo "  <td align=center>" .$row["men_mensaje"]."</td>";
                    echo "</tr>";
                    }
                }
            }else{
                echo "<p> No ha enviado correos a la direccion:  $destinatario </p>";
            }

        }
        echo "</table>";
        
   ?>

</body>
</html>