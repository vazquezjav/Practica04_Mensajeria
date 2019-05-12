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
                            echo "  <td align=center>" ."<a href='cambiar.php?codigo=$codigo'>Modificar</a>". "</td>";
                            echo "  <td align=center>" ."<a href='contrasena.php?codigo=$codigo'>Cambiar Contrasena</a>". "</td>";
                        }
                      
                    }
                }
            ?>

        </table>
</body>

</html>