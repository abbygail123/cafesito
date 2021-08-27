<?php
   require_once("../clases/csesion.php");
   $sesion=new CSesion();
   $sesion->validarSesion();
   $conx=$sesion->conexion();
   $codU=$_SESSION['id'];
   $query="select count(id_usuario) as Can from usuario";
   $renum=mysqli_query($conx,$query);
   $rowUsu=mysqli_fetch_assoc($renum); 

   $queryc="select count(id_comprobante) as Can from comprobante where id_usuario=$codU";
   $rencom=mysqli_query($conx,$queryc);
   $rowCom=mysqli_fetch_assoc($rencom);
   
   $queryc="select count(id_producto) as Can from producto where id_usuario=$codU";
   $renprod=mysqli_query($conx,$queryc);
   $rowPro=mysqli_fetch_assoc($renprod);

   $queryc="select count(d.id_comprobante) as Can from comprobante c inner join detalle d on c.id_comprobante=d.id_comprobante inner join producto p on d.id_producto=p.id_producto where p.id_usuario=$codU";
   $renven=mysqli_query($conx,$queryc);
   $rowVen=mysqli_fetch_assoc($renven);

   $queryc="select count(total) as Can from comprobante c inner join detalle d on c.id_comprobante=d.id_comprobante inner join producto p on d.id_producto=p.id_producto where p.id_usuario=$codU";
   $resmon=mysqli_query($conx,$queryc);
   $rowMon=mysqli_fetch_assoc($resmon);

   $queryc="select * from producto where id_usuario=$codU order by id_producto desc limit 4";
   $resp=mysqli_query($conx,$queryc);
   //$rowP=mysqli_fetch_assoc($resmon);
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Tienda</title>
  <!-- <link rel="stylesheet" href="../plugins/bootstrap5/css/bootstrap.css"> -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
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

  <!--icheck---->
  <link rel="stylesheet" href="../plugins/check/check/icheck-material.min.css">

  <!--tempusdominus---->
  <link rel="stylesheet" href="../plugins/datetime/datetime/build/css/tempusdominus-bootstrap-4.min.css">

  <!-- chartjs -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">

  <style media="screen">
        img{
            max-width: 250px;
            height: auto;
            border-radius: 10px;
        }
  </style>
  
</head>
<body class="layout-fixed sidebar-mini dark-mode">
<div class="wrapper">

  <!-- Navbar -->
       <?php include("../tema/navbar.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
       <?php include("../tema/sidebar.php");?>
  <!-- /.Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
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
            <!-- <div class="col-lg-3 col-6">
              
                <div class="small-box bg-pink">
                  <div class="inner">
                    <h3><?php echo $rowUsu['Can']?></h3>

                    <p>usuarios</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user"></i>
                  </div>
                  <a href="usuario.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div> -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-purple elevation-1"><a href="usuario.php"><i class="fas fa-users"></i></a></span>

                <div class="info-box-content">
                  <span class="info-box-text">Usuarios</span>
                  <span class="info-box-number">
                  <?php echo $rowUsu['Can']?>
                
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </div>

            <!-- <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?php echo $rowCom['Can']?></h3>

                    <p>Pedidos</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-shopping-bag"></i>
                  </div>
                  <a href="compras.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div> -->

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><a href="compras.php"><i class="fas fa-shopping-bag"></i></a></span>
                <div class="info-box-content">
                  <span class="info-box-text">Compras</span>
                  <span class="info-box-number"><?php echo $rowCom['Can']?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-lightblue">
                <span class="info-box-icon"><a style="color:white" href="producto.php"><i class="fas fa-tshirt"></i></a></span>

                <div class="info-box-content">
                  <span class="info-box-text">Productos</span>
                  <span class="info-box-number"><?php echo $rowPro['Can']?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3 bg-olive">
                <span class="info-box-icon"><a style="color:#fff;" href="venpedidos.php"><i class="fas fa-cash-register"></i></a></span>

                <div class="info-box-content">
                  <span class="info-box-text">Pedidos</span>
                  <span class="info-box-number"><?php echo $rowVen['Can']?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
          </div>

        </div>
        <div class="row">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title text-danger">Productos agregados recientemente</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <?php
                    if(mysqli_num_rows($resp)>0){              
                ?>
                <ul class="products-list product-list-in-card pl-2 pr-2">
                      <?php while($rowP=mysqli_fetch_array($resp)){
                      ?>
                  <li class="item">
                    <div class="product-img">
                      <img src="<?php echo $rowP['imagen']?>" alt="<?php echo $rowP['imagen']?>" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title text-info"><?php echo $rowP['nombre_p']?>
                        <span class="badge badge-warning float-right">$<?php echo $rowP['precio']?></span></a>
                      <span class="product-description">
                        <?php echo $rowP['descripcion']?>
                      </span>
                    </div>
                  </li>
                 <?php }?>
                </ul>
                <?php } ?>
              </div>
           
              <div class="card-footer text-center">
                <a href="producto.php" class="uppercase text-danger">Ver todos los Productos</a>
              </div>
              <!-- /.card-footer -->
            </div>

         
        </div>
                        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include("../tema/footer.php");?>
  <!-- /.Main Footer -->

</div>
<!-- ./wrapper -->

  
      
  <!-- Modal OFERTAS -->
 <div class="modal fade" id="idmodaloferta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" style="color:crimson;" id="exampleModalLabel"><i class="fas fa-gifts"></i> Ofertas</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label for="idnomproducto">Producto(s):</label>
                    
              </div>
              <div class="form-group">
                <?=tablaDetalleO($conx);?>
              </div>
              <div class="row">
                <div class="col-sm">
                    <label for="codO">Códifo de oferta</label>
                    <input id="codO" class="form-control" type="number" readOnly>
                </div>
                <div class="col-sm">
                    <label for="prei">Precio Inicial</label>
                    <input id="prei" class="form-control" type="number" readOnly>
                </div>
                <div class="col-sm">
                  <label for="descO">Descuento</label>
                  <input id="descO" class="form-control" type="number" readOnly>
                </div>
              </div>
              <div class="row">
              <div class="col-sm">
                  <label for="prefO">Prefio Final</label>
                  <input id="prefO" class="form-control" type="number" readOnly>
                </div>
                <div class="col-sm">
                  <label for="venO">Vencimiento</label>
                  <input id="venO" class="form-control" type="text" readOnly>
                </div>
              </div>
              
          </div>
          <div class="modal-footer" id="idFooterOferta">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
             
          </div>
        </div>
    </div>
 
  </div>




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

<!----- moment time--->
<script src="../plugins/moment/moment-develop/min/moment-with-locales.min.js"></script>
<!----- tempus time--->
<script src="../plugins/datetime/datetime/build/js/tempusdominus-bootstrap-4.min.js"></script>

</body>
</html>
