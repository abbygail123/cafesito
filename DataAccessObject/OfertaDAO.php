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
        for ($i = 0; $i < 5; $i++) {
        $res .= $chars[mt_Rand(0, strlen($chars)-1)];
        }
        return $res;
    }

    public function listarProductoOferta($idUsuario){
        $sql ="select * from producto where idusuario=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$idUsuario);
        $rs->execute();
        return $rs;
    }

    public function ObtenerPrecioProducto($producto){

    $sql ="select precio_venta from producto where nombre=?";
    $rs = $this->cnx->prepare($sql);
    $rs->bindParam(1,$producto);
    $rs->execute();
    $reg = $rs->fetchObject();//obtiene los (objetos=datos) de la base de datos
    return $reg;
    }

}    