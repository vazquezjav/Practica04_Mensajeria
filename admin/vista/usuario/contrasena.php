<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<header>
    <h1>Modificar contrasena</h1>
    <link href="../../../public/estilos/nuevo_mensaje.css" rel="stylesheet" />
</header>
<body class="centro">
    <?php
    include "../../../config/conexionBD.php";
    $codigo=$_GET['codigo'];
    $sql ="SELECT * FROM usuario WHERE usu_codigo=$codigo";
    $result=$conn->query($sql);
    # echo "<p>$codigo</p>";
    
        echo "<form id='formulario2' method='POST' action='../../controladores/cambiar_contrasena.php?codigo=$codigo'>";
        
        echo  " <label for='contraseña'>Nueva Contrasena </label>";
        echo "  <input type='password' id='nueva_contraseña' name='nueva_contraseña' value=''  required/>";

        echo "<br>";

        echo" <input type='submit' class='fondo_boton' id='crear' name='crear' value='Cambiar' />";
        echo" <input type='reset' class='fondo_boton' id='cancelar' name='cancelar' value='Cancelar' onclick='history.go(-1)'  />";
        echo "</form>";
        
      ?>  

</body>
</html>