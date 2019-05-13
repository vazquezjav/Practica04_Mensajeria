<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] ===FALSE){
        echo "<script> alert ('No tiene permisos para ingresar');</script>";
        header("Location: /Practica04_Mensajeria/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title> Configuracion</title>
    <meta charset="UTF-8">
</head>
<header>
    <h1>Cambiar Informacion </h1>
    <nav>
        <ul>
            <?php
            $correo=$_GET['correo'];
            echo " <a href='index.php?correo=$correo'>  Inicio  </a>" ;
            echo "<a href='nuevo_mensaje.php?correo=$correo'>  Nuevo Mensaje</a>";
            echo " <a href='mensajes_enviados.php?correo=$correo'> Mensajes Enviados  </a>";
            echo "<a href='micuenta.php?correo=$correo'>Mi Cuenta  </a>";
            ?>
        </ul>
    </nav>
</header>

<body>
    
        <table style="width:100%" border=1>
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Fecha Nacimiento </th>
                <th>Modificar </th>
                <th> Cambiar Contrasena</th>
            </tr>
            <?php
                include "../../config/conexionBD.php";
                #$correo=$_GET['correo'];
                $sql ="SELECT * FROM usuario WHERE usu_correo='$correo'";
                $result=$conn->query($sql);

                echo "<p>$correo</p>";
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
                            echo "  <td align=center>" ."<a href='cambiar.php?codigo=$codigo'>Modificar</a>". "</td>";
                            echo "  <td align=center>" ."<a href='contrasena.php?codigo=$codigo&correo=$correo'>Cambiar Contrasena</a>". "</td>";
                        }
                      
                    }
                }
            ?>

        </table>
</body>

</html>