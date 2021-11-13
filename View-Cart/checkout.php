<?php
session_start();
if(!isset($_SESSION['carrito'])){
    header('Location: ../index.php');
}
$arreglo = $_SESSION['carrito'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
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
        <div class="row"  style="justify-content:center">
            <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black" style="text-align:center;">Tus Productos</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <tr><th>Nombre Producto</th>
                      <th>Total</th>
                    </tr></thead>
                    <tbody>

                    <?php 
                      $total=0;
                      for ($i=0; $i<count($arreglo); $i++) { 
                        $total =$total+($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']);
                    ?>
                      <tr>
                        <td style="font-size: 15px;font-weight: bold;"><?php echo $arreglo[$i]['Nombre'];?></td>
                        <td style="font-size: 15px;font-weight: bold;">S/<?php echo $arreglo[$i]['Precio'];?></td>
                      </tr>
                     <?php } ?>
                     <tr>
                        <td style="font-size: 18px;font-weight: bold;">Total Pagar</td>
                        <td style="font-size: 18px;font-weight: bold;">S/<?php echo number_format($total,2,'.','');?></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="form-group">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='thankyou.php'">Finalizar Compra</button>
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