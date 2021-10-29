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
    $op="";
}else if($op=="actualizar_Tipo"){
    $tipo = $_POST['tipo'];
    $id = $_POST['idusuario'];
    $respuesta = $userDao->actualizarCliente($tipo,$id);
    echo $respuesta;
    $op="";
}else if($op=="eliminar"){
    $id_usuario = $_POST['idusuario'];
    $respuesta = $userDao->eliminarUsuario($id_usuario);
    echo $respuesta;
    $op="";
}else if($op=="listar_Usuarios"){
    $rs = $userDao->listarCliente();
$resultado="";
while($reg=$rs->fetchObject()){
	$resultado.="<tr>
					<td>#$reg->idusuario</td>
					<td>$reg->nombre</td>
					<td>$reg->apellido</td>
					<td>$reg->dni</td> 
					<td>$reg->telefono</td>
          <td>$reg->tipo</td>
					<td colspan='2'>
<a href='#' style='color:red;' onclick='eliminarUsuario($reg->idusuario)'><i class='material-icons'data-toogle='tooltip' title='Delete'>delete_forever</i></a>
<a href='#' style='color:blue;' onclick='verDatosCliente($reg->idusuario)'><i class='material-icons'data-toogle='tooltip' title='Edit'>edit</i></a>
               
                </td>
            </tr>
                    ";                  
}
echo $resultado;
}else if($op=="obtener_Datos_Usuario"){
    $id = $_POST['id_user'];
    $data = $userDao->obtener_Datos($id);
    echo json_encode($data);
}else if($op=="actualizar_cliente"){
    $id=$_POST['id'];
    $tipo=$_POST['tipo'];
    $update = $userDao->editar_Tipo_Cliente($id,$tipo);
    echo $update;
}
?>