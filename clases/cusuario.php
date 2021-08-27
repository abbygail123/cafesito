<?php 

function verificarUsuario($us,$pass,$conx)
{
    $query="select * from usuario where usuario='$us' AND clave='$pass'";
    $resultado=mysqli_query($conx,$query);
    if(mysqli_num_rows($resultado)>0)
    {
       $datos=mysqli_fetch_array($resultado);
       return $datos;
    }
    else
    {
       return false;
    }

}
function tablaClientes($conx)
{
    $query="select * from usuario order by idusuario desc";
    $resultado=mysqli_query($conx,$query);

    if(mysqli_num_rows($resultado)>0)
    {
        $tabla.="<table data-toggle='table' data-pagination='true' data-search='true' class='table table-striped' id='idTabla'>
                    <thead class='table-info'>
                        <tr>
                            <th class='text-center'>#</th><th>Usuario</th><th>Nombre</th><th>Apellido</th><th>Dni</th><th>Telefono</th><th class='text-center'>Foto</th><th class='text-center'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>";
        while($row=mysqli_fetch_array($resultado))
        {   
          $foto="<div class='widget-user-image'>
                  <img class=' elevation-2' src='../fotos/gaga.jpg' alt='User Avatar' style='width:60px;height:60px'>
                </div>";
          if($row['foto']!=null)
          {
              $foto="<div class='widget-user-image'>
                      <img class=' elevation-2' src='../fotos/".$row['foto']."' alt='User Avatar' style='width:60px;height:60px'>
                    </div>";
          }
            $contador+=1;
            $valor=$row["idusuario"]; 
            $tabla.="<tr><td>".$contador."</td><td>".$row['usuario']."</td><td>".$row['nombre_u']."</td><td>".$row['apellido']."</td><td>".$row['dni']."</td><td>".$row['telefono']."</td><td class='text-center'>".$foto."</td><td class='text-center'>";
            $tabla.="<div class='btn-group'>
                        <button type='button' class='btn btn-outline-info' onclick=\"mostrar('".$row['idusuario']."')\"><i class='fas fa-user-edit'></i></button>
                        <button type='button' class='btn btn-outline-danger' onclick=\"mensaje('".$row['idusuario']."')\"><i class='fas fa-user-times'></i></button>
                    </div></td></tr>";
        }
        $tabla.="  </tbody>
                </table>";
    }
    return $tabla;
}

function guardarCliente($usuario,$nombre,$apellido,$clave,$dni,$telefono,$conx)
  {
    
    $query="insert into usuario (usuario,nombre_u,apellido,clave,dni,telefono) values('$usuario','$nombre','$apellido','$clave','$dni','$telefono')"; 

        //verficar
        /* $existe="select * from usuario where usuario='$usuario'";
        $veri_user=mysqli_query($conx,$existe);

        if(mysqli_num_rows($veri_user)>0){
          return "El Usuario ya existe";
          exit();
        } */
        //verficarDni
        /* $existe="select * from usuario where dni='$dni'";
        $veri_user=mysqli_query($conx,$existe);

        if(mysqli_num_rows($veri_user)>0){
          return "El Dni ya existe";
          exit();
        } */

    if(mysqli_query($conx,$query))
    {
       return true;
    }
    else
    {
      return "ERROR ".mysqli_error($conx);
    } 
  }

function modificarCliente($usuario,$nombre,$telefono,$dni,$dis,$clave,$foto,$val,$conx)
{
    $query="update usuario set usuario='$usuario', nombrecompleto='$nombre',telefono='$telefono',dni='$dni',id_distrito='$dis',clave='$clave',foto='$foto' where id_usuario=$val";
    //mverficar
    $existe="select * from usuario where usuario='$usuario'";
    $veri_user=mysqli_query($conx,$existe);

    if(mysqli_num_rows($veri_user)>1){
      return "El Usuario o Email ya existe";
      exit();
    }
    if(mysqli_query($conx,$query))
    {
        return true;
    }
    else{
        return "ERROR ".mysqli_error($conx);
    }
    
}

function eliminarCliente($codigo,$conx)
{
  $query="delete from usuario where id_usuario=$codigo";
  if(mysqli_query($conx,$query))
  {
     return true;
  }
  else
  {
    return "ERROR ".mysqli_error($conx);
  } 
}

function usuario($codU,$conx){
  $query="select * from usuario where id_usuario=$codU";

  $resultado=mysqli_query($conx,$query);

  if(mysqli_num_rows($resultado)>0)
    {
      $row=mysqli_fetch_array($resultado);
      return $row;
    }
    else
    {
      return false;
    } 
}
?>