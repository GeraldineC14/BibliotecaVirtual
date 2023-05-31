<?php

//1. Necesitamos saber qué NIVEL DE ACCESO tiene el usuario
$permiso = $_SESSION['login']['accesslevel'];

//2. Array con los permisos por cada NIVEL DE ACCESO
$opciones = [];

//A - D - E
switch ($permiso){
  case "A":
    $opciones = [
      ["menu" => "Inicio", "url" => "slider.general.php?view=admin/admin.view.php",
                 "icon" => "fa-solid fa-house fa-xl"],
      ["menu" => "Libros", "url" => "template/slider.general.php?view=libros.view.php",
                 "icon" => "fa-solid fa-book fa-xl"],
      ["menu" => "Prestamos", "url" => "slider.general.php?view=admin/prestamos.view.php",
                 "icon" => "fa-solid fa-file-signature fa-xl"],
      ["menu" => "Usuarios", "url" => "slider.general.php?view=admin/docente.view.php",
                 "icon" => "fa-solid fa-user-plus fa-xl"]
    ];
  break;
  case "D":
    $opciones = [
      ["menu" => "Inicio", "url" => "slider.general.php?view=../admin/admin.view.php",
                 "icon" => "fa-solid fa-house fa-xl"],
      ["menu" => "Prestamos", "url" => "slider.general.php?view=../admin/prestamos.view.php",
                 "icon" => "fa-solid fa-file-signature fa-xl"]
    ];    
  break;
  case "E":
    $opciones = [
      ["menu" => "Inicio", "url" => "template/slider.general.php?view=admin.view.php",
                 "icon" => "fa-solid fa-house fa-xl"],
      ["menu" => "Prestamos", "url" => "template/slider.general.php?view=prestamos.view.php",
                 "icon" => "fa-solid fa-file-signature fa-xl"]
    ];
  break;
}

//Renderizar los ítems del SIDEBAR
foreach($opciones as $item){
  echo "
    <hr class='sidebar-divider'>
    <li class='nav-item'>
        <a class='nav-link' href='{$item['url']}'>
            <i class='{$item['icon']}'></i>
            <span>{$item['menu']}</span>
        </a>
    </li>
  ";
}