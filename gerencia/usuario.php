<?php
require_once("../Config/database.php");
$cnx = new Conexion();
session_start();
$nombre  = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$base =$cnx->conexion();
$sql="select i.idimagen,i.url_imagen,i.idusuario from usuario u INNER JOIN imagen_usuario i on u.idusuario=i.idusuario
where u.nombre= '$nombre'";
$rs =  $base->query($sql);
$reg = $rs->fetchObject();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap-Table---------------->
  <link rel="stylesheet" href="../plugins/bootstrap-table/bootstrap-table.min.css">

  <!-- iconos---->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- toastr---->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">

   <!-- file input-->
   <link media="all" rel="stylesheet" type="text/css" href="../plugins/file-input/css/fileinput.css"  />

  <link rel="stylesheet" href="usuario.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  
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
              <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
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
              <img src="../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
          <a class="nav-link"  href="venta.php">
            <i  class="fas fa-shopping-bag"></i>
                    <span class="badge badge-warning navbar-badge"><?php
                        if(isset($_SESSION['carrito'])){
                            echo count($_SESSION['carrito']);
                        }else{
                            echo 0;
                        }
                      ?>
                    </span>
          </a>
      </li>
      
    </ul>
     <!-- menu agregado cierre de session--> 
   <ul class="navbar-nav">
     <li class="dropdown user user-menu" style="margin-left:10px">
            <a href="" class="text-danger dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-user-circle"></i>
               <span><?php echo $_SESSION['usuario'];?></span>
            </a>
            <ul class="dropdown-menu" style="width:120px">
              <!-- User image -->
              <li class="user-header" style="margin-bottom:-35px">
               <img src="<?php echo $reg->url_imagen ?>" class="img-circle" alt="<?php echo $_SESSION['id'];?>">
                <p>
                 <?php echo $_SESSION['nombre'] ." ". $_SESSION['apellido'];?>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="float-left ">
                  <a href="perfil.php" class="btn btn-info btn-sm"><i class="far fa-address-card"></i></a>
                </div>
                <div class="float-right">
                  <a href="../cerrarSesion.php" class="btn btn-danger btn-sm center-block"><i class="fas fa-sign-out-alt"></i></a>
                </div>
              </li>             
  </nav>
  
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
          <img src="<?php  echo $reg->url_imagen; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="perfil.php" class="d-block"><?php  echo $nombre ." ". $apellido ?></a>
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
                <a href="distrito.php" class="nav-link">
                  <i class="fas fa-map-marker-alt nav-icon"></i>
                  <p>Distrito</p>
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
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div id="ff" class="col-lg-5" style="display:none;">
              <div class="card card-primary card-outline">
                  <div class="card-header">
                  Foto
                  </div>
                  <div class="card-body">
                    <!-- <div class="row">                    
                      <div class="col-12 text-center">
                        <img src="../fotos/gaga.jpg" alt="user-avatar" class="img-fluid">
                      </div>
                    </div> -->
                    <div class="row">
                      <div class="col-12 text-center">
                        <input id="input-id" name="n-input-id[]" type="file" class="file"  data-theme="fas">
                        <input id="idRuta" type="hidden">
                      </div>
                    </div>
                  </div>
                
              </div>          
            </div>
          <div class="col-lg">

           
          <!-- /.col-md-6 -->
     
        <div class="row">
          <div class="col-lg-12">
             <div class="card card-primary card-outline">
                 <div class="card-header">
                   <h5 class="m-0">Datos de los Clientes</h5>
        <table class="table table-striped table-hover">
			    <thead>
				    <tr>
					    <th>Cod</th>
					    <th>Nombre </th>
					    <th>Apellido</th>
					    <th>Dni</th>
					    <th>Telefono</th>
					    <th colspan="2">Tipo Usuario</th>
			      </tr>
			    </thead>
			    <tbody id="listaUsuario">
			    </tbody>
		    </table>
                 </div>
                 <div class="card-body" id="idLista">
                 </div>
             </div> 
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</body>
</html>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Bootstrap-Table---------------->
<script src="../plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="../plugins/bootstrap-table/locale/bootstrap-table-es-ES.min.js"></script>

<!----- toastr--->
<script src="../plugins/toastr/toastr.min.js"></script>

<!-- file-input-->
<script src="../plugins/file-input/js/fileinput.js" type="text/javascript"></script>
<script src="../plugins/file-input/themes/fas/theme.js"></script>

<!--- funciones propias-->
<script src="../js/cliente.js"></script>
</body>
<script>listaUsuario()</script>
</html>