<?php
session_start();


/*if(isset($_SESSION['login']) && $_SESSION['login'] == true){
  header("location:views/admin/admin.view.php");
}*/

?>
<!doctype html>
<html lang="es">

<head>
	<title>Inicio de Sesión</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(../assets/img/bg-2.png);">
						</div>
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Registrar Usuario</h3>
								</div>
							</div>
							<form action="#" class="signup-form">
                                <div class="row form-group mb-3">
                                    <div class="col">
                                        <label class="label">Nombres</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label class="label">Apellidos</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
								<div class="row form-group mb-3">
									<div class="col">
										<label class="label" for="name">Correo</label>
										<input type="email" class="form-control" id="email" placeholder="correo@dominio.com" required>
									</div>
									<div class="col">
										<label class="label">Tipo de Acceso</label>
                                        <select class="form-control">
											<option value="#" selected>Seleccione:</option>
											<option value="E">Estudiante</option>
											<option value="D">Docente</option>
										</select>
									</div>
								</div>
                                <div class="row form-group">
                                    <div class="col">
                                        <label class="label" for="password">Contraseña</label>
                                        <input type="password" class="form-control" id="accesskey"placeholder="**********" required>
                                    </div>
                                    <div class="col">
                                        <label class="label" for="password">Repetir contraseña</label>
                                        <input type="password" class="form-control" id="accesskey2"placeholder="**********" required>
                                    </div>
								</div>
								<div class="form-check mb-3">
									<input class="form-check-input" type="checkbox" id="showPass">
                                    <label class="form-check-label" for="showPass">Mostrar Contraseña</label>
								</div>
								<div class="text-center mb-3">
									<button class="btn btn-success rounded submit px-3 mr-2" id="acceder" type="button" data-user="">Acceder</button>
									<a href="../index.php" class="btn btn-danger rounded submit px-3 ml-2">Cancelar</a>
								</div>
								<div class="form-group mb-3 text-right">
									<a href="login.php" class="form-link">Ya tienes una cuenta?</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- JQUERY -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/main.js"></script>
	<!-- FONTWASOME -->
	<script src="https://kit.fontawesome.com/9b57fc34f2.js" crossorigin="anonymous"></script>
  	<!-- SweetAlert2 -->
  	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	  <script>
		$(document).ready(function (){  
			//Mostrar la contraseña en las input de contraseña y repetir contraseña
			$('#showPass').on('click', function(){
				var passInput=$("#accesskey,#accesskey2");
				if(passInput.attr('type')==='password')
				{
					passInput.attr('type','text');
				}else{
				passInput.attr('type','password');
				}
			});
		});
	  </script>

</body>

</html>