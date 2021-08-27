<?php

function tablaOfertas($conx)
{
     $query="select *,date_format(duracion,'%d/%m/%Y %h:%i') as fv from ofertas order by id_ofertas desc";
     $resultado=mysqli_query($conx,$query);

     if(mysqli_num_rows($resultado)>0)
     {
         $tabla.="<table data-toggle='table' data-pagination='true' data-search='true' class='table table-bordered table-hover' id='idTablaO'>
         
                     <thead class='table table-danger'>
                         <tr>
                         <th>COD</th><th>Precio Inicial</th><th>Descuento</th><th>Precio Final</th><th>Tiempo</th><th>Acciones</th>
                         </tr>
                     </thead>
                     <tbody>";
         while($row=mysqli_fetch_array($resultado))
         {
           
            $contador+=1;
             $tabla.="<tr><td>".$row['id_ofertas']."</td><td>".$row['precio_inicial']."</td><td>".$row['descuento']."".' %'."</td><td>".$row['precio']."</td><td>".$row['fv']."</td><td class='text-center'>";
             $tabla.="<div class='btn-group'>
                        <button type='button'  data-toggle='modal' data-target='#idmodaloferta' class='btn btn-outline-warning' onclick='prodd(".$row['id_ofertas'].")'><i class='bi bi-info-circle'></i></button>

                         <button type='button' class='btn btn-outline-info' onclick='mostrarO(".$row['id_ofertas'].")'><i class='bi bi-pencil-square'></i></button>

                         <button type='button' class='btn btn-outline-danger' onclick='mensajeO(".$row['id_ofertas'].")'><i class='bi bi-trash'></i></button>
                     </div></td></tr>";
         }
         $tabla.="  </tbody>
                 </table>";
     }
     return $tabla;
}

function guardarOferta($preIn,$descuento,$precioT,$tiempo,$conx)
{

     $query="insert into ofertas values(null, $preIn,'$descuento',$precioT,'$tiempo')";
     if(mysqli_query($conx,$query))
      {
          return mysqli_insert_id($conx);
      }
      else{
          return false;
      }
}
function agregarOferta($valores,$oferta,$conx){

   $query="INSERT into detalleoferta (id_producto,id_ofertas) values ";
   $cant=count($valores);
   for($i=0;$i<$cant;$i++)
   {
       $elem=explode(",",$valores[$i]);
       //$estado=($elem[4]=="true")?'cortesia':'activo';
       $query.="(".$elem[0].",".$oferta.")";
       if($i<$cant-1)
       $query.=",";
       else
       $query.=";";   
   }       	           
   if (mysqli_query($conx,$query))
   {
       return true;
   }
   else
     return  "ERROR ".mysqli_error($conx);;                

}
function modificarOferta($descu,$precioT,$fecha,$valo,$conx)
{
       $query="update ofertas set descuento='$descu',precio=$precioT,fecha='$fecha' where id_ofertas=$valo";
       if(mysqli_query($conx,$query))
       {
          return true;
       }
       else{
          return "ERROR ".mysqli_error($conx);
       }
}
function eliminarOferta($codigo,$conx)
   {
   $query="delete from ofertas where id_ofertas=$codigo";
  
   if(mysqli_query($conx,$query))
   {
      return true;
   }
   else
   {
      return "ERROR ".mysqli_error($conx);
   } 
   }

///////
/* function prodd($prod,$conx){
    $query="select * from ofertas where id_ofertas=$prod";

  $resultado=mysqli_query($conx,$query);

    if(mysqli_num_rows($resultado)>0)
    {
     
      return tablaDetalleO($conx);
    }
    else
    {
      return false;
    } 
} */
function tablaDetalleO($conx)
{
     $query="select d.id_producto, p.nombre_p, p.precio from producto p inner join detalleoferta d on p.id_producto=d.id_producto inner join ofertas o on d.id_ofertas = o.id_ofertas where o.id_ofertas = 2 order by d.id_ofertas desc";
     $resultado=mysqli_query($conx,$query);

     if(mysqli_num_rows($resultado)>0)
     {
         $tabla.="<table class='table table-sm text-center' id='idTablaDO'>
         
                     <thead>
                         <tr>
                         <th>Código</th><th>Producto</th><th>Precio. U.</th>
                         </tr>
                     </thead>
                     <tbody>";
         while($row=mysqli_fetch_array($resultado))
         {
           
           
             $tabla.="<tr><td><span class='badge bg-info'>".$row['id_producto']."</span></td><td>".$row['nombre_p']."</td><td>".$row['precio']."</td></tr>";
         }
         $tabla.="  </tbody>
                 </table>";
     }
     return $tabla;
}

?>