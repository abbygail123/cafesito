<?php

class Offer {
    
    private $idOferta;
    private $idProducto;
    private $idUsuario;
    private $fechaDuracionOferta;
    private $totalDescuento;
    
    public function setIdOferta($idOferta){
        $this->idOferta=$idOferta;
    }
    public function getIdOferta(){
        return $this->idOferta;
    }
    /*****************/
    public function setIdProducto($idProducto){
        $this->idProducto = $idProducto;
    }
    public function getIdProducto(){
        return $this->idProducto;
    }
    /*******/
    public function setFechaDuracionDescuento($fechaDuracionOferta){
        $this->fechaDuracionOferta=$fechaDuracionOferta;
    }
    public function getFechaDuracionDescuento(){
        return $this->fechaDuracionOferta;
    }
    public function setTotalDescuento($totalDescuento){
        $this->totalDescuento=$totalDescuento;
    }
    public function getTotalDescuento(){
        return $this->totalDescuento;
    }
}

?>