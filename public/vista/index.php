<!DOCTYPE html>
<html>

<head>
    <title>Principal</title>
    <meta charset="UTF-8">
</head>
<header>
    <h1>Mensajes Recibidos</h1>
</header>

<body>
    <?php
        include "../../config/conexionBD.php";
        $sql ="SELECT * FROM usuario";
        $result=$conn->query($sql);
     ?>
    <table border="1">
        <tr>
            <th rowspan="1">Fecha</th>
            <th rowspan="1">Remitente</th>
            <th colspan="1"> Asunto</th>
            <th rowspan="1"></th>
        </tr>
          
    </table>
</body>

</html>