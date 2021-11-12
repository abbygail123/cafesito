<?php
require_once("../DataAccessObject/VenderDAO.php");
$venderDAO = new VenderDAO();
$tipo_operacion = $_POST['tipo'];
if($tipo_operacion=="ListarProductoVender"){
  $rs = $venderDAO->ListarProductoVender();
  $resultado="";
  while($reg=$rs->fetchObject()){
    $resultado.="<tr>
            <td>#$reg->idproducto</td>
            <td>$reg->nombre</td>
            <td>$reg->precio_venta</td>
            <td>$reg->stock</td>
            <td><img src='$reg->url_imagen'></td>
            <td colspan='2'>
            <a class='btn btn-info' style='color:white; text-decoration:none'type='button' href='../View/View-Producto.php' >Editar</a>
            ";
            $existe = $venderDAO->existeVentaProducto($reg->idproducto);
            if($existe->rowCount()==1){
                $resultado.="
                <button class='btn btn-dark' type='button'  onclick='cancelarVenta($reg->idproducto)'>Cancelar Venta</button>
                </td>
                </tr>	
                ";
            }
            if($existe->rowCount() == 0){
                $resultado.="
                <button class='btn btn-success' type='button'  onclick='verDatosParaVender($reg->idproducto)'>Vender</button>
                </td>
                </tr>	
                ";
            }
  }
  echo $resultado;
}else if($tipo_operacion=="verDatosParaVender"){
  $id = $_POST['idproducto'];
  $reg = $venderDAO->verDatosParaVender($id);
  echo json_encode($reg);
}else if($tipo_operacion=="venderProducto"){
  $idproducto = $_POST['idproducto'];
  $cantidadVenta = $_POST['cantidadVenta'];
  $respuesta = $venderDAO->venderProducto($idproducto,$cantidadVenta);
  echo $respuesta;
}else if($tipo_operacion=="cancelarVenta"){
    $id=$_POST['idproducto'];
    $rs = $venderDAO->cancelarVenta($id);
    echo $rs;
}