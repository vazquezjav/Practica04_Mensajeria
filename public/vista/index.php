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
       
        $remitente=$_GET['correo'];
        $sql ="SELECT * FROM usuario WHERE usu_correo='$remitente'";
        $result=$conn->query($sql);
        $row2=mysqli_fetch_array($result);
        $nombres=$row2["usu_nombres"];
        $apellidos=$row2["usu_apellidos"];
        $espacio='   ';
        $cod_usu=$row2["usu_codigo"];

        #obtener codigo para imagen 
        $sql_img="SELECT * FROM imagen WHERE img_usuario='$cod_usu'";
        $result2=$conn->query($sql_img);
        $row3=mysqli_fetch_array($result2);
        $cod_img=$row3["img_codigo"];
     ?>    
    
</head>
<header>
    <h4 id="sesion"><a href="../../config/cerrar_sesion.php">Cerrar Sesion</a></h4><br><br>
    <?php
        echo"<img src='../controladores/ver.php?codigo=$cod_img' alt='' />";
    ?>
    <!--<img src="../controladores/ver.php"  alt="Amonnn" title="Imgennx"/>-->
   <!-- <h4 id="nombres">Nombres</h4>-->
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
    <h4 id="nombres"><?php echo $nombres,$espacio, $apellidos?></h4>
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
                }else{
                    echo "<tr>";
                    echo "<td colspan='4' class='nulo'><b> No tiene mensajes</b> </td>";
                    echo "</tr>";
                }
            ?>
          
    </table>

    <div id="informacion"><b></b></div> 

</body>

</html>