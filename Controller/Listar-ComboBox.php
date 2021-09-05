<?php
require_once("../DataAccessObject/CategoriaDAO.php");
$comboBox = new CategoriaDAO();
$rs = $comboBox->listarCategoria();
$result="";
while($reg=$rs->fetchObject()){
      $result.="
      <option name='combo' id='combo' value='$reg->idcategoria'>$reg->categoria</option>
      ";
}
echo $result;