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
        $existe = "select * from usuario where usuario='$usuario'";
        $getData = $this->cnx->query($existe);
    if($getData->rowCount() > 0){
        echo "existe";
    }else{
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
            $_SESSION['datosUser'];
            $arregloNuevo[] = array(
                'id' => $reg->idusuario,
                'nombre' => $reg->nombre,
                'apellido' => $reg->apellido,
                'dni' => $reg->dni,
                'telefono' =>  $reg->telefono,
                'usuario' => $reg->usuario,
                'clave' =>  $reg->clave,
                'id_imagen' => $reg->idimagen,
                'url' => $reg->url_imagen,
                'tipo' => $reg->tipo,
            );
            if(isset($arregloNuevo)){
                $_SESSION['datosUser'] =$arregloNuevo;
            }else{
                unset($_SESSION['datosUser']);
            }
            //header("Location: ../View/View-ListaUsuario.php");   
        }else{
            header("location: ../View/View-Login.php?e=1");
        }
   }

   public function listarCliente(){
       $sql ="select * from usuario";
       $rs = $this->cnx->query($sql);
       return $rs;
   }

   public function obtener_Datos($id_usuario){
       $sql ="select * from usuario where idusuario=?";
       $rs = $this->cnx->prepare($sql);
       $rs->bindParam(1,$id_usuario);
       $rs->execute();
       $reg = $rs->fetchObject();//obtiene los (objetos=datos) de la base de datos
       return $reg;
   }

   public function editar_Tipo_Cliente($id,$tipo){
        $sql = "UPDATE usuario  SET tipo = ? WHERE idusuario =?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$tipo);
        $rs->bindParam(2,$id);
        $rs->execute();
        if($rs){
            echo "actualizado";
        }else{
            echo "error";
        }
        
   }

   public function eliminarUsuario($idUsuario){
        $sql="delete from usuario where idusuario=?";
        $rs = $this->cnx->prepare($sql);
        $rs->bindParam(1,$idUsuario);
        $rs->execute();
        if($rs){
            echo "eliminado";
        }else{
            echo "error";
        }
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
