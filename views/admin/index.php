<?php
session_start();
/*if (!isset($_SESSION['login']) || !$_SESSION['login']['acceso']){
    header("Location:../login.php");
}*/
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Libros</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/popups.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
    />
    <!-- CSS datatable -->
    <link
      rel="stylesheet"
      href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"
    />
    <!-- LightBox -->
    <link rel="stylesheet" href="../../vendor/lightbox/css/lightbox.min.css" />
    <!-- DataTable Responsive -->
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css"
    />
    <link rel="shortcut icon" href="../../assets/img/Insignia.ico" />
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- SIDEBAR -->
      <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 toggled" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <div class="container-fluid d-flex flex-column p-0">
          <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="admin.view.php">
            <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">
              <span>HORACIO</span>
            </div>
          </a>
          <!-- OPCIONES QUE DEBEN SER FILTRADAS DE ACUERD AL PERFIL -->
          <ul class="navbar-nav text-light" id="accordionSidebar">
            <?php require_once 'sidebaroptions.php'; ?>
          </ul>

          <!-- FIN OPCIONES DEL SIDEBAR -->

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block" />
          <!-- Botón circular Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
          </div>
        </div>
      </nav>
      <!-- FIN Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <div class="container-fluid">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>  
            <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100">
                          <font face="impact"><h2 >Módulo de Libros</h2></font>
                        </form>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <!-- NOMBRE USUARIO & IMAGEN -->
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="">
                                        <span class="d-none d-lg-inline mr-2 text-gray-600 small"><?= $_SESSION['login']['namess']?> <?= $_SESSION['login']['surnames']?> </span>
                                        <img class="border rounded-circle img-profile" src="../../assets/img/profile.png" />
                                    </a>
                                    <!--  -->

                                    <!-- PERFIL & SALIR -->
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                                        <a class="dropdown-item" href="../admin/index.php?view=perfil.view.php">
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
          <!-- Begin Page Content -->
          <div class="container-fluid" id="content-dinamics"></div>
          <!-- /.container-fluid -->
          <!-- Fin contenido dinámico -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="bg-white sticky-footer">
          <div class="container my-auto">
            <div class="text-center my-auto copyright">
              <span>Copyright © IA Tech 2023</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <script
      src="https://kit.fontawesome.com/1380163bda.js"
      crossorigin="anonymous"
    ></script>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/chart.min.js"></script>
    <script src="../../assets/js/bs-init.js"></script>
    <script src="../../assets/js/jquery.easing.min.js"></script>
    <script src="../../assets/js/theme.js"></script>

    <!-- font -->
    <script
      defer
      src="https://kit.fontawesome.com/7a0163df78.js"
      crossorigin="anonymous"
    ></script>
    <!-- Boostrap 4.6 -->
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
      integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
      crossorigin="anonymous"
    ></script>
    <!-- Datatable -->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- DataTable Responsive -->
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        //Crearemos una función que obtenga la URL(vista)
        function getURL() {
          //1. Obtener la URL
          const url = new URL(window.location.href);
          //2. Obtener el valor enviado por la URL
          const vista = url.searchParams.get("view");
          //3. Crear un objeto que referencia contenedor
          const contenedor = document.querySelector("#content-dinamics");

          //Cuando el usuario elige una opción...
          if (vista != null) {
            fetch(vista)
              .then((respuesta) => respuesta.text())
              .then((datos) => {
                contenedor.innerHTML = datos;

                //Necesitamos recorrer todas las etiquetas <script> y "reactivarlas"
                const scriptsTag = contenedor.getElementsByTagName("script");
                for (i = 0; i < scriptsTag.length; i++) {
                  eval(scriptsTag[i].innerText);
                }
              });
          }
        }

        getURL();
      });
    </script>
  </body>
</html>
