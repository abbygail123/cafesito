<?php
require_once("../return.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tienda</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Desing/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Desing/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition login-page" style="background-image: url('https://images.pexels.com/photos/5531542/pexels-photo-5531542.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940')">
<div class="login-box card card-outline card-danger"> 
  <div class="login-logo card-header" >
    <a href="login.php" class="h2" ><b>Inicia</b>Sesión</a>
  </div>
  <!-- /.login-logo -->
  <div  >
    <div class="card-body ">
      

      <form action="../Controller/UserLogin.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="usuario" autocomplete="off">
          <span class="input-group-append">
            <button type="button" class="btn btn-info">
              <span class="fas fa-user"> </span>
            </button>
          </span>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="contraseña">
            <span class="input-group-append">
              <button type="button" class="btn btn-danger">
                <span class="fas fa-lock"> </span>
              </button>
            </span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-info btn-block" name="nIngresar">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
      
          <div class="col text-center">
            <p class="mt-2">¿Aún no tienes una cuenta? <a href="../View/View-Registro.php">Registrate</a> </p>
          </div>
    
        </div>
      </form>
      <!-- /.social-auth-links -->
      <p class="text-center text-danger">
      <?php 
		if(isset($_GET['e'])){
			if($_GET['e']==1){
				echo "Datos incorrectos";
      }
		}
    if(isset($_GET['d'])){
      if($_GET['d']==1){
				echo "Complete todos los campos";
      }
    }
		?>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../Desing/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../Desing/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../Desing/dist/js/adminlte.min.js"></script>

</body>
</html>
