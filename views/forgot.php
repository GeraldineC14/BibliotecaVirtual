<?php


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
  <link rel="stylesheet" href="../assets/css/prueba.css">

</head>

<body>
  <!-- navbar -->
  <?php include './navbar.php'; ?>
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

  <div class="modal fade" id="modal-validacion" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog        ">
      <div class="modal-content">
        <div class="modal-header bg-success text-light">
          <i class="fa-solid fa-key fa-sm" style="color: #ffffff;"></i>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="form-group text-center" action="" autocomplete="off" id="form-clave">
            <h4>INGRESAR CODIGO</h4>
            <label for="clave" class="form-label text-justify">
              Te enviamos un código a tu e-mail para que puedas restablecer tu contraseña.
              Si no lo encuentras revisa el Correo No Deseado.
            </label>
            <div class="form-group mt-3" id="keys">
              <input class="inputc" type="tel" id="key1" maxlength="1" oninput="moveToNextInput(this, 'key2')" />
              <input class="inputc" type="tel" id="key2" maxlength="1" oninput="moveToNextInput(this, 'key3')" />
              <input class="inputc" type="tel" id="key3" maxlength="1" oninput="moveToNextInput(this, 'key4')" />
              <input class="inputc" type="tel" id="key4" maxlength="1" oninput="moveToNextInput(this, 'comprobar')"/>
            </div>
            <div id="inputs-clave" class="d-none">
              <div class="md-3">
                <label for="clave1" class="form-label">Escribe tu nueva contraseña:</label>
                <input type="password" class="form-control" id="clave1">
              </div>

              <div>
                <label for="clave2" class="form-label">Vuelva a ingresar su contraseña:</label>
                <input type="password" class="form-control" id="clave2">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-lg-center">
          <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" id="comprobar">Comprobar</button>
          <button type="button" class="btn btn-primary d-none" id="actualizar">Actualizar clave</button>
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
        parametros.append("usuario", document.querySelector("#datosuser").value);
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

      function validarClave() {
        const parametros = new URLSearchParams();
        const key1 = document.getElementById("key1").value;
        const key2 = document.getElementById("key2").value;
        const key3 = document.getElementById("key3").value;
        const key4 = document.getElementById("key4").value;
        const enterCode = `${key1}${key2}${key3}${key4}`;
        parametros.append("operacion", "validarClave");
        parametros.append("idusers", iduser);
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
              document.querySelector("#comprobar").classList.add("d-none");
              document.querySelector("#inputs-clave").classList.remove("d-none");
              document.querySelector("#actualizar").classList.remove("d-none");
              document.querySelector("#comprobar").classList.add("d-none");
            } else {
              alert("Clave incorrecta, revise su correo por favor");
            }
          });
      }

      function actualizarClave() {
        const clave1 = document.querySelector("#clave1").value;
        const clave2 = document.querySelector("#clave2").value;

        //Si ninguna caja esta vacia
        if (clave1 != "" && clave2 != "") {
          if (clave1 == clave2) {
            const parametros = new URLSearchParams();
            parametros.append("operacion", "actualizarClave");
            parametros.append("idusers", iduser);
            parametros.append("accesskey", clave1);
            fetch(`../controllers/Usuario.controller.php`, {
              method: 'POST',
              body: parametros
            })
              .then(respuesta => respuesta.json())
              .then(datos => {
                alert("Se actualizó su clave.. vuelva a iniicar sesión");
                window.location.href = '../index.php';
              });

          }
        }
      }

      modal._element.addEventListener("shown.bs.modal", () => {
        document.querySelector("#key1").focus();
      });

      //Evento nativo del MODAL....  "Al cerrar el modal"
      modal._element.addEventListener("hidden.bs.modal", () => {
        document.querySelector("#form-clave").reset();
        document.querySelector("#inputs-clave").classList.add("d-none");
        document.querySelector("#comprobar").classList.remove("d-none");
        document.querySelector("#actualizar").classList.add("d-none");
      });

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
      document.querySelector("#comprobar").addEventListener("click", validarClave);
      document.querySelector("#actualizar").addEventListener("click", actualizarClave);

      document.querySelector("#user").addEventListener("keypress", (key) => {
        if (key.keyCode == 13) {
          buscador();
        }
      })

      window.moveToNextInput = function(currentInput, nextInputId) {
      if (currentInput.value.length === currentInput.maxLength) {
        document.getElementById(nextInputId).focus();
      }
    }
    })

  </script>

</body>

</html>