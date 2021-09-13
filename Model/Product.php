<?php

class Producto{
    private $id_producto;
    private $id_usuario;
    private $nombre_producto;
    private $stock_producto;
    private $precio_compra;
    private $precio_venta;
    private $descripcion;
    private $id_categoria;
    private $imagen_producto;
    public function __construct($id_producto,$id_usuario,$nombre_producto,$stock_producto,$precio_compra,$precio_venta,$descripcion,$id_categoria,$imagen_producto){
        $this->id_producto = $id_producto;
        $this->id_usuario  = $id_usuario;
        $this->nombre_producto = $nombre_producto;
        $this->stock_producto = $stock_producto;
        $this->precio_compra = $precio_compra;
        $this->precio_venta = $precio_venta;
        $this->descripcion = $descripcion;
        $this->id_categoria = $id_categoria;
        $this->imagen_producto = $imagen_producto;
    }

    public function setImagenProducto($imagen_producto){
        $this->imagen_producto=$imagen_producto;
    }
    public function getImagenProducto(){
        return $this->imagen_producto;
    }
    public function setIdProducto($id_producto){
        $this->id_producto = $id_producto;
    }
    public function getIdProducto(){
        return $this->id_producto;
    }
    public function setIdUsuario($id_usuario){
        $this->id_usuario=$id_usuario;
    }
    public function getIdUsuario(){
        return $this->id_usuario;
    }
    public function setNombreProducto($nombre_producto){
        $this->nombre_producto=$nombre_producto;
    }
    public function getNombreProducto(){
        return $this->nombre_producto;
    }
    public function setStockProducto($stock_producto){
        $this->stock_producto=$stock_producto;
    }
    public function getStockProducto(){
        return $this->stock_producto;
    }
    public function setPrecioCompra($precio_compra){
        $this->precio_compra=$precio_compra;
    }
    public function getPrecioCompra(){
        return $this->precio_compra;
    }
    public function setPrecioVenta($precio_venta){
        $this->precio_venta=$precio_venta;
    }
    public function getPrecioVenta(){
        return $this->precio_venta;
    }
    public function setDescripcion($descripcion){
        $this->descripcion=$descripcion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setIdCategoria($id_categoria){
        $this->id_categoria=$id_categoria;
    }
    public function getIdCategoria(){
        return $this->id_categoria;
    }
}


?>