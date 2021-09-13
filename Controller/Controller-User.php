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
					<td colspan='2'>
<a href='#' style='color:red;' onclick='eliminarUsuario($reg->idusuario)'><i class='material-icons'data-toogle='tooltip' title='Delete'>delete_forever</i></a>
                    <select name='tipo' id='tipo' class='form-select' onchange='selectTipo($reg->idusuario);'>
                    <option disabled selected>$reg->tipo</option>
                  ";
                  if($reg->tipo=="Admin"){
                    $resultado.="
                    <option value='$reg->idusuario'>Cliente</option>
                  </select>	
                </td>
            </tr>
                    ";
                  }
                  if($reg->tipo=="Cliente"){
                    $resultado.="
                    <option value='$reg->idusuario'>Admin</option>
                  </select>	
                </td>
            </tr>
                    ";
                  }        
}
echo $resultado;
}
?>