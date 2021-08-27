<?php
    require_once("../clases/csesion.php");
    $sesion=new CSesion();
    $conx=$sesion->conexion();
    require("../clases/cproducto.php");
    if(isset($_POST['idda'])){
        $registro=$_POST['idda'];
        foreach($registro as $reg){
             echo ("asd".$reg);
            $elimiR=('delete from producto where id_producto='.$reg);
            mysqli_query($conx,$elimiR); 
        }
        
    }
    

   /*  function obtCategoria(){
        $conx=mysqli_connect('localhost','root','','tienda');// CREO LA CONEXION
        $query="select * from categoria";
        $resultado=mysqli_query($conx,$query);
        $grupo = array();
        while($row=mysqli_fetch_array($resultado)){
           $grupo[]=array(
                'idCa'=> $row['id_categoria'],
                'nomCa'=> $row['categoria'],
            );
        }
         $gggg = json_encode($grupo);
         echo $gggg;
    } */

    function obtSubC($codiCategoria){
        $conx=mysqli_connect('localhost','root','','tienda');// CREO LA CONEXION
        $query="select * from subcategoria where id_categoria=$codiCategoria";
        $resultado=mysqli_query($conx,$query);
        
        $grupo=array();
        while($row=mysqli_fetch_array($resultado)){
            $grupo[]=array(
                 'idSub'=> $row['id_subcategoria'],
                 'nomSub'=> $row['subcategoria'],
             );
        }
        $gggg = json_encode($grupo);
        echo $gggg;
    }

    if(isset($_POST['codigo'])){
        $codiCategoria=$_POST['codigo'];
        obtSubC($codiCategoria);
    }
    /* else{
        obtCategoria();
    } */
    ///
    $op=$_POST['op'];
    if($op=="guardarProducto")
    {
        $prod=$_POST['prod'];
        $descr=$_POST['descr'];
        $cat=$_POST['cat'];
        $subc=$_POST['subc'];
        $marca=$_POST['marca'];
        $talla=$_POST['talla'];
        // $imagen=$_POST['imagen'];
        $precio=$_POST['precio'];
        $stock=$_POST['stock'];
        $tipo=$_POST['tipo'];
        $codU=$_SESSION['id'];
      /*   $oferta=$_POST['oferta']; */
        $salida=guardarProducto($prod,$descr,$cat,$subc,$marca,$talla,$precio,$stock,$tipo,$codU,$conx);
        if($salida==true){
            $tabla=tablaProductos($conx);
        }

        $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
        echo json_encode($respuesta);
    }
    elseif($op=="modificarProducto")
    {
        $prod=$_POST['prod'];
        $descr=$_POST['descr'];
        $cat=$_POST['cat'];
        $subc=$_POST['subc'];
        $marca=$_POST['marca'];
        $talla=$_POST['talla'];
        // $imagen=$_POST['imagen'];
        $precio=$_POST['precio'];
        $stock=$_POST['stock'];
        $tipo=$_POST['tipo'];;
        $val=$_POST['val'];

        $salida=modificarProducto($prod,$descr,$cat,$subc,$marca,$talla,$precio,$stock,$tipo,$val,$conx);
        if($salida==true){
            $tabla=tablaProductos($conx);
        }

        $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
        echo json_encode($respuesta);
    }
    elseif($op=="eliminarProducto")
    {
        $cod=$_POST['cod'];
        $salida=eliminarProducto($cod,$conx);
        if($salida==true){
            $tabla=tablaProductos($conx);
        }

        $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
        echo json_encode($respuesta);
    }
   
       
    
    //imageeeeeeeeeeeeeen
    /* $cont=0;
            // ciclo para recorrer el array de imagenes

              foreach ($_FILES["img_extra"]["name"] as $key => $value) {

                //Obtenemos la extensión del archivo
                $ext = explode('.', $_FILES["img_extra"]["name"][$key]);

                //Generamos un nuevo nombre del archivo, esto para no duplicar el nombre del archivo y que se sobreescriba.
                $renombrar = sha1($_FILES["img_extra"]["name"]).$cont.time();
                $nombre_final = $renombrar.".".$ext[1];

                //Se copian los archivos de la carpeta temporal del servidor a su ubicación final
                move_uploaded_file($_FILES["img_extra"]["tmp_name"][$key], "../fotos/".$nombre_final);
                $cont++;
              } */

    
?>