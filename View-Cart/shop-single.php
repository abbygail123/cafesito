<?php
include("../Feature/conexion.php");
if(isset($_GET['id'])){
  $resultado = $conexion->query("select p.idproducto,p.nombre,p.descripcion,p.precio_venta,i.url_imagen
            from producto p INNER JOIN imagen_producto i on i.idproducto=p.idproducto
            where p.idproducto=".$_GET['id']);
            if(mysqli_num_rows($resultado) > 0 ){
              $fila =  mysqli_fetch_row($resultado);
            }else {
              header("Locacion: ../index.php");
            }
}else{
  header("Locacion: ../index.php");
}
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
          <div class="col-md-6">
            <img src="<?php echo $fila[4];?>" alt="<?php echo $fila[1];?>" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $fila[1];?></h2>
            <p><?php  echo $fila[2]?></p>
            <p><strong class="text-primary h4">S/<?php echo $fila[3]?></strong></p>
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>
            </div>
            <p><a href="cart.php?id=<?php echo $fila[0];?>" class="buy-now btn btn-sm btn-primary">Añadir  al carrito</a></p>
          </div>
        </div>
      </div>
    </div>



    <!-- ofertas -->
    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Tank Top</a></h3>
                    <p class="mb-0">Finding perfect t-shirt</p>
                    <p class="text-primary font-weight-bold">$50</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                   
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Corater</a></h3>
                    <p class="mb-0">Finding perfect products</p>
                    <p class="text-primary font-weight-bold">$50</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Polo Shirt</a></h3>
                    <p class="mb-0">Finding perfect products</p>
                    <p class="text-primary font-weight-bold">$50</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">T-Shirt Mockup</a></h3>
                    <p class="mb-0">Finding perfect products</p>
                    <p class="text-primary font-weight-bold">$50</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <!--<img src="images/shoe_1.jpg" alt="Image placeholder" class="img-fluid">-->
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Corater</a></h3>
                    <p class="mb-0">Finding perfect products</p>
                    <p class="text-primary font-weight-bold">$50</p>
                  </div>
                </div>
              </div>
            </div>
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