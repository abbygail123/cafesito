<?php
 
function tablaCompras($codU,$conx)
{
     $query="select d.cantidad, d.precio, p.nombre_p, c.id_comprobante, c.estado, total, date_format(fecha,'%d/%m/%Y') as fe from comprobante c inner join detalle d on c.id_comprobante = d.id_comprobante inner join producto p on d.id_producto=p.id_producto where c.id_usuario =$codU order by id_comprobante desc";
     $resultado=mysqli_query($conx,$query);

     if(mysqli_num_rows($resultado)>0)
     {
         $tabla.="<table data-toggle='tabla' data-toolbar='#toolbar'  data-pagination='true' data-search='true' class='table table-sm text-center' id='idTablaC'>
         
                     <thead>
                         <tr>
                         <th>#</th><th>Códido</th><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Fecha</th><th>Estado</th>
                         </tr>
                     </thead>
                     <tbody>";
         while($row=mysqli_fetch_array($resultado))
         {
           
            $contador+=1;
             $tabla.="<tr><td>".$contador."</td><td><span class='badge bg-danger'>".$row['id_comprobante']."</span></td><td>".$row['nombre_p']."</td><td>".$row['precio']."</td><td>".$row['cantidad']."</td><td>".$row['total']."</td><td>".$row['fe']."</td><td><span class='badge badge-danger'>".$row['estado']."</span></td></tr>";
         }
         $tabla.="  </tbody>
                 </table>";
     }
     return $tabla;
}
function tablaBuscarC($codU,$fecha_d,$fecha_aa,$conx)
{
    if($fecha_d>$fecha_aa){
        echo "<script> alert('Ingrese correctamente')</script>";
        $tabla.="<table data-toggle='tabla' data-toolbar='#toolbar'  data-pagination='true' data-search='true' class='table table-sm text-center' id='idTablaC'>
         
        <thead>
            <tr>
            <th>#</th><th>Códido</th><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Fecha</th><th>Estado</th>
            </tr>
        </thead>
        </tbody>
        </table>
        <tbody>";
    }
     $query="select d.cantidad, d.precio, p.nombre_p, c.id_comprobante, c.estado, total, date_format(fecha,'%d/%m/%Y') as fe from comprobante c inner join detalle d on c.id_comprobante = d.id_comprobante inner join producto p on d.id_producto=p.id_producto where (c.id_usuario =$codU) and (fecha between '$fecha_d' and '$fecha_aa') order by id_comprobante desc";
     $resultado=mysqli_query($conx,$query);

     if(mysqli_num_rows($resultado)>0)
     {
         $tabla.="<table data-toggle='tabla' data-toolbar='#toolbar'  data-pagination='true' data-search='true' class='table table-sm text-center' id='idTablaC'>
         
                     <thead>
                         <tr>
                         <th>#</th><th>Códido</th><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Fecha</th><th>Estado</th>
                         </tr>
                     </thead>
                     <tbody>";
         while($row=mysqli_fetch_array($resultado))
         {
           
            $contador+=1;
             $tabla.="<tr><td>".$contador."</td><td><span class='badge bg-danger'>".$row['id_comprobante']."</span></td><td>".$row['nombre_p']."</td><td>".$row['precio']."</td><td>".$row['cantidad']."</td><td>".$row['total']."</td><td>".$row['fe']."</td><td><span class='badge badge-danger'>".$row['estado']."</span></td></tr>";
         }
         $tabla.="  </tbody>
                 </table>";
     }
    
     return $tabla;
    
}
?>