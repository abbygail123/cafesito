<?php
    require_once("../clases/csesion.php");
    $sesion=new CSesion();
    $conx=$sesion->conexion();
   require("../clases/cusuario.php");
   require("../clases/cdirec.php");

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Tienda</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap-Table---------------->
  <link rel="stylesheet" href="../plugins/bootstrap-table/bootstrap-table.min.css">

  <!-- iconos---->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- toastr---->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">

   <!-- file input-->
   <link media="all" rel="stylesheet" type="text/css" href="../plugins/file-input/css/fileinput.css"  />

  <link rel="stylesheet" href="usuario.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
       <?php include("../tema/navbar.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
       <?php include("../tema/sidebar.php");?>
  <!-- /.Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuario</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div id="ff" class="col-lg-5" style="display:none;">
              <div class="card card-primary card-outline">
                  <div class="card-header">
                  Foto
                  </div>
                  <div class="card-body">
                    <!-- <div class="row">                    
                      <div class="col-12 text-center">
                        <img src="../fotos/gaga.jpg" alt="user-avatar" class="img-fluid">
                      </div>
                    </div> -->
                    <div class="row">
                      <div class="col-12 text-center">
                        <input id="input-id" name="n-input-id[]" type="file" class="file"  data-theme="fas">
                        <input id="idRuta" type="hidden">
                      </div>
                    </div>
                  </div>
                
              </div>          
            </div>
          <div class="col-lg">

            <div id="formulario" class="card card-primary card-outline" >
              <div class="card-header">
                <h5 class="m-0">Registro</h5>
              </div>
              <div class="card-body" >
              
                 <div class="row">
                    <div class="col-sm-3"> 
                      <!-- text input -->
                      <div  id="grupo_usuario"  class="form-group ">
                        <label>Usuario</label>
                          <div class="formulario__grupo">
                              <input type="text" name="usuario" class="form-control" id="idUsuario" required>
                              <i class="formulario__validacion-estado fas fa-times"></i>
                          </div>
                          <p class="formulario__input-error">Sólo puede contener números, letras y guion bajo.</p>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div id="grupo_nombre" class="form-group">
                        <label>Nombre Completo</label>
                          <div class="formulario__grupo">
                              <input name="nombre" type="text" class="form-control" id="idNombres" required>
                              <i class="formulario__validacion-estado fas fa-times"></i>
                          </div>
                          <p class="formulario__input-error">Sólo puede contener letras y espacios.</p>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div id="grupo_telefono" class="form-group">
                          <label>Teléfono</label>
                          <div class="formulario__grupo">
                            <input type="tel" name="telefono" class="form-control" id="idTelefono" maxlength="9" required>
                            <i class="formulario__validacion-estado fas fa-times"></i>
                          </div>
                            <p class="formulario__input-error">Sólo puede contener números sin espacios.</p>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div id="grupo_dni" class="form-group">
                        <label>Dni</label>
                        <div class="formulario__grupo">
                          <input type="text" name="dni" class="form-control" id="idDni" maxlength="8" required>
                          <i class="formulario__validacion-estado fas fa-times"></i>
                        </div>
                            <p class="formulario__input-error">Sólo puede contener números.</p>
                      </div>
                    </div>
                  </div>             
                  <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Distrito</label>
                          <?=comboDistrito($conx);?>
                        </div>
                      </div>
                    <div class="col-sm-3">
                      <div id="grupo_clave" class="form-group">
                        <label>Contraseña</label>
                        <div class="formulario__grupo">
                          <input type="password" name="clave" class="form-control" id="idClave" required>
                          <i class="formulario__validacion-estado fas fa-times"></i>
                        </div>
                           
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div id="grupo_clave2" class="form-group">
                        <label>Repetir contraseña</label>
                        <div class="formulario__grupo">
                          <input type="password" name="clave2" class="form-control" id="idclave2" required>
                          <i class="formulario__validacion-estado fas fa-times"></i>
                        </div>
                            <p class="formulario__input-error">Las constraseñas deben ser iguales.</p>
                      </div>
                    </div>
                      
                  </div>    
                  <!-- <div class="row">
                      <div class="col-sm">
                       <input type="file" name="foto" id="foto">
                      </div>
                  </div> -->         
              </div>
              <div class="card-footer">  
                  <a href="usuario.php" type="button" class="btn btn-danger float-left" id="cancelar" style="display:none;">Cancelar</a>
                 <button type="submit" class="btn btn-primary float-right" id="buGuardar" onclick="guardarCliente();" value="0">Guardar</button>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <div class="row">
          <div class="col-lg-12">
             <div class="card card-primary card-outline">
                 <div class="card-header">
                   <h5 class="m-0">Tabla</h5>
                 </div>
                 <div class="card-body" id="idLista">
                     <?=tablaClientes($conx);?>
                 </div>
             </div> 
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include("../tema/footer.php");?>
  <!-- /.Main Footer -->

</div>
<!-- ./wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="idModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Advertencia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ¿Estas seguro de eliminar el registro?
        </div>
        <div class="modal-footer" id="idFooter">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger">Eliminar</button>
        </div>
        </div>
    </div>
    </div>






<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Bootstrap-Table---------------->
<script src="../plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="../plugins/bootstrap-table/locale/bootstrap-table-es-ES.min.js"></script>

<!----- toastr--->
<script src="../plugins/toastr/toastr.min.js"></script>

<!-- file-input-->
<script src="../plugins/file-input/js/fileinput.js" type="text/javascript"></script>
<script src="../plugins/file-input/themes/fas/theme.js"></script>

<!--- funciones propias-->
<script src="../js/cliente.js"></script>


</body>
</html>
