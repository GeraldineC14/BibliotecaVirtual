<?php
session_start();
if (isset($_SESSION['login'])) {
    // Usuario logeado
    $navItems = '
        <li class="btn btn-info"><a class="nav-link active text-dark" href="./index.php"><i class="fa-solid fa-house fa-xl" style="color: #fafafa;"></i></a> Inicio</li>
        <li class="btn btn-info ml-3 mr-3"><a class="nav-link active text-dark" href="../views/admin/index.php?view=admin.view.php"><i class="fa-solid fa-book-open-reader fa-xl" style="color: #ededed;"></i></a> Prestamo</li>
        <li class="btn btn-info"><a class="nav-link active text-dark" href="../controllers/usuario.controller.php?operacion=cerrar-sesion"><i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff;"></i></a>Salir</li>
    ';
} else {
    // Usuario no logeado
    $navItems = '
        <li class="btn btn-info"><a class="nav-link active text-dark" href="./index.php"><i class="fa-solid fa-house fa-xl" style="color: #fafafa;"></i></a> Inicio</li>
        <li class="btn btn-info ml-3"><a class="nav-link active text-dark" href="../views/login.php"><i class="fa-solid fa-arrow-right-to-bracket fa-xl" style="color: #ffffff;"></i></a> Ingresar</li>
    ';
}

if (!isset($_SESSION['login']) || !isset($_SESSION['login']['idusers'])) {
    // Manejar el caso cuando el array o la clave no están definidos
    $_SESSION['login'] = array();
    $_SESSION['login']['idusers'] = '-1'; // Establecer un valor por defecto
}

$logoImagePath = '../assets/img/Logo.svg?h=caf877a66b61baa8840eb2b50b02740e'; // Ruta de la imagen del logo
?>


<nav class="navbar navbar-dark navbar-expand-md sticky-top bg-danger py-3">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="./index.php">
            <img src="<?php echo $logoImagePath; ?>" width="70" height="70">
            <span style="font-family: 'Archivo Black', sans-serif;font-size: 22px;">Horacio Zeballos</span>
        </a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-5">
            <span class="sr-only"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-5" style="font-size: 20px;">
            <ul class="navbar-nav ml-auto">
                <?php echo $navItems; ?>
            </ul>
        </div>
    </div>
</nav>
