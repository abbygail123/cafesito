<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-bell"></i>
          <span class="badge badge-success navbar-badge">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img  alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img  alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="venpedidos.php" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications carrito de compras Menu -->
      <li class="nav-item dropdown">
          <a class="nav-link"  href="venta.php">
            <i  class="fas fa-shopping-bag"></i>
                    <!--<span class="badge badge-warning navbar-badge"><?php
                        /*if(isset($_SESSION['carrito'])){
                            echo count($_SESSION['carrito']);
                        }else{
                            echo 0;
                        }*/
                      ?>
                      
                    </span> -->
          </a>
      </li>
    </ul>
     <!-- menu agregado--> 

   <ul class="navbar-nav">

    <?php 
     $arreglo =  $_SESSION['datosUser'];
     for ($i=0; $i<count($arreglo); $i++) { 
    ?>
    <li class="dropdown user user-menu" style="margin-left:10px">
            <a href="" class="text-danger dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-user-circle"></i>
               <span> <?php echo $arreglo[$i]['usuario'];?></span>
            </a>
            <ul class="dropdown-menu" style="width:120px">
              <!-- User image -->
              <li class="user-header" style="margin-bottom:-35px">
                 <img src="<?php echo $arreglo[$i]['url'];?>" class="img-circle" alt="">
                <p>
                <?php echo $arreglo[$i]['nombre'] ." ". $arreglo[$i]['apellido'];?> 
                </p>
    </li>
    <?php } ?>
              <br>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <!--<div class="float-left ">
                  <a href="#" class="btn btn-info btn-sm"><i class="far fa-address-card"></i></a>
                </div>-->
                <div class="float-right">
                  <a href="../cerrarSesion.php" class="btn btn-danger btn-sm center-block"><i class="fas fa-sign-out-alt"></i></a>
                </div>
              </li> 
              <!-- <a class="nav-link" href="../login/login.php">
          <i class="text-danger fas fa-sign-out-alt"></i>
      </a> -->
                        
  </nav>
</body>
</html>