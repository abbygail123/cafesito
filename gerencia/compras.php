<?php
  require_once("../clases/csesion.php");
  $sesion=new CSesion();
  $sesion->validarSesion();
  $conx=$sesion->conexion();
   require("../clases/ccompras.php");
   $codU=$_SESSION['id'];
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
            <h1 class="card-title m-0 text-danger">Compras </h1>
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
          <div class="card col-sm-6">
            <h6 class="text-gray mt-2 mb-3">Buscar por fechas:</h6>
            <form action="buscarcompras.php" method="post" class="input-group input-group-sm mb-3">
                <h6 class="text-gray">De: </h6>
                <input style="color:gray;margin:-5px 10px 0 5px" type="date" name="fecha_de" id="fecha_de"  required>
                <h6 class="text-gray">A: </h6>
                <input style="color:gray;;margin:-5px 0 0 5px" type="date" name="fecha_a" id="fecha_a"  required>
                
                <div class="input-group-append right" style="margin-top:-6px">
                    <button class="btn" type="submit">
                        <i class="text-danger fas fa-search"></i>
                    </button>
                </div>
            </form>          
          </div>
        </div>
          <!-- /.col-md-6 -->
            <!-- tabla oferta -->
        
                <div class="col-lg">
                    <div  class="callout callout-danger">
                        <div class="card-body" id="idListaC">
                            <?=tablaCompras($codU,$conx);?>
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
 <div class="modal fade" id="idmodaloferta-lg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <label for="idnomproducto">Producto(s)</label>
                    <table  data-toolbar="#toolbar" data-toggle='table' class="table table-bordered text-center" data-height="200" id="tablapro" data-show-footer="true">
                      <thead class="thead-light">
                        <tr>
                        <th data-field="state" data-checkbox="true"></th><th id="pr" data-field="cod">Código</th><th data-field="producto">Producto</th><th data-field="precioI" data-footer-formatter="priceFormatter">Prec. U.</th>
                        </tr>
                      </thead>
                      <tbody>
                         
                      </tbody>
                    </table>
              </div>
              <div class="form-group mt-5">
                
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
<script src="../js/oferta.js"></script>


</body>
</html>
