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
  <link rel="stylesheet" href="../Desing/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Desing/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap-Table---------------->
  <link rel="stylesheet" href="../Desing/plugins/bootstrap-table/bootstrap-table.min.css">
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <!-- iconos---->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- toastr---->
  <link rel="stylesheet" href="../Desing/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="../Desing/modalCategoria.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- /.navbar -->
  <?php include("../SideContent/navbar.php");?>
  <!-- Main Sidebar Container -->
  <?php include("../SideContent/sidebar.php");?>
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
                      <table class="table table-striped table-hover">
			                    <thead>
				                      <tr>
					                      <th>Cod</th>
					                      <th>Nombre Categoría </th>
					                      <th>Subcategorías</th>
					                      <th colspan="2">Acciones</th>
			                        </tr>
			                    </thead>
			                    <tbody id="listaCategoria_Sub">
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
  <?php include("../SideContent/footer.php");?>
  <!-- /.Main Footer -->

</div>

<!-- modal para la categoria boton editar categoria -->
<div id="modal-categoria" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog">
  <form action="../controlador/insertarVentaProducto.php"  method="post">
   <div class="modal-content">
        <div class="modal-header">
				<div class="modal-title">
					<h3>Categoria</h3>
				</div>
			</div>
			<div class="modal-body">
			<input type="hidden" id="idcategoria" value="" name="idcategoria">
				<div class="form-group">
					<label for="nombre_categoria" >Nombre Categoria</label>
					<input  type="text" class="form-control" name="nombre_categoria" id="nombre_categoria" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="nombre_subcategoria">Sub Categoria</label>
					<input type="text" class="form-control" name="nombre_subcategoria" id="nombre_subcategoria" value="" placeholder="">
				</div>
        </div>
          <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button class="btn btn-primary" id="delete" type="button" onclick="editarCategoria()">Editar</button>
      	</div>	
   </div>
  </form>
 </div>	
</div>
<!--termina el modal para la categoria-->
<!-- jQuery -->
<script src="../Desing/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../Desing/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../Desing/dist/js/adminlte.min.js"></script>
<!-- Bootstrap-Table---------------->
<script src="../Desing/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="../Desing/plugins/bootstrap-table/locale/bootstrap-table-es-ES.min.js"></script>

<!----- toastr--->
<script src="../Desing/plugins/toastr/toastr.min.js"></script>

<!--- funciones propias-->
<script src="../Service/Service-Categoria.js"></script>
<script>listarCategoriaComboBox()</script>
<script>listarCategoria_Sub()</script>
</body>
</html>
