<?php

    function tablaDistrito($conx)
    {
        $query="select * from distrito order by id_distrito desc";
        $resultado=mysqli_query($conx,$query);
        if(mysqli_num_rows($resultado)>0)// pregunto si en la variable resultado hay datos
        {
        $tabla.="<table data-toggle='table' data-pagination='true' data-search='true' class='table table-striped table-light text-center' id='idTabla'>
                <thead class='thead-dark'>
                    <tr><th data-sortable='true'>#</th><th data-sortable='true'>Distrito</th><th>Acciones</th></tr>
                </thead>
                <tbody>";
            while($row=mysqli_fetch_array($resultado)) 
            {   
                $contador+=1;
                $valor=$row["id_distrito"]; 
                $tabla.="<tr><td>".$contador."</td><td>".$row['distrito']."</td><td class='text-center'>
                        <div class='btn-group'>
                            <button type='button' class='btn btn-outline-info' onclick='mostrar(".$row['id_distrito'].")'><i class='bi bi-pencil-square'></i></button>

                            <button type='button' class='btn btn-outline-danger' onclick='mensaje(".$row['id_distrito'].")'><i class='bi bi-trash'></i></button>
                        </div></td></tr>"; 
            }
            $tabla.=" </tbody>
                    </table>";
        } 

        return $tabla;
    }
  
    //////////////////////

    function guardar($distrito,$conx)
    {
        $query="insert into distrito (id_distrito, distrito) values(null,'$distrito')"; 
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
    $query="delete from distrito where id_distrito=$codigo";
    if(mysqli_query($conx,$query))
    {
       return true;
    }
    else
    {
       return "ERROR ".mysqli_error($conx);
    } 
    }


    function modificar($dis,$val,$conx)
    {
        $query="update distrito set distrito='$dis' where id_distrito=$val";        
        if(mysqli_query($conx,$query))
        {
           return true;
        }
        else
        {
          return "ERROR ".mysqli_error($conx);
        } 

    }

    function comboDistrito($conx)
    {
        $query="select * from distrito order by distrito asc";
        $resultado=mysqli_query($conx,$query);
        if(mysqli_num_rows($resultado)>0)
        {

            $combo.="<select id='idDistrito' class='form-control' name='nDistrito' required>
            <option value='0'>Seleccione un distrito </option>";
            while($row=mysqli_fetch_array($resultado))
            {
            $combo.="<option value='".$row['id_distrito']."'>".$row['distrito']."</option>";
            }
            $combo.="</select>";
        }
        return $combo;
    }

?>