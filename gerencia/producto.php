<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Tienda-Producto</title>
  <!-- <link rel="stylesheet" href="../plugins/bootstrap5/css/bootstrap.css"> -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <!-- iconos---->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<style>

img{
    height: 80px;
    width: 80px;
    object-fit: cover;
    border-radius: 10px;
   }
</style>
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
    <form  enctype="multipart/form-data">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg">
            <div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="m-0">Registro de Producto</h5>
              </div>
              <div class="card-body">
                 <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombre Producto</label>
                        <input autocomplete="off" type="text" class="form-control" id="nombre_producto">
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="form-group">
                        <label>Descripción</label>
                        <textarea  placeholder="Ingresar..." class="form-control" id="descripcion"></textarea>
                      </div>
                    </div>
                  </div>   
                  <!--imagen-->
                  <form action="" method="post">
                  <div class="row">  
                  <div class="form-group col-sm-8">
                    <label>Imagen</label>
                    <input style="padding:1px;"id="file" class="form-control" type="file">
                  </div>
                  <div class="form-group">
                  <div class="form-floating">
                  <div id="preview"></div>
                  </div> 
                  </div>
                </form>
                  </div>   
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Categoria</label> <br>
                        <select  id='categoria_producto' class='form-control' name='categoria_producto' required>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                       <div class="form-floating">
                        <label for="precio_compra">P.Compra</label>
                        <input type="number"  class="form-control" id="precio_compra" name="precio_compra" autocomplete="off">
                    </div> 
                      </div>
                    </div>
                    <div class="col-sm-2">
                       <div class="form-floating">
                      <label for="precio_venta">P.Venta</label>
                      <input style="text-transform:uppercase;" type="number" class="form-control" id="precio_venta" name="precio_venta">
                       </div> 
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                          <label for="stock">Stock</label>
                          <input type="number" class="form-control" id="stock" name="stock" autocomplete="off">
                      </div>
                    </div>
                  </div>  
                </div>
                 <!--
                  <div class="row">
                    <div class="form-group col-sm">
                      <label for="idMarca">¿Quieres añadir ofertas?</label>
                      <div class="icheck-material-purple">
                        <input type="radio" value="1" name="nOferta" id="idOferta">
                        <label for="idOferta">Sí</label>
                      </div>
                      <div class="icheck-material-deeppurple">
                        <input type="radio" value="2" name="nOferta" id="idOferta2">
                        <label for="idOferta2">Aún No</label>
                      </div>
                    
                    </div>
                  </div>
              </div>
                -->
              <div class="card-footer">
                  <a href="producto.php" type="button" class="btn btn-danger float-left" id="cancelar" style="display:none;">Cancelar</a>
                  <button type="button" class="btn btn-primary float-right" id="buGuardar" onclick="guardarProducto();" value="0">Guardar Aqui</button>
              </div>
            </div>
          </form>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <div class="row">
          <div class="col-lg-12">
             <div  class="callout callout-danger card collapsed-card">
                 <div  class="card-header">
                 </div>
                   <h3 class="card-title m-0" style="color:crimson"><i class="fas fa-table"></i> Tabla de Productos</h3>
                   <table class="table table-striped table-hover">
			                    <thead>
				                      <tr>
					                      <th>#Cod</th>
					                      <th>Nombre</th>
                                <th>Descripcion</th>
					                      <th>Cantidad</th>
                                <th>Precio-Compra</th>
                                <th>Precio-Venta</th>
                                <th>Imagen</th>
                                <th>Categoria</th>
                                <th>Sub-Categoría</th>
					                      <th colspan="2">Acciones</th>
			                        </tr>
			                    </thead>
			                    <tbody id="listar_Producto">
			                    </tbody>
		                  </table>
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
   <!-- MODAL PRODUCTO-VER -->
   <div class="modal fade" id="modal_producto_ver" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" style="color:crimson;" id="exampleModalLabel"><i class="fas fa-gifts"></i> Producto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg">
            <div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="m-0">Actualizar Producto</h5>
              </div>
              <div class="card-body">
                 <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <input type="hidden" id="modal_id" value="" name="modal_id">
                      <div class="form-group">
                        <label>Nombre Producto</label>
                        <input autocomplete="off" type="text" class="form-control" id="modal_nombre">
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control" id="modal_descripcion"></textarea>
                      </div>
                    </div>
                  </div>   
                  <!--imagen-->
                  <div class="row">  
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Categoria</label> <br>
                        <input type="text"  class="form-control" id="modal_categoria" name="modal_categoria" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Sub Categoria</label> <br>
                        <input type="text"  class="form-control" id="modal_sub" name="modal_sub" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                       <div class="form-floating">
                        <label for="modal_compra">Precio </label>
                        <input type="number"  class="form-control" id="modal_compra" name="modal_compra" autocomplete="off">
                    </div> 
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                       <div class="form-floating">
                        <label for="modal_venta">Precio Venta</label>
                        <input type="number"  class="form-control" id="modal_venta" name="modal_venta" autocomplete="off">
                    </div> 
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                          <label for="modal_stock">Stock</label>
                          <input type="number" class="form-control" id="modal_stock" name="modal_stock" autocomplete="off">
                      </div>
                    </div>
                  </div>  
                  
                  <div class="form-group">
					            <label for="modal_imagen" >Imagen Del Producto</label> <br>
					            <img  id="modal_imagen" name="modal_imagen" src=""> 
			          	</div>
        		      <input type= "file" id="modal_src" name="src"  value="Escoger Imagen" class="">  
                  </div>
                  </div>
                  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button class="btn btn-primary" type="button" onclick="actualizar_Producto()">Guardar Cambios</button>
      	</div>	
        </div>
    </div>
  </div>
   <!-- MODAL PRODUCTO-VER -->
  <!-- Modal OFERTAS -->
 <div class="modal fade" id="GA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                
                  <div id="toolbar">
                    <button id="button" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                  </div>
                    <table  data-toolbar="#toolbar" data-toggle='table' class="table table-bordered text-center"  id="tablapro">
                      <thead class="thead-light">
                        <tr>
                        <th data-field="state" data-checkbox="true"></th><th id="pr" data-field="cod">Código</th><th data-field="producto">Producto</th><th data-field="precioI" >Prec. U.</th>
                        </tr>
                      </thead>
                      <tbody>
                         
                      </tbody>
                    </table>
              </div>
              <div class="form-group mt-5">
                  <label for="idPrecio_inicial">Precio Inicial</label>
                  <input id="idPrecio_inicial" class="form-control" type="number" readOnly>
              </div>
              <div class="form-group">
                  <label for="idDescuento">Descuento</label>
                  <input id="idDescuento" min="1" class="form-control" type="number" onchange="calcularDes();">
              </div>
              <div class="form-group">
                  <label for="idPrecio_total">Precio Total</label>
                  <input id="idPrecio_total" class="form-control" type="number" readOnly >
              </div>
      
          </div>
          <div class="modal-footer" id="idFooterOferta">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-info"  onclick="agregarOferta();">Agregar</button>
          </div>
        </div>
    </div>
  </div>  </div>
        </div>
    </div>
  </div>
  <a id="back-to-top" href="#" class="btn btn-danger btn-xs back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
  </a>


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
<script src="../js/producto.js"></script>
<script src="../js/oferta.js"></script>
<script>listar_ComboBox_Producto()</script>
<script>listar_Producto()</script>
</body>
</html>
