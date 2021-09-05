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

    public function generateRamdonCode(){
        $chars = "0123456789";
        $res = "";
        for ($i = 0; $i < 5; $i++) {
            $res .= $chars[mt_Rand(0, strlen($chars) - 1)];
        }
        return $res;
    }

    public function registerUser($obj){
        $id       = $obj->getIdUsuario();
        $usuario  = $obj->getUsuario();
        $nombre   = $obj->getNombre();
        $apellido = $obj->getApellido();
        $clave    = $obj->getClave();
        $dni      = $obj->getDni();
        $telefono = $obj->getTelefono();
        $tipo = "Cliente";
        $sql = "insert into usuario(idusuario,nombre,apellido,dni,telefono,usuario,clave,tipo) values(?,?,?,?,?,?,?,?)";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1, $id);
        $rs->bindParam(2, $nombre);
        $rs->bindParam(3, $apellido);
        $rs->bindParam(4, $dni);
        $rs->bindParam(5, $telefono);
        $rs->bindParam(6, $usuario);
        $rs->bindParam(7, $clave);
        $rs->bindParam(8, $tipo);
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

    public function LoginUser($username,$password){ 
        $sql="SELECT u.idusuario,u.nombre,u.apellido,u.dni,u.telefono,u.usuario,u.clave,u.tipo,i.idimagen,i.url_imagen
        FROM usuario u inner join imagen_usuario i  WHERE u.usuario = ? and u.clave =?";    
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$username);
        $rs->bindParam(2,$password);
        $rs->execute();//ejecuta en la base de datos 
        if($rs->rowCount()>0){
            session_start();
            $reg = $rs->fetchObject();
            $_SESSION['id'] = $reg->idusuario;
            $_SESSION['nombre'] = $reg->nombre;
            $_SESSION['apellido'] = $reg->apellido;
            $_SESSION['dni']= $reg->dni;
            $_SESSION['telefono'] = $reg->telefono;
            $_SESSION['usuario'] = $reg->usuario;
            $_SESSION['clave'] = $reg->clave;
            $_SESSION['id_imagen'] = $reg->idimagen;
            $_SESSION['url'] = $reg->url_imagen;
            header("Location: ../gerencia/usuario.php");   
        }else{
            header("location: ../login/login.php?e=1");
        }
   }

   public function listarCliente(){
       $sql ="select * from usuario";
       $rs = $this->cnx->query($sql);
       return $rs;
   }

   public function actualizarCliente($tipo,$id){
        $sql = "UPDATE usuario  SET tipo = '$tipo' WHERE idusuario ='$id'";
        $rs = $this->cnx->query($sql);
        echo "ok";
   }
/*
ejemplos de los metodos de arriba;
    $a =5;
    $b =6;
    public function darValores(){ 
        $this->sumar($a,$b);
    }
    public function sumar($p1,$p2){ 
         echo $resultado = $p1 + $p2;
    }
*/
}
/*
$clase = new UserDAO(); //se ejecuta primero el constructor <--
$clase->LoginUser("alexander","alexander");*/
?>
