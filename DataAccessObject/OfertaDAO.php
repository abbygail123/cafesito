<?php
require_once("../Config/database.php");
session_start();

class OfertaDAO{

    public function __construct(){
        $this->cnx = Conexion::conexion();
    }   

    public function generateRamdonCode(){
        $chars = "0123456789";
        $res = "";
        for ($i = 0; $i < 7; $i++) {
        $res .= $chars[mt_Rand(0, strlen($chars)-1)];
        }
        return $res;
    }

    public function listarProductoComboBox($idUsuario){
        $sql ="SELECT v.idproducto,p.nombre,u.idusuario
        from venta as v INNER JOIN producto as p on p.idproducto=v.idproducto
        INNER JOIN usuario as u on u.idusuario=p.idusuario
        where not EXISTS (select * from oferta as o where o.idproducto=v.idproducto) and u.idusuario=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$idUsuario);
        $rs->execute();
        return $rs;
    }
    public function CambiarDatosOferta($id,$descuento,$precioFinal,$fechaVencimiento){
        $sql = "update oferta set totalDescuento=? , precioFinal=?, fechaDuracionOferta=? where idProducto=?";
        $rs  = $this->cnx->prepare($sql);
        $rs->bindParam(1,$descuento);
        $rs->bindParam(2,$precioFinal);
        $rs->bindParam(3,$fechaVencimiento);
        $rs->bindParam(4,$id);
        $rs->execute();
        if($rs){
            echo "actualizado";
        }else{
            echo "error";
        }
    }
    //eliminar producto del sector oferta
    public function eliminarOferta($idProducto){
        $sql = "delete from oferta where idProducto=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$idProducto);
        $rs->execute();
        if($rs){
            echo "eliminado";
        }else{
            echo "error";
        }
    }

    //obtener oferta ver datos
    public function obtenerProductoOferta($idProducto){
        $sql="select p.idproducto,p.nombre,p.precio_venta,o.totalDescuento,o.precioFinal,o.fechaDuracionOferta 
        from producto p INNER JOIN oferta o on o.idProducto=p.idproducto where p.idproducto=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$idProducto);
        $rs->execute();
        $json = array();
        $timeFormat = 'Y-m-d\TH:i';  
            while($reg=$rs->fetchObject()){
            $from_date = new DateTime($reg->fechaDuracionOferta);
            $json[]=array(
                 'idproducto' => $reg->idproducto,
                 'nombre' => $reg->nombre,
                 'precio_venta' => $reg->precio_venta,
                 'totalDescuento' => $reg->totalDescuento,
                 'precioFinal' => $reg->precioFinal,
                 'fechaDuracionOferta' => $from_date->format($timeFormat)
             );
            }
        return $json;  
    }

    public function ObtenerPrecioProducto($producto){
    $sql ="select precio_venta,idproducto from producto where nombre=?";
    $rs = $this->cnx->prepare($sql);
    $rs->bindParam(1,$producto);
    $rs->execute();
    $reg = $rs->fetchObject();//obtiene los (objetos=datos) de la base de datos
    return $reg;
    }

    public function insertarOferta($idOferta,$idProducto,$fechaDuracionOferta,$precioInicial,$totalDescuento,$precioFinal){
        date_default_timezone_set('America/Lima');    
        $fechaOferta = date('Y-m-d h:i:s a');   
        $sql= "insert into oferta(idOferta,idProducto,fechaOferta,fechaDuracionOferta,precioInicial,totalDescuento,precioFinal) values(?,?,?,?,?,?,?)";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$idOferta);
        $rs->bindParam(2,$idProducto);
        $rs->bindParam(3,$fechaOferta);
        $rs->bindParam(4,$fechaDuracionOferta);
        $rs->bindParam(5,$precioInicial);
        $rs->bindParam(6,$totalDescuento);
        $rs->bindParam(7,$precioFinal);
        $rs->execute();
        if($rs){
            echo "insertado";
        }else{
            echo "error";
        }
    }

    public function listarOferta() {
        $idUsuario = $_SESSION['id'];
        $sql = "select  ofe.idOferta,p.idproducto,p.nombre, ofe.fechaOferta,fechaDuracionOferta,ofe.totalDescuento,ofe.precioFinal,p.precio_venta
        from usuario u inner join producto p on u.idusuario=p.idusuario
        inner join oferta ofe on p.idproducto=ofe.idProducto
        where u.idusuario=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$idUsuario);
        $rs->execute();
        return $rs;
    }
}    