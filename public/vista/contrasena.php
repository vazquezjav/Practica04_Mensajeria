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
</head>
<header>
    <h1>Modificar contrasena</h1>
</header>
<body >
    <?php
    #include "../../config/conexionBD.php";
    $codigo=$_GET['codigo'];
    $correo=$_GET['correo'];
   # echo "<p>$correo</p>";
    ?>
    
       <form id="formulario2" method="POST" action="../controladores/cambiar_contrasena.php">

       <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
       <input type="hidden" id="correo" name="correo" value="<?php echo $correo ?>" />
        <label for="contraseña">Contrasena Anterior</label>
        <input  type="password" id="contraseña" name="contraseña" value="" required/>
        <br>

        <label for="contraseña">Nueva Contrasena </label>
        <input type="password" id="nueva_contraseña" name="nueva_contraseña" value=""  required/>

        <br>

        <input type="submit" id="crear" name="crear" value="Cambiar" />
        <input type="reset" id="cancelar" name="cancelar" value="Cancelar"/>
       </form>
        

</body>
</html>