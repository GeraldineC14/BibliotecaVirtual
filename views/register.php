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
							<form action="#" class="signup-form" id="formulario-usuario" autocomplete="off">
									<div class="row form-group mb-3">
											<div class="col">
													<label class="label">Nombres</label>
													<input type="text" id="namess" class="form-control">
											</div>
											<div class="col">
													<label class="label">Apellidos</label>
													<input type="text" id="surnames" class="form-control">
											</div>
									</div>
								<div class="row form-group mb-3">
									<div class="col">
										<label class="label">Usuario</label>
										<input type="text" class="form-control" id="username" placeholder="Miusuario" required>
									</div>
									<div class="col">
										<label class="label">Tipo de Acceso</label>
                                        <select class="form-control" name="accesslevel" id="accesslevel">
											<option value="#" selected>Seleccione:</option>
											<option value="E">Estudiante</option>
											<option value="D">Docente</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="label">Correo</label>
									<input type="email" class="form-control" id="email" placeholder="correo@dominio.com" required>
								</div>
								<div class="row form-group">
										<div class="col">
												<label class="label" for="accesskey">Contraseña</label>
												<input type="password" class="form-control" id="accesskey"placeholder="**********" required>
										</div>
										<div class="col">
												<label class="label" for="repetir">Repetir contraseña</label>
												<input type="password" class="form-control" id="repetir"placeholder="**********" required>
										</div>
								</div>
								<div class="form-check mb-3">
									<input class="form-check-input" type="checkbox" id="showPass">
                                    <label class="form-check-label" for="showPass">Mostrar Contraseña</label>
								</div>
								<div class="text-center mb-3">
									<button class="btn btn-success rounded submit px-3 mr-2" id="registrar" type="button" data-user="">Registrar</button>
									<a href="login.php" class="btn btn-danger rounded submit px-3 ml-2">Cancelar</a>
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
			var datos={
				'operacion' 	: "",
				'username'		: "",
				'namess'  		: "",
				'surnames'  	: "",
				'email'				: "",
			  'accesslevel' : "",
				'accesskey'  	: "",
				'repetir'  		: ""
				
        	};
			function alertar(textoMensaje = ""){
					Swal.fire({
							title   : 'Usuarios',
							text    :  textoMensaje,
							icon    :  'info',
							footer  :   'SENATI - Ingenieria de Software',
							timer   :   2000,
							confirmButtonText   :   'Aceptar'
					});
			}
           
			function alertarToast(titulo = "",textoMensaje = "", icono = ""){
					Swal.fire({
							title   : titulo,
							text    : textoMensaje,
							icon    : icono,
							toast   : true,
							position : 'bottom-end',
							showConfirmButton   : false,
							timer   : 1500,
							timerProgressBar    : true
					});
			}

			function validar() {
					const username = $("#username").val();
					const surnames = $("#surnames").val();
					const namess = $("#namess").val();
					const email = $("#email").val();
					const accesskey = $("#accesskey").val();
					const accesslevel = $("#accesslevel").val();
					const repetir = $("#repetir").val();

					datos['username'] = username;
					datos['surnames'] = surnames;
					datos['namess'] = namess;
					datos['email'] = email;
					datos['accesskey'] = accesskey;
					datos['accesslevel'] = accesslevel;
					datos['repetir'] = repetir;
					datos['operacion'] = "registrarUsuario";

					if (username === "" || surnames === "" || namess === "" || email === "" || accesslevel === "" || accesskey === "" || repetir === "") {
							alertar("Complete el formulario por favor");
							return;
					}

					if (username === "") {
							alertar("Ingrese un nombre de usuario");
							return;
					}

					console.log($("#username").val())

					// Realiza la llamada AJAX para validar el username
					$.ajax({
							url: '../controllers/usuario.controller.php',
							type: 'GET',
							data: {
									'operacion': 'validacionUsuario',
									'username': datos['username']
							},
							success: function(result) {
									if (result !== '[]') {
											alertar("El USUARIO ya existe en el sistema");
											console.log(result);
											return;
									}

									if (accesslevel === "D") {
											const esvalido = document.getElementById('email');
											const exprecion = /[a-zA-Z0-9._-]+\@midominio\.com/;
											if (exprecion.test(esvalido.value)) {
													const email = $("#email").val();
													$.ajax({
															url: '../controllers/usuario.controller.php',
															type: 'GET',
															data: {
																	'operacion': 'validacionCorreo',
																	'email': email
															},
															success: function(result) {
																	if (result !== '[]') {
																			alertar("El correo de docente ya existe en el sistema");
																			console.log(result);
																			return;
																	}
																	registrar();
															}
													});
											} else {
													Swal.fire({
															title: "Error",
															text: "Correo no autorizado",
															icon: "error",
															footer: "Horacio Zeballos Gámez",
															confirmButtonText: "Aceptar",
															confirmButtonColor: "#38AD4D"
													});
											}
									} else {
											const email = document.getElementById('email');
											const dominios = ['gmail.com', 'hotmail.com', 'outlook.es'];
											const value = email.value.split('@');

											if (!dominios.includes(value[1])) {
													Swal.fire({
															title: "Error",
															text: `Correos autorizados: ${dominios}`,
															icon: "error",
															footer: "Horacio Zeballos Gámez",
															confirmButtonText: "Aceptar",
															confirmButtonColor: "#38AD4D"
													});
											} else {
													const email = $("#email").val();
													$.ajax({
															url: '../controllers/usuario.controller.php',
															type: 'GET',
															data: {
																	'operacion': 'validacionCorreo',
																	'email': email
															},
															success: function(result) {
																	if (result !== '[]') {
																			alertar("El correo de estudiante ya existe en el sistema");
																			console.log(result);
																			return;
																	}
																	registrar();
															}
													});
											}
									}
							}
					});
			}



			function registrar(){
				if(datos['accesskey'] !== datos['repetir']){
					Swal.fire({
						title   : "Ha sucecido un error",
						text    : `Las claves no coinciden`,
						icon    : "error",
						footer  : "Horacio Zeballos Gámez",
						confirmButtonText   : "Aceptar",
						confirmButtonColor  : "#38AD4D"
					});	
				}else{
					Swal.fire({
						title   : "Registro",
						text    : "¿Los datos ingresados son correctos?",
						icon    : "question",
						footer  : "Horacio Zeballos Gámez",
						confirmButtonText   : "Aceptar",
						confirmButtonColor  : "#38AD4D",
						showCancelButton    : true,
						cancelButtonText    : "Cancelar",
						cancelButtonColor   : "#D3280A"
					}).then(result => {
						if(result.isConfirmed){
							$.ajax({
								url: '../controllers/usuario.controller.php',
								type: 'GET',
								data: datos,
								success: function(result){
									alertarToast("Registrado correctamente","Su usuario ha sido creado", "success")
									$("#formulario-usuario")[0].reset();
									setTimeout(function(){
										window.location.href = 'login.php';
									}, 1500)
								}
							});
						}
					});
				}
			} 
				
			$('#showPass').on('click', function(){
				var passInput=$("#accesskey,#repetir");
				if(passInput.attr('type')==='password')
				{
					passInput.attr('type','text');
				}else{
				passInput.attr('type','password');
				}
			});
			
			$("#registrar").click(validar);
			
		  
	
		});
	  </script>

</body>

</html>