<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: login.html");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nuevo Mensaje</title>
        <meta charset="UTF-8">
    </head>
    <header>
    <h1>Nuevo mensaje</h1>
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
        <?php
          
            echo "<h1>$correo</h1>";

            echo "<form id='formulario1' method='POST' action='../controladores/mensaje.php?remitente=$correo'>"; 
            echo  " <label for='destinatario'>Destinatario</label>";
            echo "<input type='email' id='destinatario' name='destinatario' value='' placeholder='Ingrese destinatario'/>";
    
            echo"  <br>";
    
            echo "<label for='asunto'>Asunto</label>";
            echo "<input type='text' id='asunto' name='asunto' value='' placeholder='Ingrese asunto'/>";

            echo "<br>";

            echo "<label for='mensaje'>Mensaje</label>";
            echo "<input type='text' id='mensaje' name='mensaje' value='' placeholder='Mensaje'/>";
                
            echo "<br>";
    
            echo"<input type='submit' id='login' name='login' value='Enviar Mensaje'/>";
                
            echo "</form>";
            ?>
            
    </body>

</html>
