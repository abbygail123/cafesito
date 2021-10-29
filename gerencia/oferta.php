<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Tienda - Ofertas De Productos</title>
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="../plugins/bootstrap-table/bootstrap-table.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="../plugins/check/check/icheck-material.min.css">
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
            <h1 class="m-0 text-dark">Producto</h1>
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
          <div class="col-lg-6"style="" id="">

            <div class="card card-danger card-outline">
              <!-- combo box acá-->
              <div class="card-header">
                <h5 class="m-0">Registro</h5>
                
              </div>
              <div class="card-body">
              <select  id='listarProductoOferta' class='form-control' name='listarProductoOferta' onchange="SelectOptionProducto()" required >
                
              </select>
                 <div class="row">
                    <div class="col-sm">
                      <!-- text input -->
                      <div class="form-group">
                        <label label for="precioInicial">Precio Inicial</label>
                        <input id="precioInicial" class="form-control" type="number" readOnly>
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="form-group">
                        <label for="descu">Descuento</label>
                        <input id="descu" min="1" class="form-control" placeholder="%" type="number" onkeyup="AplicarDescuento();">
                      </div>
                    </div>
                  </div>   

                  <div class="row">
                    <div class="col-sm">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="pfinal">Precio Total</label>
                        <input id="pfinal" class="form-control" type="number" readOnly>
                      </div>
                    </div>
                    <div class="col-sm form-floating">
                        <label for="idTime">Duración</label>
                        <div class="input-group date" id="idTime" data-target-input="nearest">
                            <input type="text" name="fecha" id="idfecha" class="form-control datetimepicker-input" data-target="#idTime" placeholder=""/>
                            <div class="input-group-append" data-target="#idTime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                        </div>
                        
                    </div>
                  </div> 
              </div>
              <div class="card-footer">
                  <a href="oferta.php" type="button" class="btn btn-danger float-left"  style="">Cancelar</a>
                  <button type="button" class="btn btn-primary float-right" id="buGuardar" onclick="modificarOferta();" value="0">Guardar</button>
                </div>
            </div>
          </div>

   <!--OFERTAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA-->
<div class="col-lg-6"style="" id="">
<div class="card card-danger card-outline">
          <table class="table table-striped table-hover">
			          <thead>
				          <tr>
					          <th>#Cod</th>
					          <th>Nombre</th>
                    <th>Precio</th>
					          <th>Descuento</th>
                    <th>Precio-Venta</th>
                    <th>Imagen</th>
					          <th colspan="2">Acciones</th>
			            </tr>
			            </thead>
			            <tbody id="listar_Producto">
			            </tbody>
		            </table>

</div>
</div>
   <!--FIN OFERTA-->

          <!-- /.col-md-6 -->
            <!-- tabla oferta -->
                <div class="col-lg">
                    <div  class="callout callout-danger">
                        <div  class="card-header">
                            <h5 class="card-title m-0" style="color:crimson"><i class="fas fa-gift"></i> Oferta</h5>
                        </div>
                        <div class="card-body" id="idListaO">
                        <table class="table table-striped table-hover">
			                    <thead>
				                      <tr>
					                      <th>#Cod</th>
					                      <th>Nombre</th>
                                <th>Precio</th>
					                      <th>Descuento</th>
                                <th>Precio-Venta</th>
                                <th>Imagen</th>
					                      <th colspan="2">Acciones</th>
			                        </tr>
			                    </thead>
			                    <tbody id="listar_Producto">
			                    </tbody>
		                  </table>
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
<script src="../js/oferta.js"></script>
<script>listarProductoOferta();</script>

</body>
</html>