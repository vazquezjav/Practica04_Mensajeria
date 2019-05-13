<!DOCTYPE html>
<html>

<head>
    <title>Principal</title>
    <meta charset="UTF-8"> 
    <?php
        include "../../config/conexionBD.php";
        $sql ="SELECT * FROM usuario";
        $result=$conn->query($sql);
        $remitente=$_GET['correo'];
        echo "<h1>$remitente</h1>";
     ?>
</head>
<header>
    <h1>Mensajes Recibidos</h1>
    <nav>
        <ul>
            <?php
            $correo=$_GET['correo'];
            echo " <a href='index.php?correo=$correo'>  Inicio  </a>" ;
            echo "<a href='nuevo_mensaje.php?correo=$correo'>  Nuevo Mensaje</a>";
            echo " <a href='politica.html'> Mensajes Enviados  </a>";
            echo "<a href='micuenta.php?correo=$correo'>Mi Cuenta  </a>";
            ?>
        </ul>
    </nav>
</header>

<body>
   
    <table border="1">
        <tr>
            <th rowspan="1">Fecha</th>
            <th rowspan="1">Remitente</th>
            <th colspan="1"> Asunto</th>
            <th rowspan="1"></th>
        </tr>
        <?php
                include "../../config/conexionBD.php";
                $sql ="SELECT * FROM mensaje WHERE men_destinatario='$remitente'";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "  <td align=center>" .$row["men_fecha"]."</td>";
                        echo "  <td align=center>" .$row["men_remitente"]."</td>";
                        echo "  <td align=center>" .$row["men_asunto"]."</td>";
                        echo "  <td align=center>" .$row["men_mensaje"]."</td>";
                        echo "</tr>";
                    }
                }
            ?>
          
    </table>
</body>

</html>