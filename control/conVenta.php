<?php
    require_once("../clases/csesion.php");
    $sesion=new CSesion();
    $conx=$sesion->conexion();
    require("../clases/cventa.php");
    $op=$_POST['op'];
    //
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

    ////
    for($i=0;$i<count($array);$i++){
        if($array[$i]['Id']==$_POST['ids']){
            $array[$i]['Cantidad']=$_POST['cantidad'];
            $_SESSION['carrito']=$array;
            break;
        }
    }

?>