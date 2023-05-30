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
                        <a class="nav-link" href="admin.view.php">
                            <i class="fa-solid fa-house fa-xl"></i>
                            <span>INICIO</span>
                        </a>
                    </li>
                    <hr class="sidebar-divider">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#libros"
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fa-solid fa-book fa-xl"></i>
                            <span>LIBROS</span>
                        </a>
                        <div id="libros" class="collapse" aria-labelledby="headingUtilities"
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
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fa-solid fa-user-plus fa-xl"></i>
                            <span>USUARIOS</span>
                        </a>
                        <div id="usuarios" class="collapse" aria-labelledby="headingUtilities"
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
            </div>
        </nav>
        <!-- FIN SIDEBAR LEFT -->
</div>