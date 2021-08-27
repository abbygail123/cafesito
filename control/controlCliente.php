<?php
    $conx=mysqli_connect('localhost','root','','tienda');// CREO LA CONEXION
    require("../clases/cusuario.php");
    $op=$_POST['op'];
    
    if($op=="guardarCliente")
    {
        /* $nombre_imagen=$_FILES['foto']['name'];
        $temporal=$_FILES['foto']['tmp_name'];
        $carpeta='../fotos';
        $ruta=$carpeta.'/'.$nombre_imagen;
        move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen); */
      
        $usuario=$_POST['usuario'];
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellido'];
        $telefono=$_POST['telefono'];
        $dni=$_POST['dni'];
        $clave=$_POST['clave'];

        $salida=guardarCliente($usuario,$nombre,$apellidos,$clave,$dni,$telefono,$conx);
        if($salida==true){
            $tabla=tablaClientes($conx);
        }

        $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
        echo json_encode($respuesta);
    }
    elseif($op=="modificarCliente")
    {   

        $usuario=$_POST['usuario'];
        $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
        $dni=$_POST['dni'];
        $dis=$_POST['dis'];
        $clave=$_POST['clave'];
        $foto=$_POST['foto'];
        $val=$_POST['val'];

        $salida=modificarCliente($usuario,$nombre,$telefono,$dni,$dis,$clave,$foto,$val,$conx);
        if($salida==true){
            $tabla=tablaClientes($conx);
        }

        $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
        echo json_encode($respuesta);
    }
    elseif($op=="eliminarCliente")
    {
        $cod=$_POST['cod'];
        $salida=eliminarCliente($cod,$conx);
        if($salida==true){
            $tabla=tablaClientes($conx);
        }

        $respuesta=array("mensaje"=>$salida,"tabla"=>$tabla);
        echo json_encode($respuesta);

    }elseif($op=="usuario"){
        
        $codU=$_POST['codU'];
        $salida=usuario($codU,$conx);
        $respuesta=array("mensaje"=>$salida);
        echo json_encode($respuesta);

    }


?>