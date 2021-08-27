<?php

    function tablaCategoria($conx)
    {
        $query="select * from categoria order by id_categoria desc";
        $resultado=mysqli_query($conx,$query);
        if(mysqli_num_rows($resultado)>0)// pregunto si en la variable resultado hay datos
        {
        $tabla.="<table data-toggle='table' data-pagination='true' data-search='true' class='table table-striped table-light text-center' id='idTabla'>
                <thead class='thead-dark'>
                    <tr><th data-sortable='true'>#</th><th data-sortable='true'>Categoria</th><th>Acciones</th></tr>
                </thead>
                <tbody>";
            while($row=mysqli_fetch_array($resultado)) 
            {   
                $contador+=1;
          
                $tabla.="<tr><td>".$contador."</td><td>".$row['categoria']."</td><td class='text-center'>
                        <div class='btn-group'>
                            <button type='button' class='btn btn-outline-info' onclick='mostrar(".$row['id_categoria'].")'><i class='bi bi-pencil-square'></i></button>

                            <button type='button' class='btn btn-outline-danger' onclick='mensaje(".$row['id_categoria'].")'><i class='bi bi-trash'></i></button>
                        </div></td></tr>"; 
            }
            $tabla.=" </tbody>
                    </table>";
        } 

        return $tabla;
    }
  
    //////////////////////

    function guardarCategoria($categ,$conx)
    {
        $query="insert into categoria (categoria) values('$categ')"; 
        if(mysqli_query($conx,$query))
        {
            return true;
        }
        else
        {
            return "ERROR ".mysqli_error($conx);
        } 
    }
 
   function eliminar($codigo,$conx)
    {
    $query="delete from categoria where id_categoria=$codigo";
    if(mysqli_query($conx,$query))
    {
       return true;
    }
    else
    {
       return "ERROR ".mysqli_error($conx);
    } 
    }


    function modificar($categ,$val,$conx)
    {
        $query="update categoria set categoria='$categ' where id_categoria=$val";        
        if(mysqli_query($conx,$query))
        {
           return true;
        }
        else
        {
          return "ERROR ".mysqli_error($conx);
        } 

    }

    function comboCategoria($conx)
    {
        $query="select * from categoria";
        $resultado=mysqli_query($conx,$query);
        if(mysqli_num_rows($resultado)>0)
        {

            $combo.="<select onclick='mos();' id='idCategoria' class='form-control' name='nCategoria' required>
            <option value='0'>--- ---</option>";
            while($row=mysqli_fetch_array($resultado))
            {
            $combo.="<option value='".$row['id_categoria']."'>".$row['categoria']."</option>";
            }
            $combo.="</select>";
        }
        return $combo;
    }
    function comboSubC($conx)
    {
        $query="select * from subcategoria";
        $resultado=mysqli_query($conx,$query);
        if(mysqli_num_rows($resultado)>0)
        {

            $combo.="<select id='idSubC' class='form-control' name='nSubC' required >
            <option value=''>--- ---</option>";
            while($row=mysqli_fetch_array($resultado))
            {
            $combo.="<option value='".$row['id_subcategoria']."'>".$row['subcategoria']."</option>";
            }
            $combo.="</select>";
        }
        return $combo;
    }
////////

function tablaSub($conx)
    {
        $query="select * from subcategoria s inner join categoria c on s.id_categoria=c.id_categoria order by id_subcategoria desc";
        $resultado=mysqli_query($conx,$query);
        if(mysqli_num_rows($resultado)>0)// pregunto si en la variable resultado hay datos
        {
        $tabla.="<table data-toggle='table' data-pagination='true' data-search='true' class='table table-striped table-light text-center' id='idTablaSub'>
                <thead class='thead-dark'>
                    <tr><th data-sortable='true'>#</th><th data-sortable='true'>Categoria</th><th data-sortable='true'>Subcategoria</th><th>Acciones</th></tr>
                </thead>
                <tbody>";
            while($row=mysqli_fetch_array($resultado)) 
            {   
                $contador+=1;
             
                $tabla.="<tr><td>".$contador."</td><td>".$row['categoria']."</td><td>".$row['subcategoria']."</td><td class='text-center'>
                        <div class='btn-group'>
                            <button type='button' class='btn btn-outline-info' onclick='mostrarSub(".$row['id_subcategoria'].")'><i class='bi bi-pencil-square'></i></button>

                            <button type='button' class='btn btn-outline-danger' onclick='mensajeSub(".$row['id_subcategoria'].")'><i class='bi bi-trash'></i></button>
                        </div></td></tr>"; 
            }
            $tabla.=" </tbody>
                    </table>";
        } 

        return $tabla;
    }

    function guardarSub($cate,$subca,$conx)
   {

        $query="insert into subcategoria (id_categoria,subcategoria) values('$cate','$subca')";
        if(mysqli_query($conx,$query))
        {
           return true;
        }
        else{
           return "ERROR ".mysqli_error($conx);
        }
   }
   function modificarSub($cate,$subca,$vall,$conx)
   {
       $query="update subcategoria set id_categoria='$cate',subcategoria='$subca' where id_subcategoria=$vall";
       if(mysqli_query($conx,$query))
       {
          return true;
       }
       else{
          return "ERROR ".mysqli_error($conx);
       }
  }
  function eliminarSub($cod,$conx)
   {
   $query="delete from subcategoria where id_subcategoria=$cod";
   if(mysqli_query($conx,$query))
   {
      return true;
   }
   else
   {
      return "ERROR ".mysqli_error($conx);
   } 
   }
?>