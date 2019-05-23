<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body >
   <?php
       session_start();
        include '../../config/conexionBD.php';
        $remitente = $_GET['cedula'];
        $destinatario=$_SESSION['usu_correo'];
       # echo "<p>".$cedula ."</p>";
        if($remitente == ""){
            echo "<p></p>";
        }else{
            $sql="SELECT * FROM mensaje WHERE men_remitente LIKE '%$remitente%' and men_destinatario = '$destinatario'";
            $result=$conn->query($sql);
            echo "<h2> Resultados Busqueda</h2>";
            echo "<table border='1'";
            if($result->num_rows>0){
                echo "<tr>";
                    echo "<th>Fecha</th>";
                    echo "<th>Remitente</th>";
                    echo "<th> Asunto</th>";
                    echo "<th>Mensaje</th>";
                    echo "</tr>";
                echo "<tr>";
                while($row=$result->fetch_assoc()){
                    if($row["men_eliminado"]=='N'){
                
                    echo "  <td align=center>" .$row["men_fecha"]."</td>";
                    echo "  <td align=center>" .$row["men_remitente"]."</td>";
                    echo "  <td align=center>" .$row["men_asunto"]."</td>";
                    echo "  <td align=center>" .$row["men_mensaje"]."</td>";
                    echo "</tr>";
                    }
                }
            }else{
                echo "<p> No ha recibido correos de:  $remitente </p>";
            }

        }
        echo "</table>";
        
   ?>

</body>
</html>