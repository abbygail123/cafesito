<?php
require_once("../DataAccessObject/UserDAO.php");
$usuarioDAO = new UserDAO();
$rs = $usuarioDAO->listarCliente();
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