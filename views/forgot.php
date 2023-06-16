<?php
session_start();


/*if(isset($_SESSION['login']) && $_SESSION['login'] == true){
  header("location:views/admin/admin.view.php");
}*/

?>
<!doctype html>
<html lang="es">

<head>
	<title>Recuperar Contraseña</title>
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
								<div class="w-100 text-center">
									<h3 class="mb-4">Recuperar Contraseña</h3>
								</div>
							</div>
							<form action="#" class="signin-form" autocomplete="off">
								<div class="form-group mb-3">
                                    <label for="user" class="form-label">Escriba nombre de usuario:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="user">
                                        <button class="btn btn-success" type="button" id="buscar">Buscar</button>
                                        <button class="btn btn-info" type="reset">Reiniciar</button>
                                    </div>
								</div>
								<div class="form-group mb-3">
                                    <div class="form-floating">
                                        <label for="datosuser" class="form-label">Datos del usuario:</label>
                                        <input type="text" class="form-control" id="datosuser" readonly="true">
                                    </div>
								</div>
                                <div class="form-group mb-3">
                                    <div class="form-floating">
                                        <label for="email" class="form-label">Correo electrónico:</label>
                                        <input type="text" class="form-control" id="email" readonly="true">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-outline-dark" type="button" id="enviar">Enviar mensaje de restauracion</button>
                                </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <div class="modal fade" id="" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog        ">
      <div class="modal-content">
        <div class="modal-header bg-primary text-light">
          <h5 class="modal-title" id="exampleModalLabel">Validar codigo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" autocomplete="off">
            <div class="form-floating">
              <label for="clave" class="form-label">Escriba la clave</label>
              <input type="number" maxlength="4" class="form-control" id="clave">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="comprobar">Comprobar</button>
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
	  </script>

</body>

</html>