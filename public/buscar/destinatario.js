function destinatario(){

    var cedula = document.getElementById("busqueda").value;

    if(cedula == ""){
        document.getElementById("informacion").innerHTML = "";
    }else{
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("informacion").innerHTML = this.responseText;
            }
        };
    }
    xmlhttp.open("GET","../controladores/buscar_destinatario.php?cedula="+cedula,true);
    xmlhttp.send();
}
