<?php
session_start();
error_reporting(0);
include("../Feature/conexion.php");
$arreglo = $_SESSION['carrito'];
if(!isset($_SESSION['carrito'])){
    header('Locacion: index.php');
}
$total=0;
$fecha = date("Y-m-d h:m:s");
for ($i=0; $i<count($arreglo);$i++) { 
  $total = $total + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
  $conexion->query("insert into historial_venta(idproducto,idusuario,cantidad,precio,total,fecha) values(".$arreglo[$i]['Id'].",1,".$arreglo[$i]['Cantidad'].",".$arreglo[$i]['Precio'].",".$arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'].",'$fecha')");
}
unset($_SESSION['carrito']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="../Content/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../Content/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Content/css/magnific-popup.css">
    <link rel="stylesheet" href="../Content/css/jquery-ui.css">
    <link rel="stylesheet" href="../Content/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Content/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../Content/css/aos.css">
    <link rel="stylesheet" href="../Content/css/style.css">
  </head>
  <body>
  <div class="site-wrap">
   <?php include("../SideContent/header.php"); ?> 
    <div class="site-section">
      <div class="container">
        <div class="row">

        
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Gracias Por su Compra!</h2>
            <p class="lead mb-5">Tu compra a sido Completada Satisfactoriamente</p>
            <p><a href="../index.php" class="btn btn-sm btn-primary">Seguir Comprando</a></p>
          </div>
        </div>
      </div>
    </div>
    
    <?php include("../SideContent/footer.php"); ?> 
  </div>
  <script src="../Content/js/jquery-3.3.1.min.js"></script>
  <script src="../Content/js/jquery-ui.js"></script>
  <script src="../Content/js/popper.min.js"></script>
  <script src="../Content/js/bootstrap.min.js"></script>
  <script src="../Content/js/owl.carousel.min.js"></script>
  <script src="../Content/js/jquery.magnific-popup.min.js"></script>
  <script src="../Content/js/aos.js"></script>
  <script src="../Content/js/main.js"></script>
  </body>
</html>