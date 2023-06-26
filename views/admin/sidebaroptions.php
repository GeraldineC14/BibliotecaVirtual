<?php

//1. Necesitamos saber qué NIVEL DE ACCESO tiene el usuario
$permiso = $_SESSION['login']['accesslevel'];

//2. Array con los permisos por cada NIVEL DE ACCESO
$opciones = [];
$opciones2 = [];

//A - D - E
switch ($permiso) {
  case "A":

    //ADMIN/sidebar
    $opciones = [
      [
        "menu" => "Inicio", "url" => "index.php?view=admin.view.php",
        "icon" => "fa-solid fa-house fa-2xl"
      ],
      [
        "menu" => "Prestamos", "url" => "index.php?view=prestamos.view.php",
        "icon" => "fa-solid fa-boxes-packing fa-2xl"
      ],
      [
        "menu" => "Libros", "url" => "index.php?view=libros.view.php",
        "icon" => "fa-solid fa-book fa-2xl"
      ],
      [
        "menu" => "Usuarios", "url" => "index.php?view=docente.view.php",
        "icon" => "fa-solid fa-user fa-2xl"
      ],
      [
        "menu" => "Categoría", "url" => "index.php?view=categoria.view.php",
        "icon" => "fas fa-clipboard fa-2xl"
      ],
      [
        "menu" => "Comentarios", "url" => "index.php?view=comentario.view.php",
        "icon" => "fa-regular fa-comment-dots fa-2xl"
      ],
      [
        "menu" => "Subcategoría", "url" => "index.php?view=subcategoria.view.php",
        "icon" => "fas fa-list fa-2xl"
      ]
    ];

    //Vista de edit
    $opciones2 = [
      ["menu2" => "PDF", "url2" => "index.php?view=edit-pdf.php"],
      ["menu2" => "Portada", "url2" => "index.php?view=edit-frontpage.php"],
      ["menu2" => "Perfil", "url2" => "index.php?view=perfil.view.php"],
      ["menu2" => "Reporte", "url2" => "index.php?view=report.php"]
    ];

    break;
  case "D":
    $opciones = [
      [
        "menu" => "Inicio", "url" => "index.php?view=admin.view.php",
        "icon" => "fa-solid fa-house fa-2xl"
      ],
      [
        "menu" => "Prestamos", "url" => "index.php?view=prestamos.view.php",
        "icon" => "fas fa-truck-ramp-box fa-2xl"
      ]
    ];
    break;
  case "E":
    $opciones = [
      [
        "menu" => "Inicio", "url" => "index.php?view=admin.view.php",
        "icon" => "fa-solid fa-house fa-2xl"
      ],
      [
        "menu" => "Prestamos", "url" => "index.php?view=prestamos.view.php",
        "icon" => "fas fa-truck-ramp-box fa-2xl"
      ]
    ];
    break;
}

//Renderizar los ítems del SIDEBAR
foreach ($opciones as $item) {
  echo "
  <br>
    <li class='nav-item pl-3' style='font-weight: bold'>
        <a class='nav-link' href='{$item['url']}'>
            <i class='{$item['icon']}'></i>&nbsp;
            <span>&nbsp;&nbsp;{$item['menu']}</span>
        </a>
    </li>
  ";
}
