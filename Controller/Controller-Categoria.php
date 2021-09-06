<?php
require_once("../DataAccessObject/CategoriaDAO.php");
$categoriaDAO = new CategoriaDAO();
$tipo_operacion = $_POST['tipo'];
$respuesta = "";
if($tipo_operacion=="insertar"){
    $categoria = $_POST['categoria'];
    $respuesta = $categoriaDAO->insertarCategoria($categoria);
    echo $respuesta;
}elseif ($tipo_operacion=="insertar_sub_categoria"){
    $id_categoria = $_POST['idcategoria'];
    $sub_categoria = $_POST['sub_categoria'];
    $respuesta = $categoriaDAO->insertarSubCategoria($id_categoria,$sub_categoria);
    echo $respuesta;
}else if($tipo_operacion=="eliminar"){
    $id_categoria=$_POST['id'];
    $respuesta = $categoriaDAO->eliminarCategoria($id_categoria);
    echo $respuesta;
}else if($tipo_operacion=="editar"){
    $id = $_POST['idcategoria'];
    $nombre_categoria = $_POST['nombre_categoria'];
    $nombre_subcategoria = $_POST['sub_categoria'];
    $respuesta = $categoriaDAO->actualizarCategoria_Sub($id,$nombre_categoria,$nombre_subcategoria);
    echo $respuesta;
}
?>