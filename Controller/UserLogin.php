<?php
require_once("../DataAccessObject/UserDAO.php");
$data = new UserDAO();
$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];
if(!empty($usuario && $contraseña)){
    $data->LoginUser($usuario,$contraseña);
        session_start();
        if(isset($_SESSION['datosUser'])){
            $arreglo =  $_SESSION['datosUser'];
            for ($i=0; $i<count($arreglo); $i++) { 
                $tipo = $arreglo[$i]['tipo'];
                if($tipo=='Admin'){
                    header("Location: ../View/View-ListaUsuario.php");   
                }
                if($tipo=='Cliente'){
                    header("Location: ../index.php");    
                }
            }

        }
}else{
    header("location: ../View/View-Login.php?d=1");
}
?>