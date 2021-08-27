<?php

function tablaPedidos($codU,$conx)
{
     $query="select id_comprobante, u.usuario,telefono,  date_format(fecha,'%d-%m-%Y') as fp from comprobante c inner join usuario u on c.id_usuario=u.id_usuario order by id_comprobante asc";
     $resultado=mysqli_query($conx,$query);

     if(mysqli_num_rows($resultado)>0)
     {
         $tabla.="<table data-toggle='table' class='table table-sm text-center' id='idTablaPe'>
         
                     <thead>
                         <tr>
                         <th>Cód. Pedido</th><th>Comprador</th><th>Teléfono</th><th>Fecha</th><th>Opciones</th>
                         </tr>
                     </thead>
                     <tbody>";
         while($row=mysqli_fetch_array($resultado))
         {
           
           
             $tabla.="<tr><td><span class='badge bg-info'>".$row['id_comprobante']."</span></td><td>".$row['usuario']."</td><td>".$row['telefono']."</td><td>".$row['fp']."</td><td class='text-center'>";
             $tabla.="<div class='btn-group'>
                        <button type='button' class='btn btn-outline-warning btn-sm' onclick='prodd(".$row['id_comprobante'].")'><i class='bi bi-file-earmark-person'></i></button>

                         <button type='button' class='btn btn-outline-info btn-sm' onclick='mostrarO(".$row['id_comprobante'].")'><i class='bi bi-journal-text'></i></button>

                         <button type='button' class='btn btn-outline-danger btn-sm' onclick='mensajeO(".$row['id_comprobante'].")'><i class='bi bi-x-circle'></i></button>
                     </div></td></tr>";
         }
         $tabla.="  </tbody>
                 </table>";
     }
     return $tabla;
}

?>