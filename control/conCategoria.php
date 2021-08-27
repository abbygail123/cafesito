<?php

$conx=mysqli_connect('localhost','root','','tienda');
require("../clases/ccategoria.php");
$op=$_POST['op'];

if($op=="guardarCategoria")
{
    /* $cod=$_POST['cod']; */
    $categ=$_POST['categ'];
    $salida=guardarCategoria($categ,$conx);

    if($salida==true){
        $tabla=tablaCategoria($conx);
    }

    $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
    echo json_encode($respuesta);
}

elseif($op=="eliminar")
{
    $cod=$_POST['cod'];
    $salida=eliminar($cod,$conx);
    if($salida==true){
        $tabla=tablaCategoria($conx);
    }

    $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
    echo json_encode($respuesta);
}

elseif($op=="modificar"){
    $categ=$_POST['categ'];
    $val=$_POST['val'];
    $salida=modificar($categ,$val,$conx);
    if($salida==true){
        $tabla=tablaCategoria($conx);
    }

    $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
    echo json_encode($respuesta);

}
///

$ope=$_POST['ope'];
    if($ope=="guardarSub")
    {
        $cate=$_POST['cate'];
        $subca=$_POST['subca'];
       
        $salida=guardarSub($cate,$subca,$conx);
        if($salida==true){
            $tabla=tablaSub($conx);
        }

        $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
        echo json_encode($respuesta);
    }
    elseif($ope=="modificarSub")
    {
        $cate=$_POST['cate'];
        $subca=$_POST['subca'];
        $vall=$_POST['vall'];

        $salida=modificarSub($cate,$subca,$vall,$conx);
        if($salida==true){
            $tabla=tablaSub($conx);
        }

        $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
        echo json_encode($respuesta);
    }
    elseif($ope=="eliminarSub")
    {
        $cod=$_POST['cod'];
        $salida=eliminarSub($cod,$conx);
        if($salida==true){
            $tabla=tablaSub($conx);
        }

        $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
        echo json_encode($respuesta);
    }
?>