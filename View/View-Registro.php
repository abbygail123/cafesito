<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Registro De Usuario</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../Desing/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Desing/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap-Table---------------->
  <link rel="stylesheet" href="../Desing/plugins/bootstrap-table/bootstrap-table.min.css">
  <!-- iconos---->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- toastr---->
  <link rel="stylesheet" href="../Desing/plugins/toastr/toastr.min.css">
  <!-- file input-->
  <link media="all" rel="stylesheet" type="text/css" href="../Desing/plugins/file-input/css/fileinput.css" />
  <link rel="stylesheet" href="../Desing/RegistroUsuario.css">

</head>

<body style="background-image: url('https://images.pexels.com/photos/5531542/pexels-photo-5531542.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940')">
  <!-- Main content -->
  <div class="container mt-5">
    <div class="container-fluid col-lg-5">
      <div class="row">
        <div id="formulario" class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Registro</h5>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-sm">
                <!-- text input -->
                <div id="grupo_usuario" class="form-group ">
                  <label>Usuario</label>
                  <div class="formulario__grupo">
                    <input type="text" name="usuario" class="form-control" id="idUsuario" required autocomplete="off">
                    <i class="formulario__validacion-estado fas fa-times"></i>
                  </div>
                  <p class="formulario__input-error">Sólo puede contener números, letras y guion bajo.</p>
                </div>
              </div>
              <div>
                <div class="row">
                  <div class="col-sm">
                    <div id="grupo_nombre" class="form-group">
                      <label>Nombre</label>
                      <div class="formulario__grupo">
                        <input name="nombre" type="text" class="form-control" id="idNombres" required autocomplete="off">
                        <i class="formulario__validacion-estado fas fa-times"></i>
                      </div>
                      <p class="formulario__input-error">Sólo puede contener letras y espacios.</p>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div id="grupo_apellidos" class="form-group">
                      <label>Apellidos</label>
                      <div class="formulario__grupo">
                        <input name="apellidos" type="text" class="form-control" id="idApellidos" required autocomplete="off">
                        <i class="formulario__validacion-estado fas fa-times"></i>
                      </div>
                      <p class="formulario__input-error">Sólo puede contener letras y espacios.</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm">
                    <div id="grupo_telefono" class="form-group">
                      <label>Teléfono</label>
                      <div class="formulario__grupo">
                        <input type="tel" name="telefono" class="form-control" id="idTelefono" maxlength="9" required>
                        <i class="formulario__validacion-estado fas fa-times"></i>
                      </div>
                      <p class="formulario__input-error">Sólo puede contener números sin espacios.</p>
                    </div>
                  </div>
                  <div class="col-sm">
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
                  <div class="col-sm">
                    <div id="grupo_clave" class="form-group">
                      <label>Contraseña</label>
                      <div class="formulario__grupo">
                        <input type="password" name="clave" class="form-control" id="idClave" required>
                        <i class="formulario__validacion-estado fas fa-times"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm">
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
                <div>
                <label> Elegir Imagen</label>
                  <input type="file" id="file" name="file" value="Escoger img">
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="../View/View-Login.php" type="button" class="btn btn-danger float-left" id="cancelar">Regresar</a>
            <button type="submit" class="btn btn-primary float-right" id="buGuardar" onclick="guardarCliente();" value="0"><a style="color:white">Guardar</a> </button>
          </div>

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="../Desing/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../Desing/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../Desing/dist/js/adminlte.min.js"></script>
  <!-- Bootstrap-Table---------------->
  <script src="../Desing/plugins/bootstrap-table/bootstrap-table.min.js"></script>
  <script src="../Desing/plugins/bootstrap-table/locale/bootstrap-table-es-ES.min.js"></script>
  <!----- toastr--->
  <script src="../Desing/plugins/toastr/toastr.min.js"></script>
  <!-- file-input-->
  <script src="../Desing/plugins/file-input/js/fileinput.js" type="text/javascript"></script>
  <script src="../Desing/plugins/file-input/themes/fas/theme.js"></script>
  <!--- funciones propias-->
  <script src="../Service/Registro-Usuario.js"></script>
</body>

</html>