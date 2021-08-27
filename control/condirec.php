<?php

$conx=mysqli_connect('localhost','root','','tienda');
require("../clases/cdirec.php");
$op=$_POST['op'];

if($op=="guardar")
{
    /* $cod=$_POST['cod']; */
    $dis=$_POST['dis'];
    $salida=guardar($dis,$conx);

    if($salida==true){
        $tabla=tablaDistrito($conx);
    }

    $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
    echo json_encode($respuesta);
}

elseif($op=="eliminar")
{
    $cod=$_POST['cod'];
    $salida=eliminar($cod,$conx);
    if($salida==true){
        $tabla=tablaDistrito($conx);
    }

    $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
    echo json_encode($respuesta);
}

elseif($op=="modificar"){
    $dis=$_POST['dis'];
    $val=$_POST['val'];
    $salida=modificar($dis,$val,$conx);
    if($salida==true){
        $tabla=tablaDistrito($conx);
    }

    $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
    echo json_encode($respuesta);

}

?>