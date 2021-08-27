<?php
   require_once("../clases/csesion.php");
   $sesion=new CSesion();
   $conx=$sesion->conexion();
   $codU=$_SESSION['id'];
  /*  require("boton.php");
   $dire=$_POST['dire'];
   $notas=$_POST['notas']; */

   require("../clases/cproducto.php");
   require("../clases/cdirec.php");
   require("../clases/cusuario.php");
 
    if(!isset($_SESSION['carrito'])){
        header("location: producto.php");
    }
    $mas=$_SESSION['cositas'];

    

    $total=0;
    $array=$_SESSION['carrito'];
    for($i=0;$i<count($array);$i++){
        $total=$total+($array[$i]['Precio'] * $array[$i]['Cantidad']);     
    }
    $dire= $_SESSION['dire'];
    $notas= $_SESSION['notas'];
    echo $dire;
     
    $fecha=date('Y-m-d');
    $conx->query("insert into comprobante (id_usuario,total,fecha,direccion,mensaje,estado) values ($codU,$total,'$fecha','$dire','$notas','proceso')") or die($conx->error);
        $id_comp = $conx->insert_id;

    for($i=0;$i<count($array);$i++){
        $conx->query("insert into detalle (id_comprobante,id_producto,cantidad,precio,subtotal) values ($id_comp,
        ".$array[$i]['Id'].",
        ".$array[$i]['Cantidad'].",
        ".$array[$i]['Precio'].",
        ".$array[$i]['Cantidad'] * $array[$i]['Precio'].")")or die($conx->error);
           
    }
   unset($_SESSION['carrito']);
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

</head>
<body >
<div class="wrapper mt-5">
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center mt-5">
            <span class="bi bi-check-circle display-3 text-info"></span>
            <h2 class="display-3 text-black">Gracias!</h2>
            <p class="lead mb-4">Su orden está completa, el vendedor se comunicará con usted.</p>
            <p><a href="producto.php" class="btn btn-sm btn-danger">Regresar</a></p>
          </div>
        </div>
      </div>
    </div>
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
