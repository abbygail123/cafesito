<?php 
session_start();
error_reporting(0);
?>
<header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
    
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.php" class="js-logo-clone">Mi Tienda</a>
              </div>
            </div>
            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <?php 
                        if(!isset($_SESSION['datosUser'])){?>
                          <li><a href="View/View-Login.php"><span class="icon icon-person"></span></a></li>
                  <?php  } ?>
                        <?php
                        if(isset($_SESSION['datosUser'])){?>
                  <li><a href="cerrarSesion.php"><span class="icon icon-sign-out"></span></a></li>
                        <?php }?>
                  <li>
                    <a href="View-Cart/cart.php" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count">
                      <?php
                          if(isset($_SESSION['carrito'])){
                              echo count($_SESSION['carrito']);
                          }else{
                            echo 0;
                          }
                      ?>
                      </span>
                    </a>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>
          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="#">Catalogue</a></li>
            <li><a href="#">New Arrivals</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
      </nav>
    </header>