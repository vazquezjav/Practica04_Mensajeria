<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['usu_rol']=='U'){
        header("Location: ../../../public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title> Configuracion</title>
    <meta charset="UTF-8">
    <link href="../../../public/estilos/admin_mensajes.css" rel="stylesheet" />
</head>

<header>
<h4 id="sesion"><a id="cerrar" href="../../../config/cerrar_sesion.php">Cerrar Sesion</a></h4>
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
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Fecha Nacimiento </th>
                <th>Rol </th>
                <th>Modificar </th>
                <th>Eliminar </th>
                <th> Cambiar Contrasena</th>
            </tr>
            <?php
                include "../../../config/conexionBD.php";
                $sql ="SELECT * FROM usuario";
                $result=$conn->query($sql);

                
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        if($row["usu_eliminado"]=='N'){
                        echo "<tr>";
                        $codigo=$row["usu_codigo"];
                        echo "  <td align=center>" .$row["usu_cedula"]."</td>";
                        echo "  <td align=center>" .$row["usu_nombres"]."</td>";
                        echo "  <td align=center>" .$row["usu_apellidos"]."</td>";
                        echo "  <td align=center>" .$row["usu_direccion"]."</td>";
                        echo "  <td align=center>" .$row["usu_telefono"]."</td>";
                        echo "  <td align=center>" .$row["usu_correo"]."</td>";
                        echo "  <td align=center>" .$row["usu_fecha_nacimiento"]."</td>";
                        echo "  <td align=center>" .$row["usu_rol"]."</td>";
                        echo "  <td align=center>" ."<a href='cambiar.php?codigo=$codigo'>Modificar</a>". "</td>";
                        echo "  <td align=center>" ."<a href='../../controladores/eliminar.php?codigo=$codigo'>Eliminar</a>". "</td>";
                        echo "  <td align=center>" ."<a href='contrasena.php?codigo=$codigo'>Cambiar Contrasena</a>". "</td>";
                        echo "</tr>";
                        }
                    }
                }
                
            ?>
        

        </table>
</body>

</html>