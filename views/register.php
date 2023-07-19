<?php

?>
<!doctype html>
<html lang="es">

<head>
	<title>Registrar Usuario</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/login-responsive.css">
	<link rel="shortcut icon" href="../assets/img/favicon.ico"/>

</head>

<body>
	<style>
    .inputc {
      height: 50px;
      width: 40px;
      text-align: center;
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      -ms-border-radius: 5px;
      -o-border-radius: 5px;
      border-color: rgba(0, 0, 255, 0.49);
    }
  </style>
	<!-- navbar -->
	<?php include './navbar.php'; ?>
	<div class="opacity-overlay"></div>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex glassmorphism">
						<div class="img"
							style="background-image: url(../assets/img/bg-2.png); background-size: contain; background-repeat: no-repeat; background-position: center;">
						</div>
						<div class="login-wrap p-4 p-md-5 glassmorphism">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Registrar Usuario</h3>
								</div>
							</div>
							<form action="#" class="signup-form" id="formulario-usuario" autocomplete="off">
								<div class="row form-group mb-3">
									<div class="col">
										<label for="namess" class="label">Nombres</label>
										<input type="text" id="namess" class="form-control" autofocus>
									</div>
									<div class="col">
										<label for="surnames"class="label">Apellidos</label>
										<input type="text" id="surnames" class="form-control">
									</div>
								</div>
								<div class="row form-group mb-3">
									<div class="col">
										<label for="username" class="label">Usuario</label>
										<input type="text" class="form-control" id="username" placeholder="Miusuario"
											required>
									</div>
									<div class="col">
										<label for="accesslevel" class="label">Tipo de Acceso</label>
										<select class="form-control" name="accesslevel" id="accesslevel">
											<option value="#">Seleccione:</option>
											<option value="E">Estudiante</option>
											<option value="I">Invitado</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="label">Correo</label>
									<div class="input-group">
										<input type="email" class="form-control" id="email"
											placeholder="correo@dominio.com" required>
										<div class="input-group-append">
											<button class="btn btn-success" id="verificar"
												type="button">Verificar</button>
										</div>
									</div>
								</div>
								<div class="row form-group">
									<div class="col">
										<label class="label" for="accesskey">Contraseña</label>
										<input type="password" class="form-control" id="accesskey"
											placeholder="**********" required>
									</div>
									<div class="col">
										<label class="label" for="repetir">Confirmar</label>
										<input type="password" class="form-control" id="repetir"
											placeholder="**********" required>
									</div>
								</div>
								<div class="form-check mb-3">
									<input class="form-check-input" type="checkbox" id="showPass">
									<label class="form-check-label" for="showPass">Mostrar Contraseña</label>
								</div>
								<div class="text-center mb-3">
									<button class="btn btn-success rounded submit px-3 mr-2" id="registrar"
										type="button" data-user="">Registrar</button>
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

	<!-- modal -->
	<div class="modal fade" id="modal-validacion" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-success text-light">
					<i class="fa-solid fa-key fa-sm" style="color: #ffffff;"></i>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="form-group text-center" action="" autocomplete="off" id="form-clave">
						<h4>INGRESAR CODIGO</h4>
						<label for="key1" class="form-label text-justify">
							Te enviamos un código para que puedas validar tu correo.
							Si no lo encuentras revisa el Correo No Deseado.
						</label>
						<div  class="form-group mt-3" id="keys">
							<input class="inputc" type="tel" id="key1" maxlength="1"
								oninput="moveToNextInput(this, 'key2')" />
							<input class="inputc" type="tel" id="key2" maxlength="1"
								oninput="moveToNextInput(this, 'key3')" />
							<input class="inputc" type="tel" id="key3" maxlength="1"
								oninput="moveToNextInput(this, 'key4')" />
							<input class="inputc" type="tel" id="key4" maxlength="1"
								oninput="moveToNextInput(this, 'comprobar')" />
						</div>

						<div id="inputs-clave" class="d-none">
							<div class="md-3">
								<label for="codigo" class="form-label">Escribe el codigo HZG-####:</label>
								<input type="text" class="form-control" id="codigo">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer justify-content-lg-center">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-success" id="comprobar">Validar</button>
					<button type="button" class="btn btn-primary d-none" id="validarcodigos">Validar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- JQUERY -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/main.js"></script>
	<!-- FONTWASOME -->
	<script src="https://kit.fontawesome.com/9b57fc34f2.js" crossorigin="anonymous"></script>
	<!-- SweetAlert2 -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
		$(document).ready(function () {

			const modal = new bootstrap.Modal(document.querySelector("#modal-validacion"));

			var datos = {
				'operacion': "",
				'username': "",
				'namess': "",
				'surnames': "",
				'email': "",
				'accesslevel': "",
				'accesskey': "",
				'repetir': ""
			};

			var correoValidado = 0;
			var clavegenerada = 0;

			function alertar(textoMensaje = "") {
				Swal.fire({
					title: 'Usuarios',
					text: textoMensaje,
					icon: 'info',
					footer: 'SENATI - Ingenieria de Software',
					timer: 2000,
					confirmButtonText: 'Aceptar'
				});
			}
			function alertarToast(titulo = "", textoMensaje = "", icono = "") {
				Swal.fire({
					title: titulo,
					text: textoMensaje,
					icon: icono,
					toast: true,
					position: 'bottom-end',
					showConfirmButton: false,
					timer: 1500,
					timerProgressBar: true
				});
			}

			function validar() {
				datos['username'] = $("#username").val();
				datos['surnames'] = $("#surnames").val();
				datos['namess'] = $("#namess").val();
				datos['email'] = $("#email").val();
				datos['accesskey'] = $("#accesskey").val();
				datos['accesslevel'] = $("#accesslevel").val();
				datos['repetir'] = $("#repetir").val();
				datos['operacion'] = "registrarUsuario";

				if (datos['username'] == "" || datos['surnames'] == "" || datos['namess'] == "" || datos['email'] == "" || datos['accesskey'] == "" || datos['accesslevel'] == "" || datos['repetir'] == "") {
					alertar("Complete el formulario por favor");
					return;
				}

				// Realiza la llamada AJAX para validar el username
				$.ajax({
					url: '../controllers/usuario.controller.php',
					type: 'GET',
					data: {
						'operacion': 'validacionUsuario',
						'username': datos['username']
					},
					success: function (result) {
						if (result !== '[]') {
							alertar("El USUARIO ya existe en el sistema");
							console.log(result);
							return;
						}

						if (datos['accesslevel'] == "I") {
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
									success: function (result) {
										if (result !== '[]') {
											alertar("El correo de INVITADO ya existe en el sistema");
											return;
										}
										registrar();
									}
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
									success: function (result) {
										if (result !== '[]') {
											alertar("El correo de ESTUDIANTE ya existe en el sistema");
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

			function validarCampos() {

				datos['username'] = $("#username").val();
				datos['surnames'] = $("#surnames").val();
				datos['namess'] = $("#namess").val();
				datos['email'] = $("#email").val();
				datos['accesskey'] = $("#accesskey").val();
				datos['accesslevel'] = $("#accesslevel").val();
				datos['repetir'] = $("#repetir").val();

				if (datos['username'] == "" || datos['surnames'] == "" || datos['namess'] == "" || datos['email'] == "" || datos['accesskey'] == "" || datos['accesslevel'] == "" || datos['repetir'] == "") {
					alertar("Complete el formulario por favor");
					return;
				} else {
					validacionCorreo();
				}
			}

			function validacionCorreo() {
				modal.toggle();

				var nombres = $("#namess").val();
				var apellidos = $("#surnames").val();
				var usuario = nombres + " " + apellidos;
				var envio = [];

				const parametros = new URLSearchParams()
				parametros.append("operacion", "correoValidaremail");
				parametros.append("email", document.querySelector("#email").value);
				parametros.append("usuario", usuario);


				fetch('../controllers/usuario.controller.php', {
					method: 'POST',
					body: parametros
				})
					.then(respuesta => respuesta.json())
					.then(datos => {
						console.log(datos);
						Swal.fire({
							icon: 'info',
							title: 'Mensaje',
							text: datos.mensaje,
							timer: 2000,
							showConfirmButton: false
						});

					});

			}

			function validarClave() {
				const parametros = new URLSearchParams();
				const key1 = document.getElementById("key1").value;
				const key2 = document.getElementById("key2").value;
				const key3 = document.getElementById("key3").value;
				const key4 = document.getElementById("key4").value;
				const enterCode = `${key1}${key2}${key3}${key4}`;
				parametros.append("operacion", "validarClavecorreo");
				parametros.append("email", document.querySelector("#email").value);
				parametros.append("clavegenerada", enterCode);

				fetch(`../controllers/Usuario.controller.php`, {
					method: 'POST',
					body: parametros

				})
					.then(respuesta => respuesta.json())
					.then(datos => {
						console.log(datos);
						//Analizando los datos
						if (datos.status == "PERMITIDO") {
							modal.toggle();
							$('#email').prop('disabled', true); // Deshabilitar el campo de entrada de correo electrónico
							$('#verificar').prop('disabled', true); // Deshabilitar el botón "Verificar Correo"
							correoValidado = 1; // Cambiar el valor de la variable correoValidado a 1		
							clavegenerada = enterCode;
							validarClavecorreo()
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: 'Clave incorrecta, revise su correo por favor',
								timer: 2000,
								showConfirmButton: false
							});

						}
					});
			}

			function validarClavecorreo() {
				const parametros = new URLSearchParams();
				parametros.append("operacion", "validacionCompleta");
				parametros.append("email", document.querySelector("#email").value);
				fetch(`../controllers/Usuario.controller.php`, {
					method: 'POST',
					body: parametros
				})
					.then(respuesta => respuesta.json())
					.then(datos => {
						Swal.fire({
							icon: 'success',
							title: 'Validación completada',
							timer: 2000,
							showConfirmButton: false
						});

					});

			}
			
			function registrar() {
				if (datos['accesskey'] !== datos['repetir']) {
					Swal.fire({
						title: "Ha sucecido un error",
						text: `Las claves no coinciden`,
						icon: "error",
						footer: "Horacio Zeballos Gámez",
						confirmButtonText: "Aceptar",
						confirmButtonColor: "#38AD4D"
					});
				} else {
					if (correoValidado == 0) {
						alertar("Validar el correo antes de registrar");
						document.querySelector("#verificar").focus();

					} else {
						Swal.fire({
							title: "Registro",
							text: "¿Los datos ingresados son correctos?",
							icon: "question",
							footer: "Horacio Zeballos Gámez",
							confirmButtonText: "Aceptar",
							confirmButtonColor: "#38AD4D",
							showCancelButton: true,
							cancelButtonText: "Cancelar",
							cancelButtonColor: "#D3280A"
						}).then(result => {
							if (result.isConfirmed) {
								$.ajax({
									url: '../controllers/usuario.controller.php',
									type: 'GET',
									data: datos,
									success: function (result) {
										alertarToast("Registrado correctamente", "Su usuario ha sido creado", "success")
										$("#formulario-usuario")[0].reset();
										setTimeout(function () {
											window.location.href = 'login.php';
										}, 1500)
									}
								});
							}
						});
					}

				}
			}

			$('#accesslevel').change(function() {
				if ($(this).val() == 'E') {
				$('#inputs-clave').removeClass('d-none');
				$('#validarcodigos').removeClass('d-none');
				$('#comprobar').addClass('d-none');
				} else {
					$('#inputs-clave').addClass('d-none');
					$('#validarcodigos').addClass('d-none');
					$('#comprobar').removeClass('d-none');
				}
			});

			$('#showPass').on('click', function () {
				var passInput = $("#accesskey,#repetir");
				if (passInput.attr('type') === 'password') {
					passInput.attr('type', 'text');
				} else {
					passInput.attr('type', 'password');
				}
			});

			$("#modal-validacion .btn-close, #modal-validacion .btn-secondary").click(function () {
				$("#modal-validacion").modal('hide');
			});


			document.querySelector("#verificar").addEventListener("click", () => {
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
				} else if(correoValidado != 1){
					validarCampos();
				}
			})

			modal._element.addEventListener("shown.bs.modal", () => {
				document.querySelector("#key1").focus();
			});

			window.moveToNextInput = function (currentInput, nextInputId) {
				if (currentInput.value.length === currentInput.maxLength) {
					document.getElementById(nextInputId).focus();
				}
			}

			document.querySelector("#comprobar").addEventListener("click", validarClave);

			$("#registrar").click(validar);

		});
	</script>

</body>

</html>