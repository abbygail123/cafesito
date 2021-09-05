<?php
require_once("../DataAccessObject/CategoriaDAO.php");
$categoriaDAO = new CategoriaDAO();
$tipo_operacion = $_POST['tipo'];
$respuesta = "";
if($tipo_operacion=="insertar"){
    $categoria = $_POST['categoria'];
    $respuesta = $categoriaDAO->insertarCategoria($categoria);
    echo $respuesta;
}
?>