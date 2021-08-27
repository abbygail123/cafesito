<?php
   require_once("../clases/csesion.php");
   $sesion=new CSesion();
   $conx=$sesion->conexion();
 
   //require("../clases/ccliente.php");
   require("../clases/cproducto.php");
  
   if(isset($_SESSION['carrito'])){
      if(isset($_GET['id'])){
        $array=$_SESSION['carrito'];
        $bandera=false;
        $numero=0;
        for($i=0;$i<count($array);$i++){
          if($array[$i]['Id']==$_GET['id']){
            $bandera=true;
            $numero=$i;
          }
        }
        if($bandera==true){
          $array[$numero]['Cantidad']=$array[$numero]['Cantidad']+1;
          $_SESSION['carrito']=$array;
          header("location: ./venta.php");
        }else{
          //no hay registro
            $nombre="";
            $precio="";
            $imagen="";
            $resp=$conx->query('select * from producto where id_producto='.$_GET['id']) or die($conx->error);
            $prod = mysqli_fetch_row($resp);
            $nombre=$prod[1];
            $precio=$prod[8];
            $imagen=$prod[7];
            $arrayNuevo= array(
              'Id'=> $_GET['id'],
              'Nombre'=> $nombre,
              'Precio'=> $precio,
              'Imagen' => $imagen,
              'Cantidad'=> 1
            );
            array_push($array,$arrayNuevo);
            $_SESSION['carrito']=$array;
            header("location: ./venta.php");
        }
      }
   }else{
     if(isset($_GET['id'])){
       $nombre="";
       $precio="";
       $imagen="";
       $resp=$conx->query('select * from producto where id_producto='.$_GET['id']) or die($conx->error);
       $prod = mysqli_fetch_row($resp);
       $nombre=$prod[1];
       $precio=$prod[8];
       $imagen=$prod[7];
       $array[]= array(
         'Id'=> $_GET['id'],
         'Nombre'=> $nombre,
         'Precio'=> $precio,
         'Imagen' => $imagen,
         'Cantidad'=> 1
       );
       $_SESSION['carrito']=$array;
       header("location: ./venta.php");
     }
   }

   
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
          <div class="col-lg">

            <div class="card card-lightblue">
              <div class="card-header">
                <h5 class="m-0">Productos</h5>
              </div>
              <div class="card-body">
                  <table class="table table-bordered"  id='idCarrito' data-show-footer="true" >
                      <thead>
                          <tr>
                          <th class="text-align">#</th>
                          <th >Imagen</th>
                          <th class="product-name">Producto</th>
                          <th class="product-price">Precio</th>
                          <th class="product-quantity">Cantidad</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Eliminar</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                          $total = 0;
                          if(isset($_SESSION['carrito'])){
                            $arrayCarr[]=$_SESSION['carrito'];
                            for($i=0;$i<count($_SESSION['carrito']);$i++){
                              $total= $total+($_SESSION['carrito'][$i]['Precio']*$_SESSION['carrito'][$i]['Cantidad']);
                        ?>
                          <tr>
                            <td><?php echo $contador+=1;?></td>
                            <td class="product-thumbnail">
                              <img src="../fotos/<?php echo $_SESSION['carrito'][$i]['Imagen'];?>" alt="Image" class="img-fluid">
                            </td>
                            <td class="product-name">
                              <p class="text-black"><?php echo $_SESSION['carrito'][$i]['Nombre'];?></p>
                            </td>
                            <td id="bprecio">$<?php echo $_SESSION['carrito'][$i]['Precio'];?></td>
                            <td>
                              <div class="input-group mb-3" style="max-width: 120px;">
                               
                                <input data-precio="<?php echo $_SESSION['carrito'][$i]['Precio'];?>"
                                data-id="<?php echo $_SESSION['carrito'][$i]['Id'];?>"
                                 type="text" class="form-control text-center Cantidad" value="<?php echo $_SESSION['carrito'][$i]['Cantidad'];?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" >
                                
                              </div>

                            </td>
                            <td class="cant<?php echo $_SESSION['carrito'][$i]['Id']?>">$<?php echo $_SESSION['carrito'][$i]['Precio'] * $_SESSION['carrito'][$i]['Cantidad'];?></td>
                            <td class="text-center"><a href="" class="btn btn-danger btn-sm Eliminar" data-id="<?php echo $_SESSION['carrito'][$i]['Id'];?>"><i class='bi bi-trash'></i></a></td>
                          </tr>
                        <?php } } ?>
                      </tbody>
                  </table>
              </div>
            </div>
          </div>

          <div class="col-lg">
             <div class="card card-lightblue card-outline">
                    <div class="card-header">
                        <h3 class="text-gray text-center">RESUMEN</h3>
                    </div>
                    <div class="card-body">
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-gray">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <span class="text-gray">$<?php echo $total;?></span>
                        </div>
                      </div>
                      <hr>
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <strong>Total</strong>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong>$<?php echo $total;?></strong>
                        </div>
                      </div>
                        <div class="row">
                          <div class="col-md-12 text-center">
                            <button class="btn btn-info btn-lg btn-block mb-2" onclick="window.location='boton.php'">Continuar</button>
                            <a class="text-lightblue" href="producto.php"><i class=" fas fa-chevron-left" style="font-size:15px"></i> Agregar más productos</a>
                           </div>
                        </div>
                      
                     
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
