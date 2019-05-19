<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['usu_rol'] =='A' ){
        header("Location: login.html");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Principal</title>
    <meta charset="UTF-8">     
    <script type="text/javascript" src="../buscar/ajax.js"></script>
    <link href="../estilos/index.css" rel="stylesheet" />
    <?php
        include "../../config/conexionBD.php";
        $sql ="SELECT * FROM usuario";
        $result=$conn->query($sql);
        $remitente=$_GET['correo'];
     ?>
</head>
<header>
<!--<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=index.php"> </head> -->
    <h1>Mensajes Recibidos</h1>
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
    <br>
    <form id="formulario1" >
       <input type="text" class="busqueda" id="busqueda" name="busqueda"  value="" placeholder=" &#x1F50E; "  onkeyup="buscarPorCedula()">

    </form>
    <br>
    <table id="tabla" border="1" class="centro">
        <tr >
            <th rowspan="1">Fecha</th>
            <th rowspan="1">Remitente</th>
            <th colspan="1"> Asunto</th>
            <th rowspan="1">Mensaje</th>
        </tr>
        <?php
                include "../../config/conexionBD.php";
                $sql ="SELECT * FROM mensaje WHERE men_destinatario='$remitente' ORDER BY men_fecha DESC";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        if($row["men_eliminado"]=='N'){
                        echo "<tr>";
                        echo "  <td align=center id='fecha'>" .$row["men_fecha"]."</td>";
                        echo "  <td align=center>" .$row["men_remitente"]."</td>";
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