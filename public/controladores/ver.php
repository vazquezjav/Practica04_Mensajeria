<?php

    include '../../config/conexionBD.php';
    $sql="SELECT * FROM imagen WHERE img_codigo=8";

    $result=$conn->query($sql);
    # $borrar="DELETE FROM usuario WHERE usu_cedula='po'";
   
     if($result->num_rows>0){
         while($row=$result->fetch_assoc()){
             header ("Conten-Type: image/jpeg" );
             print $row["img_imagen"];
         }
     }

?>