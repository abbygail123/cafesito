<?php
  require_once("../clases/csesion.php");
  $sesion=new CSesion();
  $sesion->validarSesion();
  $conx=$sesion->conexion();
   require("../clases/cproducto.php");
   require("../clases/coferta.php");
   require("../clases/ccategoria.php");

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
          <div class="col-lg">

            <div class="card card-danger card-outline">
              <div class="card-header">
                <h5 class="m-0">Registro</h5>
              </div>
              <div class="card-body">
                 <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Producto</label>
                        <input autocomplete="off" type="text" class="form-control" id="idProducto">
                      </div>
                    </div>
                    <div class="col-sm">
                      <div class="form-group">
                        <label>Descripción</label>
                        <textarea  placeholder="Ingresar..." class="form-control" id="idDescripcion"></textarea>
                      </div>
                    </div>
                  </div>   

                 <!--  <div class="row">  
                    <div class="form-group col-sm">
                        <label>Imagen</label>
                        <input type="file" class="form-control" id="idImag" name="nImag" accept="image/*" multiple>
                        <output id="list" style="margin-top:8px"></output>
                    </div>
                 
                  </div> -->          
                  <div class="row">
                  
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Categoria</label> <br>
                        
                        <?=comboCategoria($conx);?>
                      </div>
                    </div>
                  
                    <div class="col-sm-4" style="display:none;" id="sub">
                      <div class="form-group">
                        <label>SCategoria</label> <br>
                        <select class="form-control" name="" id="idSubC"></select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <!-- text input -->
                      <div class="form-group">
                 <!--      <div class="form-floating"> -->
                        <label for="idMarca">Marca</label>
                        <input type="text" class="form-control" id="idMarca" name="nMarca" autocomplete="off">
                  <!--    </div> -->
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <!--   <div class="form-floating"> -->
                      <label for="idTalla">Talla</label>
                      <input style="text-transform:uppercase;" type="text" class="form-control" id="idTalla" name="nTalla" autocomplete="off" disabled>
                      <!--   </div> -->
                    </div>
                  </div>  

                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                          <label for="idPrecio">Precio</label>
                          <input type="number" class="form-control" id="idPrecio" name="nPrecio" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-sm-4 form-floating">
                      <label for="idStock">Stock</label>
                        <input type="number" autocomplete="off" class="form-control" id="idStock" name="nStock">
                        
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="idtipo">Tipo</label>                          
                           <input name="ntipo" autocomplete="off" class="form-control" list="hola" id="idtipo" placeholder="Type...">
                              <datalist id="hola" name="ntipo" >
                                <option name="ntipo" value="Hombre">
                                <option name="ntipo" value="Mujer">
                                <option name="ntipo" value="Niño">
                                <option name="ntipo"value="Niña">
                                <option name="ntipo" value="Todos">
                              </datalist>
                      </div>
                    </div>
                  </div> 
                  
                  <!-- <div class="row">
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
                  </div> -->
              </div>
              
              <div class="card-footer">
                  <a href="producto.php" type="button" class="btn btn-danger float-left" id="cancelar" style="display:none;">Cancelar</a>
                  <button type="button" class="btn btn-primary float-right" id="buGuardar" onclick="guardarProducto();" value="0">Guardar</button>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <div class="row">
          <div class="col-lg-12">
             <div  class="callout callout-danger card collapsed-card">
                 <div  class="card-header">
                    
                   <h5 class="card-title m-0" style="color:crimson"><i class="fas fa-table"></i> Tabla</h5>
                   <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                      </button>
                      <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button> -->
                    </div>
                 </div>
                 <div class="card-body" id="idLista">
                     <button class="btn btn-outline-danger btn-sm" id="EliminarV">Eliminar</button>
                      <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#idmodaloferta-lg" id="Oferta" type="button" onclick="agregarPr();">Añadir oferta</button>
                     <?=tablaProductos($conx);?>
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
      
              <div class="form-group">
                    <label for="idTime">Duración</label>
                      <div class="input-group date" id="idTime" data-target-input="nearest">
                        <input type="text" name="fecha" id="fecha" class="form-control datetimepicker-input" data-target="#idTime" placeholder="<?=$date?>"/>
                        <div class="input-group-append" data-target="#idTime" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-calendar"></i></div>
                        </div>
                      </div>
              </div>
          </div>
          <div class="modal-footer" id="idFooterOferta">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-info"  onclick="agregarOferta();">Agregar</button>
          </div>
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


</body>
</html>
