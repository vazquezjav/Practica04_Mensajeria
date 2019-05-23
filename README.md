Diagrama entidad relacion 

<img src="public/Imagenes/index.jpg" />

Para los roles de los usuarios creamos una columna la cual le identificarnos como usu_rol por defecto creamos únicamente un administrador, y las cuentas que se vallan creando en la base, serán por default usuarios, y después el administrador general podrá modificar estos datos y si quiere o no tener mas administradores 


La pagina que no sirve para enviar correos a otras cuentas, obviamente escribimos el correo del destinatario, por default ya conocemos nuestro correo no seria necesariamente escribir, agregamos el asunto a tratar y el mensaje correspondiente  


Con el método post obtenemos en el controlador los datos enviados por el formulario de la pagina nuevo_mensaje.php, obtenemos todos estos datos y lo que hacemos es crea una sentencia SQL en la cual insertamos el nuevo mensaje en la tabla de mensajes


Cuando ingresamos las palabras claves de la búsqueda, en la parte inferior de la tabla de mensajes recibidos nos mostrara una tabla adicional la cual nos muestra los mensajes recibidos del correo mandado a buscar en la base 



Cada vez que vallamos ingresando información ene el campo de busca, este mediante onkeyup nos permite llamar a la función de Ajax


La función de javascript manda los datos a un controlador que se encarga de realizar la consulta en la base de datos, y es ahí también donde creamos la tabla de resultados que devuelve los mensajes recibidos del remitente mas parecido a lo que el usuario valla ingresando 

En la parte de mi cuenta del usuario, la información que podemos observar es solo de lectura, ya si la queremos modificar tendremos que darle click en el boton de modificar, y nos redireccionara a otra pagina donde podemos cambiar nuestra información 

Este formulario envia la información al controlador actualizar.php donde con el método post recupera la información que fue enviada del formulario de modificación de los datos 

Despues de obtener lo sdatos creamos la sentencia SQL que va actualizar los datos del registro de nuestro usuario 
 
Para cambiar la contrasena, tendremos que ingresar la contraseña actual y la nueva contraseña que queramos 


Y es aquí donde realizamos la comparación de la contraseña ingresada con la contraseña registrada en la base de datos, si en el caso que no coincidieran se redirecciona a la pagina donde introduce las 
