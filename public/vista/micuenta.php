<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] ===FALSE){
        echo "<script> alert ('No tiene permisos para ingresar');</script>";
        header("Location: login.html");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title> Configuracion</title>
    <meta charset="UTF-8">
    <link href="../estilos/micuenta.css" rel="stylesheet" />
</head>
<header>
    <h1>Cambiar Informacion </h1>
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
    <form id="formulario"  method="POST" action="cambiar.php">
            <?php
                include "../../config/conexionBD.php";
                #$correo=$_GET['correo'];
                $sql ="SELECT * FROM usuario WHERE usu_correo='$correo'";
                $result=$conn->query($sql);
                
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        if($row["usu_eliminado"]=='N'){
                            $cedula=$row["usu_cedula"];
                            $nombre=$row["usu_nombres"];
                            $apellido=$row["usu_apellidos"];
                            $direccion=$row["usu_direccion"];
                            $telefono=$row["usu_telefono"];
                            $fecha=$row["usu_fecha_nacimiento"];
                            $codigo=$row["usu_codigo"];
                            echo  "<label for='cedula'>Cedula </label>";
                            echo "<input type='text' readonly='readonly'  id='cedula' name='cedula' value='$cedula'  required/>";

                            echo "<br>";
    
                            echo "<label for='nombres'>Nombres </label>";
                            echo "<input type='text' readonly='readonly'  id='nombres' name='nombres' value='$nombre'  required/>";
    
                            echo "<br>";
    
                            echo "<label for='apellidos'>Apellido </label>";
                            echo "<input type='text' readonly='readonly'   id='apellidos' name='apellidos' value='$apellido'  required/>";
    
                            echo "<br>";
    
                            echo "<label for='direccion'>Direccion </label>";
                            echo "<input type='text' readonly='readonly'  id='direccion' name='direccion' value='$direccion' required/>";
    
                            echo "<br>";
    
                            echo "<label for='telefono'>Telefono </label>";
                            echo "<input type='text' readonly='readonly'  id='telefono' name='telefono' value='$telefono'  required/>";
    
                            echo "<br>";
            
                            echo "<label for='fecha'>Fecha Nacimiento </label>";
                            echo "<input type='date' readonly='readonly'   id='fechaNacimiento' name='fechaNacimiento' value='$fecha' required/>";
                            echo "<br>";

                            echo "<label for='correo'>Correo </label>";
                            echo "<input type='text' readonly='readonly'   id='correo' name='correo' value='$correo' required/>";
                            echo "<br>";
                            echo "<input type='hidden' readonly='readonly'  id='codigo' name='codigo' value='$codigo' />";
                            echo"<input type='submit' class='fondo_boton' id='correo' name='correo' value='Modificar'/>";

                            #echo"<input type='button' class='fondo_boton' id='modificar' name='modificar' value='Modificar' onclick='location='cambiar.php''/>";
                        }
                    }
                }
            ?>
            <input type="button" class="fondo_boton" id="contrasena" name="modificar" value="Cambiar Contrasena" onclick="location='contrasena.php'"/>
            </form>
</body>

</html>