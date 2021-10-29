<?php
require_once("../DataAccessObject/OfertaDAO.php");
$ofertaDAO = new OfertaDAO();
$tipo_operacion = $_POST['tipo'];
if($tipo_operacion=="listarProductoOferta"){
    $id_usuario  = $_SESSION['id'];
    $rs = $ofertaDAO->listarProductoOferta($id_usuario);
    $option="<option name='combo' id='combo'>Seleccione</option>";
    while($reg=$rs->fetchObject()){
      $option.="
      <option name='combo' id='combo' value='$reg->idproducto'>$reg->nombre</option>
      ";
    }
    echo $option;
}else if($tipo_operacion=="ObtenerPrecioProducto"){
    $producto = $_POST['producto'];
    $reg = $ofertaDAO->ObtenerPrecioProducto($producto);
    echo json_encode($reg);
}