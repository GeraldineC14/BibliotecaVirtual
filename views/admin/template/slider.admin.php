<div id="wrapper">
        <!-- INICIO SIDEBAR LEFT -->
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 toggled">
            <div class="container-fluid d-flex flex-column p-0">
                <!-- INICIO LOGO -->
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                    href="admin.view.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">
                        <span>HORACIO</span>
                    </div>
                </a>
                <!--  -->

                <!-- INICIO SECCIONES SIDEBAR -->
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link active" href="admin.view.php">
                            <i class="fa-solid fa-house fa-xl"></i>
                            <span>INICIO</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#libros"
                            aria-expanded="true" aria-controls="libros">
                            <i class="fa-solid fa-book fa-xl"></i>
                            <span>LIBROS</span>
                        </a>
                        <div id="libros" class="collapse" aria-labelledby="libros"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Registro:</h6>
                                <a class="collapse-item" href="libros.view.php">Libros</a>
                                <a class="collapse-item" href="categoria.view.php">Categorias</a>
                                <a class="collapse-item" href="subcategoria.view.php">Subcategorias</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="prestamos.view.php">
                            <i class="fa-solid fa-file-signature fa-xl"></i>
                            <span>PRESTAMOS</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#usuarios"
                            aria-expanded="true" aria-controls="usuarios">
                            <i class="fa-solid fa-user-plus fa-xl"></i>
                            <span>USUARIOS</span>
                        </a>
                        <div id="usuarios" class="collapse" aria-labelledby="usuarios"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Registro:</h6>
                                <a class="collapse-item" href="./docente.view.php">Docentes</a>
                                <a class="collapse-item" href="./externo.view.php">Externos</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- -->

                <!-- INICIO OCULTAR SIDEBAR -->
                <div class="text-center d-none d-md-inline">
                    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                </div>
                <!-- -->

                <!-- INICIO POPUP BIENVENIDA -->
                <div class="notificacion">
                    <p>Bienvenido,
                        <?= $_SESSION['ses_namess']?> 👋
                    </p>
                    <span class="notification_progress"></span>
                </div>
                <!-- -->
            </div>
        </nav>
        <!-- FIN SIDEBAR LEFT -->

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- INICIO PERFIL -->
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <!-- NOMBRE USUARIO & IMAGEN -->
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown"
                                        href="">
                                        <span class="d-none d-lg-inline mr-2 text-gray-600 small">
                                            <?= $_SESSION['ses_namess']?>
                                            <?= $_SESSION['ses_surnames']?>
                                        </span>
                                        <img class="border rounded-circle img-profile"
                                            src="../../assets/img/profile.png" />
                                    </a>
                                    <!--  -->

                                    <!-- PERFIL & SALIR -->
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                                        <a class="dropdown-item" href="../admin/perfil.view.php">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            &nbsp;Perfil
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item"
                                            href="../../controllers/usuario.controller.php?operacion=cerrar-sesion">
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
                <!-- FIN PERFIL -->

                <!-- CONTENEDOR DE DATOS -->
                <main class="app-content ml-5 mt-5 mr-5">
                    <div class="row">
                        <!-- Libros -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center" >
                                        <div class="col mr-2">
                                            <a  href="./libros.view.php">
                                                <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                    Libros</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800" >502</div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-550"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Docentes -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="./docente.view.php">
                                                <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                                    Docentes</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">54</div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x text-gray-550"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Estudiantes -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="./externo.view.php">                                                
                                                <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                                    Usuarios</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">657</div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book-open-reader fa-2x text-gray-550"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Prestamos -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="./prestamos.view.php">
                                                <div class="text-s font-weight-bold text-info text-uppercase mb-1">
                                                    Prestamos</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-truck-ramp-box fa-2x text-gray-550"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Categoria -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="./categoria.view.php">
                                                <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                                    Categorias</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">54</div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard fa-2x text-gray-550"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Subcategoria -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="./subcategoria.view.php">
                                                <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                                    Subcategoria</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">64</div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list fa-2x text-gray-550"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Autores -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters success-items-center">
                                        <div class="col mr-2">
                                            <a href="./autor.view.php">
                                                <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                    Autores</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">115</div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-550"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Configuración -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="./perfil.view.php">
                                                <div class="text-s font-weight-bold text-dark text-uppercase mb-1">CONFIGURACION</div>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-gears fa-2x text-gray-550"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- FIN CONTENEDOR DATOS -->
            </div>
        </div>
    </div>