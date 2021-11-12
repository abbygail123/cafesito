<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="Content/fonts/icomoon/style.css">
    <link rel="stylesheet" href="Content/css/bootstrap.min.css">
    <link rel="stylesheet" href="Content/css/magnific-popup.css">
    <link rel="stylesheet" href="Content/css/jquery-ui.css">
    <link rel="stylesheet" href="Content/css/owl.carousel.min.css">
    <link rel="stylesheet" href="Content/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="Content/css/aos.css">
    <link rel="stylesheet" href="Content/css/style.css">
  </head>
  <body>
<style>
img.{
  heigh:100%; width:100%;object-fit:cover;align-items: flex-start;"
}
</style>
  <div class="site-wrap">
    <?php include("./SideContent/header.php"); ?> 
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-9 order-2">
            <div class="row mb-5">
            <?php 
            include ('Feature/conexion.php');
            $resultado = $conexion->query("select p.idproducto,p.nombre,p.descripcion,p.precio_venta,i.url_imagen
            from producto p INNER JOIN imagen_producto i on i.idproducto=p.idproducto");
            while($fila = mysqli_fetch_array($resultado)){
            ?>
            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border" style="height:340px;" >
                  <figure class="block-4-image">
                    <a href="View-Cart/shop-single.php?id=<?php  echo $fila['idproducto'];?>">
                    <img style="height:150px;width: 150px;;margin-top:15px;" src="<?php  echo $fila['url_imagen'];?>" alt="Image placeholder" >
                    </a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="shop-single.php?id=<?php echo $fila['idproducto'];?>"><?php  echo $fila['nombre'];?></a></h3>
                    <p class="mb-0"><?php  echo $fila['descripcion'];?></p>
                    <p class="text-primary font-weight-bold">$<?php  echo $fila['precio_venta'];?></p>
                  </div>
                </div>
              </div>
              <?php
                  }
            ?>
      </div>
    </div>
  </div>

  <script src="Content/js/jquery-3.3.1.min.js"></script>
  <script src="Content/js/jquery-ui.js"></script>
  <script src="Content/js/popper.min.js"></script>
  <script src="Content/js/bootstrap.min.js"></script>
  <script src="Content/js/owl.carousel.min.js"></script>
  <script src="Content/js/jquery.magnific-popup.min.js"></script>
  <script src="Content/js/aos.js"></script>
  <script src="Content/js/main.js"></script>
    
  </body>
</html>