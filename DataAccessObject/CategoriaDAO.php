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
        if($rs){
            echo "registrado";
        }else{
            echo "error";
        }
    }

    public function listarCategoriaComboBox(){
        $sql ="SELECT * from categoria as c where not EXISTS (select * from sub_categoria as sub where  c.idcategoria=sub.idcategoria)";
        $rs = $this->cnx->query($sql);
        return $rs;
    }

    public function listar_Categoria_Sub(){
        $sql="select c.idcategoria,c.categoria,s.nombre_sub
        from categoria c INNER JOIN sub_categoria s on s.idcategoria=c.idcategoria";
        $rs =$this->cnx->query($sql);
        return $rs;
    }

    public function insertarSubCategoria($id_categoria,$sub_categoria){
        $sql="insert into sub_categoria(idcategoria,nombre_sub) values(?,?)";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$id_categoria);
        $rs->bindParam(2,$sub_categoria);
        $rs->execute();
        if($rs){
            echo "insertado";
        }else{
            echo "error";
        }
    }

    public function eliminarCategoria($id_categoria){
        $sql="delete from categoria where idcategoria=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$id_categoria);
        $rs->execute();
        if($rs){
            echo "eliminado";
        }else{
            echo "error";
        }
    }

    public function obtenerCategoria($id_categoria){
        $sql="SELECT c.idcategoria,c.categoria,sub.nombre_sub
        from categoria c INNER JOIN sub_categoria sub on c.idcategoria=sub.idcategoria
        WHERE c.idcategoria=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$id_categoria);
        $rs->execute();
        if($rs){
            $reg  = $rs->fetchObject();
            return $reg;
        }else{
            return "error";
        }
    }
    
    public function actualizarCategoria_Sub($id,$categoria,$sub_categoria){
        $sql= "UPDATE categoria cat INNER JOIN sub_categoria sub on cat.idcategoria=sub.idcategoria
        SET cat.categoria=? , sub.nombre_sub=?
        where cat.idcategoria=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$categoria);
        $rs->bindParam(2,$sub_categoria);
        $rs->bindParam(3,$id);
        $rs->execute();
        if($rs){
            return "actualizado";
        }else{
            return "error";
        }
    }
}

?>