<?php
require_once("../DataAccessObject/OfertaDAO.php");
$ofertaDAO = new OfertaDAO();
$tipo_operacion = $_POST['tipo'];
if($tipo_operacion=="listarProductoOferta"){
    $id_usuario  = $_SESSION['id'];
    $rs = $ofertaDAO->listarProductoComboBox($id_usuario);
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
}else if($tipo_operacion=="insertarOferta"){
    $idOferta = $ofertaDAO->generateRamdonCode();
    $idProducto = $_POST['idProducto'];
    $fechaDuracionOferta = $_POST['fechaDuracion'];
    $totalDescuento = $_POST['totalDescuento'];
    $precioFinal = $_POST['precioFinal'];
    $precioInicial= $_POST['precioInicial'];
    $resultado = $ofertaDAO->insertarOferta($idOferta,$idProducto,$fechaDuracionOferta,$precioInicial,$totalDescuento,$precioFinal);
    echo $resultado;
}else if($tipo_operacion=="listarOferta"){
    $rs = $ofertaDAO->listarOferta();
    $resultado="";
    while($reg=$rs->fetchObject()){
      $resultado.="<tr>
              <td>#$reg->idproducto</td>
              <td>$reg->nombre</td>
              <td>S/$reg->precio_venta</td>
              <td>%$reg->totalDescuento</td>
              <td>S/$reg->precioFinal</td>
              <td colspan='2'>
              <a style='color:blue;cursor:pointer;' onclick='verOferta($reg->idproducto)'><i class='material-icons'data-toogle='tooltip' title='Edit'>edit</i></a>
              <a style='color:red;cursor:pointer;' onclick='eliminarOferta($reg->idproducto)'><i class='material-icons'data-toogle='tooltip' title='Delete'>delete_forever</i></a>
              </td>
            </tr>
            ";
    }
    echo $resultado;
}else if($tipo_operacion=="obtenerProductoOferta"){
  $id = $_POST['idproducto'];
  $reg = $ofertaDAO->obtenerProductoOferta($id);
  echo json_encode($reg);
}else if($tipo_operacion=="eliminarOferta"){
  $idProducto = $_POST['idproducto'];
  $resultado = $ofertaDAO->eliminarOferta($idProducto);
  echo $resultado;
}elseif ($tipo_operacion=="CambiarDatosOferta") {
  $id = $_POST['codigoProductoOferta'];
  $descuento = $_POST['descuentoOferta'];
  $precioFinal = $_POST['precioFinalOferta'];
  $fechaVencimiento = $_POST['fechaFinalOferta'];
  $resultado = $ofertaDAO->CambiarDatosOferta($id,$descuento,$precioFinal,$fechaVencimiento);
  echo $resultado;
}