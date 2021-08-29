<?php

require_once("Config/database.php"); //llamando a la clase
//$conex es el objecto <--- cualquier nombre 
// new significa hacer una instancia de una clase 
$conex = new Conexion(); //deben coincidir los nombres de las clases a llamar 
$conex->conexion(); //llamada de métodos con el objecto


//obtener cambios de la rama ---> git pull origin master