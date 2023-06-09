<?php


if(isset($_SESSION['login'])){
	if(isset($_SESSION['login']['acceso']) && $_SESSION['login']['acceso']){
		header("location:./admin/index.php?view=admin.view.php");
	}
}

?>
<!doctype html>
<html lang="es">

<head>
	<title>Inicio de Sesión</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/login-responsive.css">
	<link rel="shortcut icon" href="../assets/img/favicon.ico"/>

</head>

<body>
	<!-- navbar -->
	<?php include './navbar.php'; ?>
	<div class="opacity-overlay"></div>
	<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 col-lg-10">
				<div class="wrap d-md-flex glassmorphism">
					<div class="img" style="background-image: url(../assets/img/bg-2.png); background-size: contain; background-repeat: no-repeat; background-position: center;"></div>
					<div class="login-wrap p-4 p-md-5 glassmorphism">
						<div class="d-flex justify-content-center">
							<div class="w-100 text-center">
								<h3 class="mb-2" style="font-family: 'Courier New', Courier, monospace; font-weight:bold">Iniciar Sesión</h3>
							</div>
							</div>
							<form action="#" class="signin-form" autocomplete="off">
							<div class="form-group">
								<label class="label" for="email">Correo:</label>
								<input type="text" class="form-control" id="email" placeholder="correo@dominio.com" required>
							</div>
							<div class="form-group">
								<label class="label" for="accesskey">Contraseña:</label>
								<input type="password" class="form-control" id="accesskey" placeholder="**********" required>
							</div>
							<div class="form-group form-check">
								<input type="checkbox" class="form-check-input" id="showPass">
								<label class="form-check-label" for="showPass">Mostrar contraseña</label>
							</div>
							<div class="text-center">
								<button class="btn btn-success rounded submit mr-2" id="acceder" type="button" data-user="">Acceder</button>
								<a href="../index.php" class="btn btn-danger rounded submit ml-2">Cancelar</a>
							</div>
							<div class="form-group text-center mt-3">
								<div class="d-flex flex-column">
									<div class="form-link">
									<a href="./forgot.php" class="form-link">Olvidó su contraseña?</a>
									</div>
									<div class="form-link mb-4">
										<a href="./register.php" class="form-link ">No tienes una cuenta?</a>
									</div>
								</div>
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
		$(document).ready(function() {

			ruta = document.referrer.split("/")[5];

			//hostinger
			// ruta = document.referrer.split("/")[3];
			

			function login() {
				let email = $("#email").val();
				let accesskey = $("#accesskey").val();
				$.ajax({
					url: '../controllers/usuario.controller.php',
					type: 'GET',
					dataType: 'JSON',
					data: {
						'operacion': 'login',
						'email': email,
						'accesskey': accesskey
					},
					success: function(result) {
						if (result.acceso) {
							Swal.fire({
								title: "Perfecto",
								text: `Bienvenido al sistema ${result.surnames} ${result.namess}`,
								icon: "success",
								showConfirmButton: false,
								timer: 1500,
								timerProgressBar: true
							});

							setTimeout(function() {
								if (ruta != 'register.php'){
									window.location.href = document.referrer;
								}else{
									window.location.href = './index.php'
								}
							}, 1500)
						} else {
							Swal.fire({
								title: "Error",
								text: result.mensaje,
								icon: "error",
								footer: "Horacio Zeballos Gámez",
								confirmButtonText: "Aceptar",
								confirmButtonColor: "#38AD4D"
							});
						}
					}
				});
			}

			$('#showPass').on('click', function() {
				var passInput = $("#accesskey");
				if (passInput.attr('type') === 'password') {
					passInput.attr('type', 'text');
				} else {
					passInput.attr('type', 'password');
				}
			});

			$("#accesskey").keypress(function(evt){
				if (evt.keyCode == 13){
					login();
				}
			});

			$("#acceder").click(login);


		});
	</script>

</body>

</html>