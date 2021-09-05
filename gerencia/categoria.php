<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Tienda</title>

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
            <h1 class="m-0 text-dark">Categorías</h1>
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
          <div class="col-lg-6">

            <div class="card card-dark card-outline">
                <div class="card-header">
                  <h5 class="m-0">Categoría</h5>
                </div>
                <div class="card-body">
                      <div class="form-group">
                          <label for="idCategoria"><b>Categoría</b></label>
                          <input type="text" id="iddCategoria" class="form-control" required>
                      </div>
                </div>

                <div class="card-footer">
                  <button type="button" id="botonca" onclick="guardarCategoria();" class="btn btn-dark mt-2 float-right" value="0"><b>Guardar</b></button>
                </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-dark card-outline">
                <div class="card-header">
                  <h5 class="m-0">Sub Categoría</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                          <div class="form-group">
                            <label>Categoría</label>
            <select  id='categoria' class='form-control' name='categoria' required>
                
           </select>
                  </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="idSub"><b>Sub Categoría</b></label>
                                <input type="text" id="idSub" class="form-control" required>
                            </div>
                      </div>
                    </div>
                </div>

                <div class="card-footer">
                  <button type="button" id="botonSub" onclick="guardarSub();" class="btn btn-dark mt-2 float-right" value="0"><b>Guardar</b></button>
                </div>
            </div>
          </div>
          <!-- /.col-md-6 --> 
              
        </div>
            <div class="row">
                <div class="col-lg">
                  <div class="card card-dark card-outline">
                      <div class="card-header">
                        <h5 class="m-0">Tabla</h5>
                      </div>
                      <div class="card-body" id="idLista">
                        
                      </div> 
                  </div> 
                </div>
            </div>
        
            <div class="row">
                <div class="col-lg">
                  <div class="card card-dark card-outline">
                      <div class="card-header">
                        <h5 class="m-0">Subcategorías</h5>
                      </div>
                      <div class="card-body" id="idListaSub">
                      
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
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Advertencia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de eliminar este registro ?
      </div>
      <div class="modal-footer" id="idfooter">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Eliminar</button>
      </div>
    </div>
  </div>
</div>
<!-- modal leiminar sub -->
<div class="modal fade" id="ModalS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Advertencia</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de eliminar este registro ?
      </div>
      <div class="modal-footer" id="idfooterS">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Eliminar</button>
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

<!--- funciones propias-->
<script src="../js/categoria.js"></script>
<script>listarCategoria()</script>

</body>
</html>
