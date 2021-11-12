<?php
session_start();
if(isset($_SESSION['datosUser'])){
    $arreglo =  $_SESSION['datosUser'];
        for ($i=0; $i<count($arreglo); $i++) { 
                $usuario=$arreglo[$i]['tipo'];
            if($usuario=='Admin'){
                    header("Location: View/View-ListaUsuario.php");
            }
            if($usuario=='Cliente'){
                    header("Location: ../index.php");
            } 
        }   
}
?>