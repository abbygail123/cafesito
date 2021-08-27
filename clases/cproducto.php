<?php

   function tablaProductos($conx)
   {
        $query="select * from producto p inner join categoria c on p.id_categoria=c.id_categoria inner join subcategoria s on p.id_subcategoria=s.id_subcategoria order by id_producto desc";
        $resultado=mysqli_query($conx,$query);

        if(mysqli_num_rows($resultado)>0)
        {
            $tabla.="<table class='icheck-material-red'
            data-toggle='table'
            data-toolbar='#toolbar'
            data-search='true'
            data-click-to-select='true'
            id='idTabla'>
            
                        <thead class='table table-danger'>
                            <tr>
                            <th data-field='state' data-checkbox='true'
                            ></th><th>#</th><th>Producto</th><th>Descripción</th><th>Categoría</th><th>Sub</th><th>Marca</th><th>Talla</th><th>Foto</th><th>Precio</th><th>Stock</th><th>tipo</th><th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>";
            while($row=mysqli_fetch_array($resultado))
            {
              
               //$contador+=1;
                $tabla.="<tr><td></td><td>".$row['id_producto']."</td><td>".$row['nombre_p']."</td><td>".$row['descripcion']."</td><td>".$row['categoria']."</td><td>".$row['subcategoria']."</td><td>".$row['marca']."</td><td>".$row['talla']."</td><td>".$row['imagen']."</td><td>".$row['precio']."</td><td>".$row['stock']."</td><td>".$row['tipo']."</td><td class='text-center'>";
                $tabla.="<div class='btn-group'>
                           <a href='../gerencia/vista.php?isd=(".$row['id_producto'].");'  class='btn btn-outline-warning'><i class='bi bi-eye'></i></a>
                            <button type='button' class='btn btn-outline-info' onclick='mostrar(".$row['id_producto'].")'><i class='bi bi-pencil-square'></i></button>

                            <button type='button' class='btn btn-outline-danger' onclick='mensaje(".$row['id_producto'].")'><i class='bi bi-trash'></i></button>
                        </div></td></tr>";
            }
            $tabla.="  </tbody>
                    </table>";
        }
        return $tabla;
   }

   function guardarProducto($prod,$descr,$cat,$subc,$marca,$talla,$precio,$stock,$tipo,$codU,$conx)
   {
       /*    //crear variable
        date_default_timezone_set("America/Lima");
        //creando nombre de la foto
        $fotoperil="Producto ".date('Y-m-d-h-i-s');
        //concatenar el nuevo nombre de la foto
        $filename=$fotoperil.$_FILES['nImag']['name'].".jpg";
        //localización de la carpeta foto
        $location="../fotos".$filename;
        //grabar foto
        is_uploaded_file($_FILES['nImag']['tmp_name'],$location); */

        $query="insert into producto (nombre_p,descripcion,id_categoria,id_subcategoria,marca,talla,imagen,precio,stock,tipo,id_usuario) values('$prod','$descr',$cat,$subc,'$marca','$talla','null',$precio,$stock,'$tipo',$codU)";
        if(mysqli_query($conx,$query))
        {
           return true;
        }
        else{
           return "ERROR ".mysqli_error($conx);
        }
   }

   function modificarProducto($prod,$descr,$cat,$subc,$marca,$talla,$precio,$stock,$tipo,$val,$conx)
   {
       $query="update producto set nombre_p='$prod',descripcion='$descr',id_categoria=$cat,id_subcategoria=$subc,marca='$marca',talla='$talla',imagen='null',precio=$precio,stock=$stock,tipo='$tipo' where id_producto=$val";
       if(mysqli_query($conx,$query))
       {
          return true;
       }
       else{
          return "ERROR ".mysqli_error($conx);
       }
  }

  function eliminarProducto($codigo,$conx)
   {
   $query="delete from producto where id_producto=$codigo";
   if(mysqli_query($conx,$query))
   {
      return true;
   }
   else
   {
      return "ERROR ".mysqli_error($conx);
   } 
   }
   function comboProductos($conx)
   {
      $query="select * from producto order by nombre_p asc";
      $resultado=mysqli_query($conx,$query);
      if(mysqli_num_rows($resultado)>0)
      {
          $combo.="<select   id='iddProducto' class='producto selectpicker form-control' data-live-search='true'><option value='0'>--- ---</option>";
          while($row=mysqli_fetch_array($resultado))
          {
              $combo.="<option value='".$row['id_producto'].",".$row['precio']."'>".$row['nombre_p']."</option>";
          }
          $combo.="</select>";
      }
      return $combo;
   }

  
?>