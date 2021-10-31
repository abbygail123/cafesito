<?php
require_once("../Config/database.php");
session_start();

class VenderDAO{

    public function __construct(){
        $this->cnx = Conexion::conexion();
    }  

    public function generateRamdonCode(){
        $chars = "0123456789";
        $res = "";
        for ($i = 0; $i < 8; $i++) {
        $res .= $chars[mt_Rand(0, strlen($chars)-1)];
        }
        return $res;
    }

    public function ListarProductoVender(){
        $idusuario= $_SESSION['id'];
        $sql="select p.idproducto,p.nombre,p.precio_venta,p.stock, img.url_imagen
             from usuario u inner join producto p on p.idusuario=u.idusuario 
             inner join imagen_producto img on img.idproducto=p.idproducto 
             where u.idusuario=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$idusuario);
        $rs->execute();
        return $rs;
    } 
    public function verDatosParaVender($idProducto){
        $sql = "select idproducto,precio_venta,stock,nombre from producto where idproducto=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$idProducto);
        $rs->execute();
        $reg = $rs->fetchObject();
        return $reg;
    }
    public function venderProducto($idProducto,$cantidadVenta){
        $sql = "insert into venta(cantidad_venta,idproducto) values(?,?)";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$cantidadVenta);
        $rs->bindParam(2,$idProducto);
        $rs->execute();
        if($rs){
            echo "venta";
        }else{
            echo "error";
        }
    }
    public function existeVentaProducto($idProducto){
        $sql="select * from venta where idproducto=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$idProducto);
        $rs->execute();
        return $rs;
    }
    public function cancelarVenta($idProducto){
        $sql="delete from venta where idproducto=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$idProducto);
        $rs->execute();
        if($rs){
            echo "cancelado";
        }else{
            echo "error";
        }
    }
}    