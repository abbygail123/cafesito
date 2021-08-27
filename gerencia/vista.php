<?php
  require_once("../clases/csesion.php");
  $sesion=new CSesion();
  $conx=$sesion->conexion();
   require("../clases/cproducto.php");
   require("../clases/coferta.php");
    if(isset($_GET['isd'])){
        $resultado= $conx->query("select * from producto where id_producto=".$_GET['isd']) or die($conx->error);
        if(mysqli_num_rows($resultado)>0){
            $prod = mysqli_fetch_row($resultado);
        }else{
            header("location: producto.php");
        }
    }else{
        header("location: producto.php");
    }

    ///
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
                <!-- <h5 class="m-0">Registro</h5> -->
              </div>
              <div class="card-body">
                <div class="row">
                        <div class="col-md-6">
                            <img src="fotos/<?php echo $prod[7];?>" alt="<?php echo $prod[1];?>" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-black"><?php echo $prod[1];?></h2>
                            <p><?php echo $prod[2];?></p><p><?php echo $prod[11];?></p>
                            
                            <p><strong class="text-danger h5">Talla(s): <?php echo $prod[6];?></strong></p>
                            <p><strong class="text-warning h5">Stock: <?php echo $prod[9];?></strong></p>
                            <p><strong class="text-primary h4">$<?php echo $prod[8];?></strong></p>
                            <!-- <div class="mb-1 d-flex">
                              <label for="option-sm" class="d-flex mr-3 mb-3">
                                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" name="shop-sizes"></span> <span class="d-inline-block text-black">Small</span>
                              </label>
                              <label for="option-md" class="d-flex mr-3 mb-3">
                                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-md" name="shop-sizes"></span> <span class="d-inline-block text-black"><?php echo $prod[6];?></span>
                              </label>
                              <label for="option-lg" class="d-flex mr-3 mb-3">
                                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-lg" name="shop-sizes"></span> <span class="d-inline-block text-black">Large</span>
                              </label>
                              <label for="option-xl" class="d-flex mr-3 mb-3">
                                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="shop-sizes"></span> <span class="d-inline-block text-black"> Extra Large</span>
                              </label>
                            </div> -->
                            <p><a href="venta.php?id=<?php echo $prod[0];?>" class="buy-now btn btn-sm btn-info"><i class="fas fa-cart-plus"></i> Añadir a carrito</a></p>
                        </div>  
                          
                    </div>
                   
                    

                    
                  
                  
                  
              </div>
              
            
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
      
        <div class="row mb-1">
          <div class="col-lg-12">
              <textarea name="comentario" id="comentario"  class="col-lg-12"  rows="2"></textarea>
            
          </div>
          <div class="col-lg">
            
              <button  type="submit" class="btn btn-info btn-sm float-right " onclick="oferta();" value="comentar"> Publicar</button>
          </div>
        </div>
        <div class="row mt-2">

          <div class="col-lg-12">
             <div  class="callout callout-danger ">
                 <div  class="card-header">
                 <h5 class="card-title m-0" style="color:crimson"><i class="far fa-comments"></i> Comentarios</h5>
                
                 </div>
                 <div class="card-body" id="idListaOferta">
                  
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
    <div class="modal-dialog">
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
                  <?=comboProductos($conx);?>
                  <?=comboProductos($conx);?>
                  <?=comboProductos($conx);?>
                  <?=comboProductos($conx);?>
              </div>
              <div class="form-group">
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
              <button type="button" class="btn btn-info" id="bOferta" value="0" onclick="agregarOferta();">Agregar</button>
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
<script src="../js/producto.js"></script>
<script src="../js/oferta.js"></script>


</body>
</html>
