<?php
session_start();

if (!isset($_SESSION['login']) || !$_SESSION['login']['acceso']){
    header("Location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>HZG Admin</title>
    <!-- CDN de Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css" />
    <!-- Color Siderbar -->
    <link rel="stylesheet" href="../../assets/css/navSid.css" />
    <!-- Bootstrap min -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <!-- CDN datatable -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <!-- LightBox -->
    <link rel="stylesheet" href="../../vendor/lightbox/css/lightbox.min.css">
    <!-- DataTable Responsive -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" />
    <!-- Librería Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Icono de la pestaña -->
    <link rel="shortcut icon" href="../../assets/img/Insignia.ico" />
    <!-- Título de los Módulos -->
    <link rel="stylesheet" href="../../assets/css/title.css">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #415a76;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="./index.php?view=admin.view.php" style="font-weight: bold; font-size:20px; font-family:'Courier New', Courier, monospace;">
            <span style="background-color: #415a76; color: #000000; padding:5px; border-radius:5px">Horacio Zeballos</span>
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fa fa-bars fa-lg" style="color: #000000;"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user fa-lg" style="color: #000000;"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../../index.php">Biblioteca</a>
                <a class="dropdown-item" href="./index.php?view=perfil.view.php">Perfil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../controllers/usuario.controller.php?operacion=cerrar-sesion">Salir</a>
            </div>
            </li>
        </ul>
        
    </nav>
    <div id="layoutSidenav">
        <!-- SidebarOptions -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!-- OPCIONES QUE DEBEN SER FILTRADAS DE ACUERDO AL PERFIL -->
                        <?php require_once 'sidebaroptions.php'; ?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Bienvenido:</div>
                    <span>
                        <?= $_SESSION['login']['namess'] ?>
                        <?= $_SESSION['login']['surnames'] ?>
                    </span>
                </div>
            </nav>
        </div>
        <!-- FIN -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid mt-3">
                    <div class="container-fluid" id="content-dinamics"></div>
                </div>
            </main>
        </div>
    </div>
     <!-- Script jquery -->
     <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/chart.min.js"></script>
    <script src="../../assets/js/bs-init.js"></script>
    <script src="../../assets/js/jquery.easing.min.js"></script>
    <script src="../../assets/js/theme.js"></script>
    <!-- Boostrap 4.6 -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <!-- Script de Fontawesome -->
    <script src="https://kit.fontawesome.com/1380163bda.js" crossorigin="anonymous"></script>
    <!-- Script de Siderbar -->
    <script src=".././../assets/js/navSid.js"></script>
   

    <!-- Datatable -->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- DataTable Responsive -->
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <!-- Lightbox -->
    <script src="../../vendor/lightbox/js/lightbox.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CDN Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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