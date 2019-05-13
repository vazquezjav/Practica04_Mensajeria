<!DOCTYPE html>
<html>
    <head>
        <title>Mensajes Usuarios</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <table style="width:100%" border=1>
            <tr>
                <th>Fecha</th>
                <th>Remitente</th>
                <th>Destinatario</th>
                <th>Asunto</th>
                <th>Mensaje</th>
                <th>Eliminar</th>
            </tr>
        <?php
             include "../../../config/conexionBD.php";
             $sql ="SELECT * FROM mensaje";
             $result=$conn->query($sql);
             if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    if($row["men_eliminado"]=='N'){
                    $codigo=$row["men_codigo"];
                    echo "<tr>";
                    echo "  <td align=center>" .$row["men_fecha"]."</td>";
                    echo "  <td align=center>" .$row["men_remitente"]."</td>";
                    echo "  <td align=center>" .$row["men_destinatario"]."</td>";
                    echo "  <td align=center>" .$row["men_asunto"]."</td>";
                    echo "  <td align=center>" .$row["men_mensaje"]."</td>";
                    echo "  <td align=center>" ."<a href='../../controladores/eliminar_mensaje.php?codigo=$codigo'>Eliminar</a>". "</td>";
                    echo "</tr>";
                }
            }
            }
        ?>
        </table>
    </body>

</html>
