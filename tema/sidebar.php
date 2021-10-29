
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hola</title>
</head>
<body>
    
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="https://i1.wp.com/images.vexels.com/media/users/3/157021/isolated/preview/86855cd4f31cf0862070b279fb44cdd0-s--mbolo-de-flor-de-l--tus-estilizado-by-vexels.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-2"
           style="opacity: .8;margin-top:1px;">
      <span class="brand-text font-weight-ligh m-2" style="font-family:bebas neue; letter-spacing:4px">Tienda</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $_SESSION['url']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="perfil.php" class="d-block"><?php echo $_SESSION['nombre'] ." ". $_SESSION['apellido'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../gerencia/usuario.php" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                inicio
              </p>
            </a>
          </li>
          <li class="nav-item">
         
            <a href="" class="nav-link">
              <i class="nav-icon far fa-building"></i>
              <p>
                Gerencia
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="categoria.php" class="nav-link">
                  <i class="fas fa-shapes nav-icon"></i>
                  <p>Categorías</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="producto.php" class="nav-link">
                  <i class="fas fa-tshirt nav-icon"></i>
                  <p>Producto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="oferta.php" class="nav-link">
                  <i class="fas fa-gift nav-icon"></i>
                  <p>Ofertas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="usuario.php" class="nav-link">
                  <i class="fas fa-user-circle nav-icon"></i>
                  <p>Usuario</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- --------- -->
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="venpedidos.php" class="nav-link">
                  <i class="text-success far fa-circle nav-icon"></i>
                  <p>Pedidos <span class="badge badge-success right">0</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="text-teal far fa-circle nav-icon"></i>
                  <p>Venta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="text-danger far fa-circle nav-icon"></i>
                  <p>Deuda</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="text-info far fa-circle nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>   
            </ul>          
          </li>
          <li class="nav-item">
            <a href="compras.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-basket"></i>
              <p>
                Compras
                <span class="right badge badge-warning">C</span>
              </p>
            </a>
          </li>
        </ul> 
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</body>
</html>