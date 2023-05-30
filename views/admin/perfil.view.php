<?php

session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Mi Perfil</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" />
  <link rel="stylesheet" href="../../assets/fonts/fontawesome-all.min.css" />
  <link rel="shortcut icon" href="../../assets/img/Insignia.ico" />
</head>

<body id="page-top">
  <div id="wrapper">
    <?php include "./template/slider.general.php"; ?>
    <div class="d-flex flex-column" id="content-wrapper">
      <div id="content">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
          <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop"
              type="button"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav flex-nowrap ml-auto">
              <div class="d-none d-sm-block topbar-divider"></div>
              <li class="nav-item dropdown no-arrow">
                <div class="nav-item dropdown no-arrow">
                  <!-- NOMBRE USUARIO & IMAGEN -->
                  <a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="">
                    <span class="d-none d-lg-inline mr-2 text-gray-600 small">
                      <?= $_SESSION['ses_namess']?>
                      <?= $_SESSION['ses_surnames']?>
                    </span>
                    <img class="border rounded-circle img-profile" src="../../assets/img/profile.png" />
                  </a>
                  <!--  -->

                  <!-- PERFIL & SALIR -->
                  <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                    <a class="dropdown-item" href="../admin/perfil.view.php">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      &nbsp;Perfil
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../../controllers/usuario.controller.php?operacion=cerrar-sesion">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      &nbsp;Salir
                    </a>
                  </div>
                  <!--  -->
                </div>
              </li>
            </ul>
          </div>
        </nav>



        <div class="container">
          <div class="row flex-lg-nowrap">
            <div class="col">
              <div class="row">
                <div class="col mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="e-profile">
                        <div class="row">
                          <div class="col-12 col-sm-auto mb-3">
                          </div>
                          <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                              <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">Nombre y Apellido</h4>
                            </div>
                            <div class="text-center text-sm-right">
                              <span class="badge badge-secondary">ROL(docente)</span>
                              <div class="text-muted"><small>Fecha Actual - 09 Dec 2017</small></div>
                            </div>
                          </div>
                        </div>
                        <ul class="nav nav-tabs">
                          <li class="nav-item"><a href="" class="active nav-link">Configuración</a></li>
                        </ul>
                        <div class="tab-content pt-3">
                          <div class="tab-pane active">
                            <form class="form" novalidate="">
                              <div class="row">
                                <div class="col">

                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" type="text" name="name" placeholder="nombre">
                                      </div>
                                    </div>
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Apellido</label>
                                        <input class="form-control" type="text" name="username" placeholder="apellido">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Correo</label>
                                        <input class="form-control" type="email" name="email" placeholder="Correo" readonly>
                                      </div>
                                    </div>
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Categoria</label>
                                        <input class="form-control" type="text" name="username" placeholder="Docente" readonly>
                                      </div>
                                    </div>
                                  </div>


                                  <div class="mb-2"><b>Cambiar Contraseña</b></div>

                                  <div class="row">
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Contraseña</label>
                                        <input class="form-control" type="password" placeholder="*****" autofocus>
                                      </div>
                                    </div>
                                    <div class="col">
                                      <div class="form-group">
                                        <label>Confirmar Contraseña</label>
                                        <input class="form-control" type="password" placeholder="*****">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>                                
                              </div>
                              <div class="row">
                                <div class="col d-flex justify-content-end">
                                  <button class="btn btn-warning" type="submit">
                                    <i class="fa-solid fa-key"></i>
                                    <span>Cambiar Contraseña</span> 
                                  </button>
                                </div>
                              </div>
                            </form>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>

                <div class="col-12 col-md-3 mb-3">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="px-xl-3">
                        <button class="btn btn-block btn-danger">
                        <i class="fa-sharp fa-solid fa-xmark"></i>
                          <span>Cancelar</span>
                        </button>
                        <button class="btn  btn-block btn-success mt-3" type="submit">
                          <i class="fa-solid fa-floppy-disk"></i>
                          <span> Guardar</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <footer class="bg-white sticky-footer">
            <div class="container my-auto">
              <div class="text-center my-auto copyright"><span>Copyright © IA Tech 2023</span></div>
            </div>
          </footer>
        </div>  
      </div>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/1380163bda.js" crossorigin="anonymous"></script>
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets//js/bootstrap.min.js"></script>
  <script src="../../assets/js/chart.min.js"></script>
  <script src="../../assets/js/bs-init.js"></script>
  <script src="../../assets/js/jquery.easing.min.js"></script>
  <script src="../../assets/js/theme.js"></script>



  <script>

    // Script para el cambio de Titulo
    let isTitle = document.title;
    let titleTimeout;

    const starChangeTitle = () => {
      titleTimeout = setInterval(function () {
        document.title = document.title === isTitle ? "Horacio Zeballos Gamez" : isTitle;
      }, 1800);
    };
    window.addEventListener("load", starChangeTitle);

    $(document).ready(function () {
      function Vistadatos() {
        idusers = <?= $_SESSION['idusers'] ?>;
        $.ajax({
          url: '../../controllers/usuario.controller.php',
          type: 'GET',
          dataType: 'JSON',
          data: {
            'operacion': 'getUsers',
            'idusers': idusers
          },
          success: function (result) {
            console.log(result);
            $("#namess").val(result['namess']);
            $("#surnames").val(result['surnames']);
            $("#email").val(result['email']);
            $("#accesskey").val(result['accesskey']);
            $("#repetir").val(result['accesskey']);

          }
        });
      }

      Vistadatos();

    });
  </script>
</body>

</html>