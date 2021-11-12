<?php

$servidor = "localhost";
$db = "cafe";
$usuario="root";
$password="";

$conexion = new mysqli($servidor,$usuario,$password,$db);
if($conexion->connect_error){
    die("error de coneccion");
}

?>