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
                ";
                if($reg->tipo=="Admin"){
                    $resultado.="
                <select name='tipo' id='tipo' class='form-select' onchange='selectTipo($reg->idusuario);'>
                    <option value='$reg->idusuario'>Admin</option>
                    <option value='$reg->idusuario'>Cliente</option>
                </select>		
					</td>
				</tr>
                    ";
                }else if($reg->tipo=="Cliente"){
                    $resultado.="
                <select name='tipo' id='tipo' class='form-select' onchange='selectTipo($reg->idusuario)'>
                    <option value='$reg->idusuario'>Cliente</option>
                    <option value='$reg->idusuario'>Admin</option>
                </select>			
					</td>
				</tr>
                ";
                }
}
echo $resultado;