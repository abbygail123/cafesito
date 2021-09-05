<?php
require_once("../Config/database.php");
class CategoriaDAO{
    public function __construct(){
        $this->cnx = Conexion::conexion(); // ->  y  :: da a conocer el llamado de la clase y el método
    }
    public function insertarCategoria($categoria){
        $sql = "insert into categoria(categoria) values(?)";
        $rs  = $this->cnx->prepare($sql);
        $rs->bindParam(1,$categoria);
        $rs->execute();
        echo "registrado";
    }
    public function listarCategoria(){
        $sql ="select * from categoria";
        $rs = $this->cnx->query($sql);
        return $rs;
    }

}

?>