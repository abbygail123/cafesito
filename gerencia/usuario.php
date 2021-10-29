<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>PÁGINA PRINCIPAL</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">


  <!-- Navbar -->
  <?php include("../tema/navbar.php");?>
  <!-- /.navbar -->
     <!-- menu agregado cierre de session--> 
     <?php include("../tema/sidebar.php");?>
    <!-- /.sidebar -->

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
              <li class="breadcrumb-item active">Start Page</li>
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
          <!-- /.col-md-6 -->
        <div class="row">
          <div class="col-lg-12">
             <div class="card card-primary card-outline">
                 <div class="card-header">
                   <h5 class="m-0">Datos de los Clientes</h5>
        <table class="table table-striped table-hover">
			    <thead>
				    <tr>
					    <th>Cod</th>
					    <th>Nombre </th>
					    <th>Apellido</th>
					    <th>Dni</th>
					    <th>Telefono</th>
              <th>Tipo Usuario</th>
					    <th colspan="2">Acciones</th>
			      </tr>
			    </thead>
			    <tbody id="listaUsuario">
			    </tbody>
		    </table>
                 </div>
                 <div class="card-body" id="idLista">
                 </div>
             </div> 
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-modal update -->
  <div id="modalfrm_user" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog">
  <form>
   <div class="modal-content">
   
			<div class="modal-header">
				<div class="modal-title">
					<h3>Actualizar Tipo Cliente</h3>
				</div>
			</div>

			<div class="modal-body">
			<input type="hidden" id="id_usuario" value="">
				<div class="form-group">
					<label for="txtnombre" >Nombre</label>
					<input readOnly type="text" class="form-control" name="txtnombre" id="txtnombre" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="txtapellidos" >Apellido</label>
					<input readOnly type="text" class="form-control" name="txtapellidos" id="txtapellidos" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="txtdni" >Dni</label>
					<input readOnly type="number" step = "any" class="form-control" name="txtdni" id="txtdni" value="" placeholder="">
				</div>
				<div class="form-group">
					<label for="txttelefono" >Teléfono</label>
					<input readOnly type="number" step = "any" class="form-control" name="txttelefono" id="txttelefono" value="" placeholder="">
				</div>
               
    <div class="form-group">
	<label for="txttipo" >Tipo Cliente</label>
	<select  id="txttipo" class="form-control">  
      <option id="txttipo" >Cliente</option>
      <option id="txttipo" >Admin</option>
  </select>	
        </div>
			</div>
            <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button class="btn btn-primary" type="button" onclick="guardarCambiosCliente()">Guardar</button>
      	    </div>	
   
   </div>
  </form>
 </div>	
</div>

</body>

</html>
<!-- ./wrapper -->
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
<script>listaUsuario()</script>
</html>