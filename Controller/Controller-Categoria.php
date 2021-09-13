<?php
require_once("../DataAccessObject/CategoriaDAO.php");
$categoriaDAO = new CategoriaDAO();
$tipo_operacion = $_POST['tipo'];
$respuesta = "";
/*********************************/
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
}else if($tipo_operacion=="obtener"){
    $reg = $categoriaDAO->obtenerCategoria($_POST["idcategoria"]);
    echo json_encode($reg);
}else if($tipo_operacion=="listarCategoriaComboBox"){
    $rs = $categoriaDAO->listarCategoriaComboBox();
    $option="";
    while($reg=$rs->fetchObject()){
      $option.="
      <option name='combo' id='combo' value='$reg->idcategoria'>$reg->categoria</option>
      ";
    }
    echo $option;

}else if($tipo_operacion=="listar_Categoria_Sub"){
    $rs = $categoriaDAO->listar_Categoria_Sub();
    $resultado="";
    while($reg=$rs->fetchObject()){
	    $resultado.="<tr>
		<td>#$reg->idcategoria</td>
		<td>$reg->categoria</td>
		<td>$reg->nombre_sub</td>
		<td colspan='2'>
        <button class='btn btn-info' type='button' onclick='verdatos($reg->idcategoria)'>Editar</button>
	    <button class='btn btn-danger' type='button' onclick='eliminar($reg->idcategoria)'>Eliminar</button>		
        </td>
        </tr>
        ";
    }
    echo $resultado;
}
?>