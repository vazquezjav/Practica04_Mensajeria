<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: login.html");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Principal</title>
    <meta charset="UTF-8"> 
    <script type="text/javascript" src="../buscar/destinatario.js"></script>
    <link href="../estilos/mensajes_enviados.css" rel="stylesheet" />

</head>
<header>
    <h1>Mensajes Enviados</h1>
    <nav>
        <ul>
            <?php
            $correo=$_GET['correo'];
            #echo "<meta http-equiv='Refresh' content='3;url=index.php?correo=$correo'";
            echo "<li> <a href='index.php?correo=$correo'>  Inicio  </a></li>" ;
            echo "<li><a href='nuevo_mensaje.php?correo=$correo'>  Nuevo Mensaje</a></li>";
            echo "<li> <a href='mensajes_enviados.php?correo=$correo'> Mensajes Enviados  </a></li>";
            echo "<li><a href='micuenta.php?correo=$correo'>Mi Cuenta  </a></li>";
            ?>
        </ul>
    </nav>
</header>

<body class="centro">
    <form id="formulario2" >
       <input type="text" class="busqueda"   id="busqueda" name="busqueda" value="" placeholder=" &#x1F50E; "  onkeyup="destinatario()">

    </form>
    <br>
    <table border="1" class="centro">
        <tr>
            <th rowspan="1">Fecha</th>
            <th rowspan="1">Destinatario</th>
            <th colspan="1"> Asunto</th>
            <th rowspan="1"></th>
        </tr>
        <?php
                include "../../config/conexionBD.php";
                $sql ="SELECT * FROM mensaje WHERE men_remitente='$correo'";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        if($row["men_eliminado"]=='N'){
                        echo "<tr>";
                        echo "  <td align=center>" .$row["men_fecha"]."</td>";
                        echo "  <td align=center>" .$row["men_destinatario"]."</td>";
                        echo "  <td align=center>" .$row["men_asunto"]."</td>";
                        echo "  <td align=center>" .$row["men_mensaje"]."</td>";
                        echo "</tr>";
                    }
                }
                }
            ?>
          
    </table>

    <div id="informacion"><b></b></div>
</body>

</html>