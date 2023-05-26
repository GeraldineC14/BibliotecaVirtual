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
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-all.min.css" /></head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 toggled">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="admin.view.php">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>HORACIO</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="admin.view.php"><i class="fa-solid fa-house fa-xl"></i><span>INICIO</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="libros.view.php"><i class="fa-solid fa-book fa-xl"></i><span>LIBROS</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="prestamos.view.php"><i class="fa-solid fa-file-signature fa-xl"></i><span>PRESTAMOS</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="usuarios.view.php"><i class="fa-solid fa-user-plus fa-xl"></i><span>USUARIOS</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                              <div class="nav-item dropdown no-arrow">
                                  <!-- NOMBRE USUARIO & IMAGEN -->
                                  <a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="">
                                      <span class="d-none d-lg-inline mr-2 text-gray-600 small"><?= $_SESSION['ses_namess']?> <?= $_SESSION['ses_surnames']?> </span>
                                      <img class="border rounded-circle img-profile" src="../../assets/img/perfil.jpg" />
                                  </a>
                                  <!--  -->
                            
                                  <!-- PERFIL & SALIR -->
                                  <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                                      <a class="dropdown-item" href="profile.view.php">
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
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Mi Perfil</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="../../assets/img/perfil.jpg" width="160" height="160">
                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Actualizar</button></div>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Configuración</p>
                                        </div>
                                        <div class="card-body">
                                            <form id="datos" autocomplete="off">
                                                <!-- Usuario y correo -->
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="email"><strong>Correo</strong></label>
                                                            <input class="form-control" type="email" id="email" placeholder="usuario@example.com" name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Nombres y apellidos -->
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="namess"><strong>Nombres</strong></label>
                                                            <input class="form-control" type="text" id="namess" placeholder="nombres" name="first_name">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="surnames"><strong>Apellidos</strong></label>
                                                            <input class="form-control" type="text" id="surnames" placeholder="apellidos" name="last_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Change password -->
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="accesskey"><strong>Contraseña</strong></label>
                                                            <input class="form-control" type="password" id="accesskey" placeholder="******" name="first_name">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="repetir"><strong>Confirmar contraseña</strong></label>
                                                            <input class="form-control" type="password" id="repetir" placeholder="******" name="last_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Boton guardar cambios -->
                                                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Guardar</button></div>
                                            </form>
                                        </div>
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
    <script src="https://kit.fontawesome.com/1380163bda.js" crossorigin="anonymous"></script>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets//js/bootstrap.min.js"></script>
    <script src="../../assets/js/chart.min.js"></script>
    <script src="../../assets/js/bs-init.js"></script>
    <script src="../../assets/js/jquery.easing.min.js"></script>
    <script src="../../assets/js/theme.js"></script>



<script>
    $(document).ready(function(){
        function Vistadatos(){
            idusers = <?= $_SESSION['idusers']?>;
            $.ajax({
                url: '../../controllers/usuario.controller.php',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    'operacion' : 'getUsers', 
                    'idusers': idusers
                },
                success: function(result){
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