<?php
session_start();
unset($_SESSION['datosUser']);
session_destroy();
if(!isset($_SESSION['datosUser'])){
    header("Location: View/View-Login.php");
}

?>