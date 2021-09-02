<?php
require_once("../Model/User.php");
require_once("../DataAccessObject/UserDAO.php");
$userDao = new UserDAO();
$op = $_POST['op'];
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
} elseif ($op == "modificarCliente") {
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $dni = $_POST['dni'];
    $dis = $_POST['dis'];
    $clave = $_POST['clave'];
    $foto = $_POST['foto'];
    $val = $_POST['val'];

    $salida = modificarCliente($usuario, $nombre, $telefono, $dni, $dis, $clave, $foto, $val, $conx);
    if ($salida == true) {
        $tabla = tablaClientes($conx);
    }

    $respuesta = array("mensaje" => $salida, "tabla" => $tabla);
    echo json_encode($respuesta);
} elseif ($op == "eliminarCliente") {
    $cod = $_POST['cod'];
    $salida = eliminarCliente($cod, $conx);
    if ($salida == true) {
        $tabla = tablaClientes($conx);
    }

    $respuesta = array("mensaje" => $salida, "tabla" => $tabla);
    echo json_encode($respuesta);
} elseif ($op == "usuario") {

    $codU = $_POST['codU'];
    $salida = usuario($codU, $conx);
    $respuesta = array("mensaje" => $salida);
    echo json_encode($respuesta);
}
?>
