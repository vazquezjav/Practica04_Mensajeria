<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['usu_rol']=='U'){
        header("Location: ../../../public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mensajes Usuarios</title>
        <meta charset="UTF-8">
        <link href="../../../public/estilos/admin_mensajes.css" rel="stylesheet" />
    </head>
    <header>
    <nav>
        <ul>
            <?php
            echo "<li> <a href='mensaje.php'>  Inicio  </a></li>" ;
            echo "<li><a href='index_admin.php'> Usuarios </a></li>";
            ?>
        </ul>
    </nav><br>
    </header>
    <body class="centro">
        <br>
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
             $sql ="SELECT * FROM mensaje ORDER BY men_fecha DESC";
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
