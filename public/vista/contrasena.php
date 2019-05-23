<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: login.html");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="../estilos/nuevo_mensaje.css" rel="stylesheet" />
</head>
<header>
    <h1>Modificar contrasena</h1>
</header>
<body class="centro">
    <?php
    #session_start();
    include '../../config/conexionBD.php';
    $codigo=$_SESSION['usu_codigo'];
    $correo=$_SESSION['usu_correo'];
   # echo "<p>$correo</p>";
    ?>
    
       <form id="formulario2" method="POST" action="../controladores/cambiar_contrasena.php">

       <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
       <input type="hidden" id="correo" name="correo" value="<?php echo $correo ?>" />
        <label for="contraseña">Contrasena Anterior</label>
        <input  type="password" id="contraseña" name="contraseña" value="" placeholder="&#x1F511;" required/>
        <br>

        <label for="contraseña">Nueva Contrasena </label>
        <input type="password" id="nueva_contraseña" name="nueva_contraseña" value="" placeholder="&#x1F511;"  required/>

        <br>

        <input type="submit" class="fondo_boton" id="crear" name="crear" value="Cambiar" />
        <input type="button" class="fondo_boton" id="cancelar" name="cancelar" value="Cancelar" onclick="history.go(-1)"/>
       </form>
        

</body>
</html>