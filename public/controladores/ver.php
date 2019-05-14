<?php

    include '../../config/conexionBD.php';
    $codigo=$_GET['codigo'];
    $sql="SELECT * FROM imagen WHERE img_codigo='$codigo'";

    $result=$conn->query($sql);
    # $borrar="DELETE FROM usuario WHERE usu_cedula='po'";
   
     if($result->num_rows>0){
         while($row=$result->fetch_assoc()){
             header ("Conten-Type: image/jpeg" );
             echo $row["img_imagen"];
         }
     }

?>