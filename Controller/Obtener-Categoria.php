<?php
require_once("../DataAccessObject/CategoriaDAO.php");
$categoria = new CategoriaDAO();
$reg = $categoria->obtenerCategoria($_POST["idcategoria"]);
echo json_encode($reg);
?>