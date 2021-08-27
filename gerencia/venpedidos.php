<?php
  require_once("../clases/csesion.php");
  $sesion=new CSesion();
  $sesion->validarSesion();
  $conx=$sesion->conexion();
  $codU=$_SESSION['id'];
   require("../clases/cproducto.php");
   require("../clases/ventas/cpedidos.php");

    ini_set('date.timezone','America/Lima');
    $date = date('d/m/Y h:i:s a');
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

  <style media="screen">
        img{
            max-width: 250px;
            height: auto;
            border-radius: 10px;
        }
  </style>
  
</head>
<body class="hold-transition sidebar-mini">
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
            <h1 class="m-0 text-dark">--</h1>
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
          <!-- /.col-md-6 -->
     
          <!-- /.col-md-6 -->

            <!-- tabla oferta -->
            
                <div class="col-lg-12">
                    <div  class="card callout callout-gray">
                        <div  class="card-header">
                            <h5 class="card-title m-0 text-gray"><i class="fas fa-shopping-cart"></i> Pedidos</h5>
                        </div>
                        <div class="card-body" id="idListaPe">
                            <?=tablaPedidos($codU,$conx);?>
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

    <!-- Modal -->
    <div class="modal fade" id="idmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Advertencia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ¿Estás seguro de eliminar el registro?
        </div>
        <div class="modal-footer" id="idFooter">
            <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger">Eliminar</button>
        </div>
        </div>
    </div>
    </div>

      
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


<!--- funciones propias-->
 
</body>
</html>
