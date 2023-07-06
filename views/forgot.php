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

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div class="wrap d-md-flex">
            <div class="img" style="background-image: url(../assets/img/bg-2.png);"></div>
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
                    <button class="btn btn-success btn-sm" type="button" id="buscar">Buscar</button>
                    <button class="btn btn-info btn-sm" type="reset">Reiniciar</button>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="datosuser" readonly="true">
                    <label for="datosuser" class="form-label">Datos del usuario:</label>
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="email" readonly="true">
                    <label for="email" class="form-label">Correo electrónico:</label>
                  </div>
                </div>
                <div class="">
                  <button class="btn btn-outline-danger text-start" type="button" id="">Volver</button>
                  <button class="btn btn-outline-success text-end" type="button" id="enviar">Enviar mensaje</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="modal fade" id="modal-validacion" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="true"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-light">
          <h5 class="modal-title" id="exampleModalLabel">Validar código</h5>
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

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/9b57fc34f2.js" crossorigin="anonymous"></script>

  <!-- SweetAlert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Custom Scripts -->
  <script src="../assets/js/main.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {

      let iduser = -1;

      const modal = new bootstrap.Modal(document.querySelector("#modal-validacion"));

      function buscador() {
        let parametros = new URLSearchParams();
        parametros.set("operacion","searchUser")
        parametros.set("user", document.querySelector("#user").value)

        fetch(`../controllers/usuario.controller.php`, {
          method: 'POST',
          body: parametros
        })
          .then(respuesta => respuesta.text())
          .then(datos => {
            if (datos!= "") {
              const registro = JSON.parse(datos);

              iduser = registro.idusers;
              document.querySelector("#datosuser").value = `${registro.surnames} ${registro.namess}`;
              document.querySelector("#email").value = registro.email;
            } else {
              alert("Usuario no encontrado");
              iduser = -1;
              document.querySelector("#datosuser").value = '';
              document.querySelector("#email").value = '';
            }
          });
      }

      function generarEnviarCodigo() {
        const parametros = new URLSearchParams()
        parametros.append("operacion","enviarCorreo");
        parametros.append("email", document.querySelector("#email").value);
        parametros.append("idusers", iduser);
        console.log(iduser)
        fetch('../controllers/usuario.controller.php', {
          method: 'POST',
          body: parametros
        })
          .then(respuesta => respuesta.json())
          .then(datos => {
            console.log(datos);
            alert(datos.mensaje);
          });
      }

      document.querySelector("#enviar").addEventListener("click", () => {
        if (iduser != -1){
          generarEnviarCodigo();
          modal.toggle();
        }else{
          alert('Debe buscar un usuario');
          document.querySelector("#user").focus();
        }
      })

      document.querySelector("#buscar").addEventListener("click", buscador);

      document.querySelector("#user").addEventListener("keypress", (key) => {
        if (key.keyCode == 13) {
          buscador();
        }
      })

    })

  </script>

</body>

</html>