<?php
require_once("../Config/database.php");
require_once("../Api/ApiCloudinary.php");
require_once("../Model/User.php");
class UserDAO
{
    public function __construct()
    {
        $this->cnx = Conexion::conexion(); // ->  y  :: da a conocer el llamado de la clase y el método
    }
    
    public function generateRamdonCode()
    {
        $chars = "0123456789";
        $res = "";
        for ($i = 0; $i < 5; $i++) {
            $res .= $chars[mt_Rand(0, strlen($chars) - 1)];
        }
        return $res;
    }

    public function registerUser($obj)
    {
        $id       = $obj->getIdUsuario();
        $usuario  = $obj->getUsuario();
        $nombre   = $obj->getNombre();
        $apellido = $obj->getApellido();
        $clave    = $obj->getClave();
        $dni      = $obj->getDni();
        $telefono = $obj->getTelefono();
        $sql = "insert into usuario(idusuario,nombre,apellido,dni,telefono,usuario,clave) values(?,?,?,?,?,?,?)";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1, $id);
        $rs->bindParam(2, $nombre);
        $rs->bindParam(3, $apellido);
        $rs->bindParam(4, $dni);
        $rs->bindParam(5, $telefono);
        $rs->bindParam(6, $usuario);
        $rs->bindParam(7, $clave);
        $rs->execute();
        if ($rs){
            $api = new ApiCloudinary();
            $cloud = $api->uploadFile($obj->getFoto());  /*ulr - id;*/
            $this->sendImageUser($cloud, $id); //llama al método de abajo, para pasar el cloud y el id
        }
        echo "registrado";
    }



    public function sendImageUser($cloud,$id)
    {
        $sql = "insert into imagen_usuario(idimagen,idusuario,url_imagen)  values(?,?,?)";
        $rs  = $this->cnx->prepare($sql);
        $rs->bindParam(1, $cloud['public_id']);
        $rs->bindParam(2, $id);
        $rs->bindParam(3, $cloud['url']);
        $rs->execute();
    }

/*
ejemplos de los metodos de arriba;
    $a =5;
    $b =6;

    public function darValores(){
        $this->sumar($a,$b);
    }
    public function sumar($p1,p2){
         echo $resultado = $p1 + $p2;
    }
*/
}
?>
