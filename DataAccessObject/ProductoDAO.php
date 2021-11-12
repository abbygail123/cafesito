<?php
require_once("../Config/database.php");
require_once("../Api/ApiCloudinary.php");
require_once("../Model/Product.php");
session_start();
class ProductoDAO{

    public function __construct(){
        $this->cnx = Conexion::conexion();
    }
    
    public function generateRamdonCode(){
        $chars = "0123456789";
        $res = "";
        for ($i = 0; $i < 5; $i++) {
        $res .= $chars[mt_Rand(0, strlen($chars)-1)];
        }
        return $res;
    }
    //antecedentes : metodologías :  //2 cada 1 : //venta de productos online / para el otro miercoles:
    public function actualizar_Producto($id,$nombre,$descripcion,$categoria,$sub,$precio_compra,$precio_venta,$stock,$imagen){
        $sql ="UPDATE producto p INNER JOIN categoria cat on cat.idcategoria=p.idcategoria
        INNER JOIN sub_categoria sub on sub.idcategoria=cat.idcategoria
        SET p.nombre=?, p.descripcion=?,cat.categoria=?, sub.nombre_sub=?, 
        p.precio_compra=?, p.precio_venta=?, p.stock=?
        where p.idproducto=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$nombre);
        $rs->bindParam(2,$descripcion);
        $rs->bindParam(3,$categoria);
        $rs->bindParam(4,$sub);
        $rs->bindParam(5,$precio_compra);
        $rs->bindParam(6,$precio_venta);
        $rs->bindParam(7,$stock);
        $rs->bindParam(8,$id);
        $rs->execute();
        echo "actualizado";
        if($imagen != null){
            $api = new ApiCloudinary();
            $id_imagen= $this->obtener_Id_Imagen($id);
            $api->destroyFile($id_imagen);
            /*****************************/
            $cloud = $api->uploadFile($imagen);
            $this->actualizar_Producto_Img($cloud,$id);
        }
    }

    public function actualizar_Producto_Img($cloud,$id_producto){
        $sql = "UPDATE imagen_producto SET idimagen=?,url_imagen=? WHERE idproducto=?";
        $rs  = $this->cnx->prepare($sql);
        $rs->bindParam(1,$cloud['public_id']);
        $rs->bindParam(2,$cloud['url']);
        $rs->bindParam(3,$id_producto);
        $rs->execute();
    }

    public function elimiar_Producto($id_producto){
        $id_imagen = $this->obtener_Id_Imagen($id_producto);
        $sql="delete from producto where idproducto=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$id_producto);
        $rs->execute();
        if($rs){
            $api = new ApiCloudinary();
            $cloud = $api->destroyFile($id_imagen);
            echo "eliminado";
        }else{
            echo "error";
        }
    }

    public function obtenerProducto($id_producto){
        $sql ="SELECT * FROM usuario u  INNER JOIN  producto p on p.idusuario=u.idusuario
        INNER JOIN categoria c on c.idcategoria=p.idcategoria
        INNER join sub_categoria sb on sb.idcategoria=c.idcategoria
        INNER JOIN imagen_producto i on i.idproducto=p.idproducto
        where p.idproducto='$id_producto'";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$id_producto);
        $rs->execute();
        $reg = $rs->fetchObject();//obtiene los (objetos=datos) de la base de datos
        return $reg;
    }

    public function obtener_Id_Imagen($id_producto){
        $id_imagen = null;
        $sql="select * from imagen_producto where idproducto=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$id_producto);
        $rs->execute();
        if($obj = $rs->fetchObject()){
            $id_imagen = $obj->idimagen;
        }
        return $id_imagen;
    }

    public function listar_ComboBox_Producto(){
        $sql ="select * from categoria";
        $rs = $this->cnx->query($sql);
        return $rs;
    }
    public function listar_Producto(){
        if(isset($_SESSION['datosUser'])){
            $arreglo =  $_SESSION['datosUser'];
              for ($i=0; $i<count($arreglo); $i++) { 
                $usuario=$arreglo[$i]['usuario'];
              }
        }
        $sql="SELECT * FROM usuario u  INNER JOIN  producto p on p.idusuario=u.idusuario
        INNER JOIN categoria c on c.idcategoria=p.idcategoria
        INNER join sub_categoria sb on sb.idcategoria=c.idcategoria
        INNER JOIN imagen_producto i on i.idproducto=p.idproducto where u.usuario='$usuario'";
        $rs = $this->cnx->query($sql);
        return $rs;
    }
    
    public function insertarProducto($obj){
        $id_producto = $obj->getIdProducto();
        $id_usuario   = $obj->getIdUsuario();
        $nombre      = $obj->getNombreProducto();
        $stock       = $obj->getStockProducto();
        $precio_compra=$obj->getPrecioCompra();
        $precio_venta= $obj->getPrecioVenta();
        $descripcion = $obj->getDescripcion();
        $id_categoria= $obj->getIdCategoria();
        $imagen_producto=$obj->getImagenProducto();
        $sql="insert into producto(idproducto,idusuario,nombre,stock,precio_compra,precio_venta,descripcion,idcategoria) values(?,?,?,?,?,?,?,?)";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$id_producto);$rs->bindParam(2,$id_usuario);
        $rs->bindParam(3,$nombre);$rs->bindParam(4,$stock);
        $rs->bindParam(5,$precio_compra);$rs->bindParam(6,$precio_venta);
        $rs->bindParam(7,$descripcion);$rs->bindParam(8,$id_categoria);
        $rs->execute();
        if($rs){
            $api = new ApiCloudinary();
            $cloud = $api->uploadFile($imagen_producto);
            $this->insertarImagenProducto($cloud,$id_producto);
            echo "insertado";
        }else{
            echo "error";
        }
    }

    public function insertarImagenProducto($cloud,$id_producto){
        $sql="insert into imagen_producto(idimagen,idproducto,url_imagen) values(?,?,?)";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$cloud['public_id']);
        $rs->bindParam(2,$id_producto);
        $rs->bindParam(3,$cloud['url']);
        $rs->execute();
    }

}

?>