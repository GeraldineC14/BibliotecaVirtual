<?php

//1. Necesitamos saber qué NIVEL DE ACCESO tiene el usuario
$permiso = $_SESSION['login']['accesslevel'];

//2. Array con los permisos por cada NIVEL DE ACCESO
$opciones = [];

//A - D - E
switch ($permiso){
  case "A":
    $opciones = [
      ["menu" => "Inicio", "url" => "index.php?view=admin.view.php",
                 "icon" => "fa-solid fa-house fa-xl"],
      ["menu" => "Libros", "url" => "index.php?view=libros.view.php",
                 "icon" => "fa-solid fa-book fa-xl"],
      ["menu" => "Categoría", "url" => "index.php?view=categoria.view.php",
                 "icon" => "fa-solid fa-book fa-xl"],
      ["menu" => "Sub Categoría", "url" => "index.php?view=subcategoria.view.php",
                 "icon" => "fa-solid fa-book fa-xl"],
      ["menu" => "Prestamos", "url" => "index.php?view=prestamos.view.php",
                 "icon" => "fa-solid fa-file-signature fa-xl"],
      ["menu" => "Usuarios", "url" => "index.php?view=docente.view.php",
                 "icon" => "fa-solid fa-user-plus fa-xl"]
    ];
  break;
  case "D":
    $opciones = [
      ["menu" => "Inicio", "url" => "index.php?view=admin.view.php",
                 "icon" => "fa-solid fa-house fa-xl"],
      ["menu" => "Prestamos", "url" => "index.php?view=prestamos.view.php",
                 "icon" => "fa-solid fa-file-signature fa-xl"]
    ];
  break;
  case "E":
    $opciones = [
      ["menu" => "Inicio", "url" => "index.php?view=admin.view.php",
                 "icon" => "fa-solid fa-house fa-xl"],
      ["menu" => "Prestamos", "url" => "index.php?view=prestamos.view.php",
                 "icon" => "fa-solid fa-file-signature fa-xl"]
    ];
  break;
}

//Renderizar los ítems del SIDEBAR
foreach($opciones as $item){
  echo "
  <br>
    <li class='nav-item'>
        <a class='nav-link' href='{$item['url']}'>
            <i class='{$item['icon']}'></i>&nbsp;
            <span>{$item['menu']}</span>
        </a>
    </li>
  ";
}