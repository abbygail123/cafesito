<?php
   require_once("../clases/csesion.php");
   $sesion=new CSesion();
   $conx=$sesion->conexion();
   $codU=$_SESSION['id'];
  

   require("../clases/cproducto.php");
   require("../clases/cdirec.php");
   require("../clases/cusuario.php");
   /* $dire=$_POST['dire'];
   $notas=$_POST['notas'];
   $_SESSION["dire"]=$dire;
   $_SESSION["notas"]=$notas;
  alert($codU);    */

   if(!isset($_SESSION['carrito'])){
      header('location: venta.php');
   }
   $array=$_SESSION['carrito'];
  /*  $dire=$_SESSION['dire'];
   $notas=$_SESSION['notas']; */

   ////////
  /*  if(isset($_POST['boton'])){
        $dire=$_POST['dire'];
        $notas=$_POST['notas'];

        if(!isset($_SESSION['carrito'])){
            header("location: producto.php");
        }

        $total=0;
        $array=$_SESSION['carrito'];
        for($i=0;$i<count($array);$i++){
            $total=$total+($array[$i]['Precio'] * $array[$i]['Cantidad']);     
        }
        $fecha=date('Y-m-d');
        
        $query="insert into comprobante (id_usuario,total,fecha,direccion,mensaje) values ($codU,$total,'$fecha','$dire','$notas')";
            if(mysqli_query($conx,$query))
            {
                return $id_comp=mysqli_insert_id($conx);
            }
            else{
                return false;
            }

        for($i=0;$i<count($array);$i++){
            $query="insert into detalle (id_comprobante,id_producto,cantidad,precio,subtotal values ($id_comp,
            ".$array[$i]['Id'].",
            ".$array[$i]['Cantidad'].",
            ".$array[$i]['Precio'].",
            ".$array[$i]['Cantidad'] * $array[$i]['Precio'].")";
            if(mysqli_query($conx,$query))
            {
                return true;
            }
            else{
                return false;
            }     
        }




   } */
   
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


  <link rel="stylesheet" href="venta.css">
</head>
<body class="hold-transition sidebar-mini" onload="usuarios('<?php echo $codU;?>');">
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
            <h4 class="m-0 text-navy" style="letter-spacing: 2px">Carrito de compras</h4>
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
          <div class="col-lg-5">
             <div class="card card-primary card-outline">
                 <div class="card-header">
                    <h5 class="m-0 text-center text-gray">Usuario</h5>
                 </div>
                 <div class="card-body">
                      <div class="row">
                          <div class="col-sm">
                            <div class="form-group">
                              <label>Usuario</label>
                              <input type="text" class="form-control" id="us" readonly>
                            </div>
                          </div>
                      </div>  
                      <div class="row">
                          <div class="col-sm">
                            <div class="form-group">
                              <label>Nombre Completo</label>
                              <input type="text" class="form-control" id="nombrec" readonly>
                            </div>
                          </div>
                      </div> 
                      <div class="row">
                          <div class="col-sm">
                            <div class="form-group">
                              <label>Telefono</label>
                              <input type="text" class="form-control" id="telefono" readonly>
                            </div>
                          </div>
                          <div class="col-sm">
                            <!-- text input -->
                            <div class="form-group">
                              <label>Dni</label>
                              <input type="text" class="form-control" id="dni" readonly>
                            </div>
                          </div>
                      </div>
                      <div class="row">   
                          <div class="col-sm">
                            <div class="form-group">
                              <label>Distrito</label>
                              <?=comboDistrito($conx);?>
                            </div>
                          </div>
                      </div>
                       <div class="row">
                          <div class="col-sm">
                            <div class="form-group">
                              <label>Direccion<span class="text-danger">*</span></label>
                              <input type="text" class="form-control" name="dire" id="dire" required>
                            </div>
                          </div>
                       </div>  
                 </div>
                 <div class="card-footer">
                    <label for="notas" class="text-gray">Mensaje</label>
                    <textarea name="notas" id="notas"  class="form-control" placeholder="Escribe un mensaje aquí..."></textarea>
                 </div>
             </div>             
          </div>
       
          <div class="col-lg">
             <div class="card card-info card-outline">
                    <div class="card-header">
                        <h5 class="text-gray text-center">Tu Orden</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Producto</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                <?php
                                    $total=0;
                                    for($i=0;$i<count($_SESSION['carrito']);$i++){
                                        $total= $total+($_SESSION['carrito'][$i]['Precio']*$_SESSION['carrito'][$i]['Cantidad']);
                                ?>
                                <tr>
                                    <td><?php echo $_SESSION['carrito'][$i]['Nombre'];?> <strong class="mx-2">x</strong> <?php echo $_SESSION['carrito'][$i]['Cantidad'];?></td>
                                    <td>$ <?php echo number_format($_SESSION['carrito'][$i]['Precio']* $_SESSION['carrito'][$i]['Cantidad'],2,'.','');?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                                
                                <tr>
                                    <td class="text-black font-weight-bold"><strong>Orden Total</strong></td>
                                    <td class="text-black font-weight-bold"><strong>$ <?php echo number_format($total,2,'.','') ;?></strong></td>
                            </tr>
                            </tbody>
                        </table>
                      
                      <hr>
                     
                     <button class="btn bg-info btn-block btn-lg mt-5 mb-5" name="boton" data-toggle="modal" data-target="#idModal" onclick="window.location='fin.php'">Finalizar</button>

                 </div>
             </div>
             <div class="card card-info card-outline">
                <div class="card-header">
                    <h5 class="text-gray text-center">Teléfonos de los Vendedores</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>Vendedor</td>
                          <td class="text-right">999-999-999</td>
                        </tr>
                        <tr>
                          <td>Vendedor</td>
                          <td class="text-right">999-999-999</td>
                        </tr>
                      </tbody>
                    </table>
                    <hr>
                </div>
             </div>
          </div>
         
          <!-- /.col-md-6 -->
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
<script src="../js/venta.js"></script>


</body>
</html>
