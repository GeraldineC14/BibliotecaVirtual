<?php
session_set_cookie_params(0); // Establecer tiempo de expiración a 0 para que la sesión se cierre al cerrar el navegador

session_start();
$logoImagePath = '../assets/img/Logo.svg?h=caf877a66b61baa8840eb2b50b02740e'; // Ruta de la imagen del logo

// Verificar si el usuario está logeado
$isLoggedIn = isset($_SESSION['login']['idusers']);

// Verificar el valor de idusers y establecerlo a -1 si no está definido o no es un número válido
$idusers = $isLoggedIn ? $_SESSION['login']['idusers'] : -1;
if (!is_numeric($idusers)) {
    $idusers = -1;
}

// Construir los elementos de navegación según el estado de inicio de sesión y el valor de idusers
if ($idusers > 0) {
    // Usuario logeado
    $navItems = '
        <li class="nav-item mb-2 mr-2">
            <a class="nav-link active text-dark btn d-flex justify-content-center align-items-center mx-auto" href="./index.php" style="max-width: 130px; background-color: #39a2db; border-color: #39a2db;">
                <i class="fa-solid fa-house fa-xl" style="color: #fafafa;"></i>
                <span class="ml-2" style="color: white;">Inicio</span>
            </a>
        </li>
        <li class="nav-item mb-2 mr-2">
            <a class="nav-link active text-dark btn d-flex justify-content-center align-items-center mx-auto" href="../views/admin/index.php?view=admin.view.php" style="max-width: 130px; background-color: #39a2db; border-color: #39a2db;">
                <i class="fa-solid fa-book-open-reader fa-xl" style="color: #ededed;"></i>
                <span class="ml-2" style="color: white;">Prestamo</span>
            </a>
        </li>
        <li class="nav-item mb-2 mr-2">
            <a class="nav-link active text-dark btn d-flex justify-content-center align-items-center mx-auto" href="../controllers/usuario.controller.php?operacion=cerrar-sesion" style="max-width: 130px; background-color: #39a2db; border-color: #39a2db;">
                <i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff;"></i>
                <span class="ml-2" style="color: white;">Salir</span>
            </a>
        </li>
    ';
} else {
    // Usuario no logeado
    $navItems = '
        <li class="nav-item mb-2 mr-2">
            <a class="nav-link active text-dark btn" href="./index.php" style="background-color: #39a2db; border-color: #39a2db;">
                <i class="fa-solid fa-house fa-xl" style="color: #fafafa;"></i>
                <span class="ml-2" style="color: white;">Inicio</span>
            </a>
        </li>
        <li class="nav-item mb-2 mr-2">
            <a class="nav-link active text-dark btn btn-info" href="../views/login.php" style="background-color: #39a2db; border-color: #39a2db;">
                <i class="fa-solid fa-arrow-right-to-bracket fa-xl" style="color: #ffffff;"></i>
                <span class="ml-2" style="color: white;">Ingresar</span>
            </a>
        </li>
    ';
}
?>


<nav class="navbar navbar-dark navbar-expand-md sticky-top bg-danger py-3">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="./index.php">
            <img src="<?php echo $logoImagePath; ?>" width="70" height="70">
            <span style="font-family: 'Archivo Black', sans-serif;font-size: 22px;">Horacio Zeballos</span>
        </a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navcol-5" aria-controls="navcol-5" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-5" style="font-size: 20px;">
            <ul class="navbar-nav ml-auto">
                <?php echo $navItems; ?>
            </ul>
        </div>
    </div>
</nav>
