<?php 
include("../Feature/conexion.php");
session_start();
error_reporting(0);
if(isset($_SESSION['carrito'])){
  if(isset($_GET['id'])){
    $arreglo=$_SESSION['carrito'];
    $bandera=false;
    $numero=0;
    for($i=0;$i<count($arreglo);$i++){
      if($arreglo[$i]['Id']==$_GET['id']){
        $bandera=true;
        $numero=$i;
      }
    }
    if($bandera==true){
      $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad'];
      $_SESSION['carrito']=$arreglo;
    }else{
      //no hay registro
        $nombre="";
        $precio="";
        $imagen="";
        $resp = $conexion->query('select p.idproducto,p.nombre,p.descripcion,p.precio_venta,i.url_imagen
        from producto p INNER JOIN imagen_producto i on i.idproducto=p.idproducto
        where p.idproducto='.$_GET['id']) or die($conx->error);
        $prod = mysqli_fetch_row($resp);
        $nombre=$prod[1];
        $precio=$prod[3];
        $imagen=$prod[4];
        $arregloNuevo= array(
          'Id'=> $_GET['id'],
          'Nombre'=> $nombre,
          'Precio'=> $precio,
          'Imagen' => $imagen,
          'Cantidad'=> 1
        );
        array_push($arreglo,$arregloNuevo);
        $_SESSION['carrito']=$arreglo;

    }
  }
}else{
 if(isset($_GET['id'])){
   $nombre="";
   $precio="";
   $imagen="";
   $res = $conexion->query('select p.idproducto,p.nombre,p.descripcion,p.precio_venta,i.url_imagen
        from producto p INNER JOIN imagen_producto i on i.idproducto=p.idproducto
        where p.idproducto='.$_GET['id']) or die($conx->error);
   $prod = mysqli_fetch_row($res);
   $nombre=$prod[1];
   $precio=$prod[3];
   $imagen=$prod[4];
   $arreglo[]= array(
     'Id'=> $_GET['id'],
     'Nombre'=> $nombre,
     'Precio'=> $precio,
     'Imagen' => $imagen,
     'Cantidad'=> 1
   );
   $_SESSION['carrito']=$arreglo;
 }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="../Content/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../Content/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Content/css/magnific-popup.css">
    <link rel="stylesheet" href="../Content/css/jquery-ui.css">
    <link rel="stylesheet" href="../Content/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Content/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../Content/css/aos.css">
    <link rel="stylesheet" href="../Content/css/style.css">
  </head>
  <body>
  <div class="site-wrap">
  <?php include("../SideContent/header.php"); ?> 
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Imagen</th>
                    <th class="product-name">Producto</th>
                    <th class="product-price">Precio</th>
                    <th class="product-quantity">Cantidad</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remover</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $total = 0;
                if(isset($_SESSION['carrito'])){
                  $arregloCarrito = $_SESSION['carrito'];
                    for($i=0;$i<count($arregloCarrito);$i++){     
                      $total = $total + ($arregloCarrito[$i]['Precio']* $arregloCarrito[$i]['Cantidad']);
                ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="<?php echo $arregloCarrito[$i]['Imagen']; ?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $arregloCarrito[$i]['Nombre']; ?></h2>
                    </td>
                    <td>S/<?php echo $arregloCarrito[$i]['Precio']; ?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus btnIncrementar" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center txtCantidad"
                        data-precio="<?php echo $arregloCarrito[$i]['Precio']; ?>"
                        data-id="<?php echo $arregloCarrito[$i]['Id']; ?>"
                        value="<?php echo $arregloCarrito[$i]['Cantidad'];?>" 
                        placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus btnIncrementar" type="button">&plus;</button>
                        </div>
                      </div>
                    </td>
                    <td class="cant<?php echo $arregloCarrito[$i]['Id'];?>" >S/<?php echo $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad'];?> </td>
                    <td><a href="#" class="btn btn-primary btn-sm btnEliminar" data-id="<?php echo $arregloCarrito[$i]['Id'];?>">x</a></td>
                  </tr>
              <?php } } ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6">
                <button onclick="window.location='../index.php'" class="btn btn-outline-primary btn-sm btn-block">Continuar Comprando</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-primary btn-lg py-2 btn-block" onclick="window.location='checkout.php'">Comprar</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase" style="text-align: center">Total</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">S/<?php echo $total; ?></strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">S/<?php echo $total;?></strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include("../SideContent/footer.php"); ?> 
  </div>
  <script src="../Content/js/jquery-3.3.1.min.js"></script>
  <script src="../Content/js/jquery-ui.js"></script>
  <script src="../Content/js/popper.min.js"></script>
  <script src="../Content/js/bootstrap.min.js"></script>
  <script src="../Content/js/owl.carousel.min.js"></script>
  <script src="../Content/js/jquery.magnific-popup.min.js"></script>
  <script src="../Content/js/aos.js"></script>
  <script src="../Content/js/main.js"></script>     
  <script>
    $(document).ready(function(){
      $(".btnEliminar").click(function(event){
          event.isDefaultPrevented();
          var id = $(this).data('id');
          var boton = $(this);
          var operacion='eliminar';
          $.ajax({
              method: 'post',
              url:'../Feature/Controller-Cart.php',
              data:{'id':id,"operacion":operacion},
              success:function(data) {
                boton.parent('td').parent('tr').remove();
              }
          });
      });

      $(".txtCantidad").keyup(function(){
        var cantidad = $(this).val();
        var precio = $(this).data('precio');
        var id = $(this).data('id');  
        incrementar(cantidad,precio,id);
      });
      
      $(".btnIncrementar").click(function(){
          var precio = $(this).parent('div').parent('div').find('input').data('precio');
          var id = $(this).parent('div').parent('div').find('input').data('id');
          var cantidad = $(this).parent('div').parent('div').find('input').val();
          incrementar(cantidad,precio,id);
      });


      function incrementar(cantidad,precio,id){
        var mult = parseFloat(cantidad)* parseFloat(precio);
        $(".cant"+id).text("S/"+mult);
        var operacion='actualizar';
        $.ajax({
              method: 'post',
              url:'../Feature/Controller-Cart.php',
              data:{'id':id,"cantidad":cantidad,"operacion":operacion},
              success:function(data) {
                console.log(data);
                //boton.parent('td').parent('tr').remove();
              }
        });
      }


    });
</script>


  </body>
</html>