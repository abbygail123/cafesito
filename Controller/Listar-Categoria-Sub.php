<?php
require_once("../DataAccessObject/CategoriaDAO.php");
$categoriaDAO = new CategoriaDAO();
$rs = $categoriaDAO->listarCategoria_subCategoria();
$resultado="";
while($reg=$rs->fetchObject()){
	$resultado.="<tr>
					<td>#$reg->idcategoria</td>
					<td>$reg->categoria</td>
					<td>$reg->nombre_sub</td>
					<td colspan='2'>
                    <button class='btn btn-info' type='button' onclick='verdatos($reg->idcategoria)'>Editar</button>
		            <button class='btn btn-danger' type='button' onclick='eliminar($reg->idcategoria)'>Eliminar</button>		
                    </td>
                </tr>
                    ";
}
echo $resultado;