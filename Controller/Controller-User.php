<?php
require_once("../Model/User.php");
require_once("../DataAccessObject/UserDAO.php");
$userDao = new UserDAO();
$op = $_POST['op'];
$respuesta ="";
if ($op == "guardarCliente") {
    $id = $userDao->generateRamdonCode();
    $usuario = $_POST['Usuario'];
    $nombre = $_POST['Nombres'];
    $apellido = $_POST['Apellidos'];
    $clave = $_POST['Clave'];
    $dni = $_POST['Dni'];
    $telefono = $_POST['Telefono'];
    $foto = addslashes($_FILES['Imagen']["tmp_name"]);
    $model = new User($id,$nombre,$apellido,$dni,$telefono,$usuario,$clave,$foto);
    $respuesta=$userDao->registerUser($model);
    echo $respuesta;
}else if($op=="actualizar_Tipo"){
    $tipo = $_POST['tipo'];
    $id = $_POST['idusuario'];
    $respuesta = $userDao->actualizarCliente($tipo,$id);
    echo $respuesta;
}
?>