<?php
require_once("../DataAccessObject/ProductoDAO.php");
require_once("../Model/Product.php");
if(isset($_SESSION['datosUser'])){
    $arreglo =  $_SESSION['datosUser'];
      for ($i=0; $i<count($arreglo); $i++) { 
          $id_usuario=$arreglo[$i]['id'];
          $usuario = $arreglo[$i]['usuario'];
      }
}
$productoDAO = new ProductoDAO();
$tipo_operacion = $_POST['tipo'];
if($tipo_operacion=="listarComboBox"){
  $rs = $productoDAO->listar_ComboBox_Producto();
  $combo="";
      while($reg=$rs->fetchObject()){
        $combo.="
        <option name='categoria_producto' id='categoria_producto' value='$reg->idcategoria'>$reg->categoria</option>
        ";
      }
  echo $combo;
}else if($tipo_operacion=="insertar_producto"){
  $id_producto = $productoDAO->generateRamdonCode();
  $nombre = $_POST['nombre_producto'];
  $stock = $_POST['stock'];
  $precio_compra = $_POST['precio_compra'];
  $precio_venta = $_POST['precio_venta'];
  $descripcion = $_POST['descripcion'];
  $imagen = addslashes($_FILES['imagen']["tmp_name"]);
  $id_categoria = $_POST['categoria'];
  $modelProduct = new Producto($id_producto,$id_usuario,$nombre,$stock,$precio_compra,$precio_venta,$descripcion,$id_categoria,$imagen);
  $resultado = $productoDAO->insertarProducto($modelProduct);
  echo $resultado;
}else if($tipo_operacion=="listar_producto"){
  $rs = $productoDAO->listar_Producto();
  $resultado="";
  while($reg=$rs->fetchObject()){
    if($reg->usuario==$usuario){
    $resultado.="<tr>
            <td>#$reg->idproducto</td>
            <td>$reg->nombre</td>
            <td>$reg->descripcion</td>
            <td>$reg->stock</td>
            <td>S/$reg->precio_compra</td>
            <td>S/$reg->precio_venta</td>
            <td><img src='$reg->url_imagen'></td>
            <td>$reg->categoria</td>
            <td>$reg->nombre_sub</td>
            <td colspan='2'>
            <a style='color:blue;cursor:pointer;' onclick='verDatos($reg->idproducto)'><i class='material-icons'data-toogle='tooltip' title='Edit'>edit</i></a>
            <a style='color:red;cursor:pointer;' onclick='eliminarProducto($reg->idproducto)'><i class='material-icons'data-toogle='tooltip' title='Delete'>delete_forever</i></a>
            </td>
          </tr>
          ";
  }
  }
  echo $resultado;
}else if($tipo_operacion=="eliminar"){
  $id_producto = $_POST['id_producto'];
  $resultado = $productoDAO->elimiar_Producto($id_producto);
  echo $resultado;
}else if($tipo_operacion=="obtener_Datos"){
  $id = $_POST['id_producto'];
  $reg = $productoDAO->obtenerProducto($id);
  echo json_encode($reg);
}else if($tipo_operacion=="actualizar_producto"){
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $categoria = $_POST['categoria'];
  $sub = $_POST['sub_categoria'];
  $precio_compra = $_POST['precio_compra'];
  $precio_venta = $_POST['precio_venta'];
  $stock = $_POST['stock'];
  $existe = $_POST['existe'];
  if($existe=="no_imagen"){
    $imagen=null;
    $respuesta = $productoDAO->actualizar_Producto($id,$nombre,$descripcion,$categoria,$sub,$precio_compra,$precio_venta,$stock,$imagen);
  }else if($existe=="si_imagen"){
    $imagen = addslashes($_FILES["imagen"]["tmp_name"]);
    $respuesta = $productoDAO->actualizar_Producto($id,$nombre,$descripcion,$categoria,$sub,$precio_compra,$precio_venta,$stock,$imagen);
  }
  echo $respuesta;
}

?>