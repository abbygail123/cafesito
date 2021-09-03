<?php
require_once("../DataAccessObject/UserDAO.php");
$data = new UserDAO();

$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];
//vacio = empty
// ! = diferente
if(!empty($usuario && $contraseña)){
    $data->LoginUser($usuario,$contraseña); 
}else{
    echo "<script>
      alert('por favor complete todos los campos');
      window.location= '../login/login.php'
      </script>";
}
?>