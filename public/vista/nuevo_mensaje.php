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
        <link href="../estilos/nuevo_mensaje.css" rel="stylesheet" />
    </head>
    <header>
    <h1>Nuevo mensaje</h1>
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
        <?php
          

            echo "<form id='formulario1' method='POST' action='../controladores/mensaje.php?remitente=$correo'>"; 
            echo  " <label for='destinatario'>Destinatario</label>";
            echo "<input type='email' id='destinatario' name='destinatario' value='' placeholder='&#x1F464;Ingrese destinatario'/>";
    
            echo"  <br>";
    
            echo "<label for='asunto'>Asunto</label>";
            echo "<input type='text' id='asunto' name='asunto' value='' placeholder='Ingrese asunto'/>";

            echo "<br>";

            echo "<label for='mensaje'>Mensaje</label>";
            echo "<input type='text' id='mensaje' name='mensaje' value='' placeholder='Mensaje'/>";
                
            echo "<br>";
    
            echo"<input type='submit' class='fondo_boton' id='login' name='login' value='Enviar Mensaje'/>";
            echo"<input type='button' class='fondo_boton' id='cancelar' name='cancelar' value='Cancelar' onclick='history.go(-1)'/>";
                
            echo "</form>";
            ?>
            
    </body>

</html>
