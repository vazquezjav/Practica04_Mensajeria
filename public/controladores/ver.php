<?php

    include '../../config/conexionBD.php';
   # $codigo=$_GET['codigo'];
    $cod=56;
    $sql="SELECT * FROM imagen WHERE img_codigo='$cod'";

    $result=$conn->query($sql);
    # $borrar="DELETE FROM usuario WHERE usu_cedula='po'";
   
     if($result->num_rows>0){
         while($row=$result->fetch_assoc()){
             header ("Conten-Type: image/jpeg" );
             echo $row["img_imagen"];
            echo "<img src='ver.php' style='position:absolute; top=0; left:0;' alt=''>";

             #echo "<p>" .$row["img_nombre"] ."<p>";
         }
     }

?>