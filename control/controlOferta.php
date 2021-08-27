<?php

$conx=mysqli_connect('localhost','root','','tienda');// CREO LA CONEXION
    require("../clases/coferta.php");
    $op=$_POST['op'];
/* 
    $array=$_SESSION['carrito'];
    for($i=0;$i<count($array);$i++){
        if($array[$i]['Id'] !=$_POST['id']){
            $rrr[]=array(
                'Id'=>$array[$i]['Id'],
                'Nombre'=>$array[$i]['Nombre'],
                'Precio'=>$array[$i]['Precio'],
                'Imagen'=>$array[$i]['Imagen'],
                'Cantidad'=>$array[$i]['Cantidad']
            );
        }
    }
    if(isset($rrr)){
        $_SESSION['carrito']=$rrr;
    }else{
        unset($_SESSION['carrito']);
    }
    echo "Eliminado";
 */

if($op=="agregarOferta") 
{
    $valores=$_POST['valores'];
    $preIn=$_POST['preIn'];
    $descuento=$_POST['descuento'];
    $precioT=$_POST['precioT'];
    $tiempo=$_POST['tiempo'];

    $oferta=guardarOferta($preIn,$descuento,$precioT,$tiempo,$conx);
    if($oferta!=false){
        $salida=agregarOferta($valores,$oferta,$conx);
    }

    $respuesta=array("mensaje"=>$salida);
    echo json_encode($respuesta);

}elseif($op=="modificarOferta")
{
    //$precio_ini=$_POST['precio_ini'];
    $descu=$_POST['descu'];
    $precioT=$_POST['precioT'];
    $fecha=$_POST['fecha'];
    $valo=$_POST['valo'];

    $salida=modificarOferta($descu,$precioT,$fecha,$valo,$conx);
    if($salida==true){
        $tabla=tablaOfertas($conx);
    }

    $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
    echo json_encode($respuesta);
    
}elseif($op=="eliminarOferta")
{
    $cod=$_POST['cod'];
    $salida=eliminarOferta($cod,$conx);
    if($salida==true){
        $tabla=tablaOfertas($conx);
    }

    $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
    echo json_encode($respuesta);
}

/* elseif($op=="prodd")
{
    $prod=$_POST['prod'];
    $op=$_POST['op'];
   
    $salida=prodd($prod,$conx);
    $respuesta=array("mensaje"=>$salida);
    echo json_encode($respuesta);

} */




?>