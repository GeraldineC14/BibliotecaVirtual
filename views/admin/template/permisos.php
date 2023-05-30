<?php
//Esta información fue asignada en el CONTROLADOR
$permisos = $_SESSION['login']['accesslevel'];

//En este arreglo se guarda el "menu" que es el nombre que se deberá mostrar
//en la vista (sidebar) y la URL que será el valor para el atributo <a href=''>
$opciones = [];

switch ($permisos){
  case "A":
    //El administrador tiene acceso a todo
    $opciones = [
      ["menu" => "Inicio", "url" => "../admin/admin.view.php"],
      ["menu" => "Libros", "url" => "../admin/libros.view.php"],
      ["menu" => "Prestamos", "url" => "../admin/prestamos.view.php"],
      ["menu" => "Usuarios", "url" => "../admin/docente.view.php"]
    ];
  break;
  case "D":
    //El docente tiene acceso a varios módulos
    $opciones = [
      ["menu" => "Inicio", "url" => "../admmin/admin.view.php"],
      ["menu" => "Prestamos", "url" => "../admin/prestamos.view.php"]
    ];
  break;
  case "E":
    //El estudiante tiene acceso solo a pocas funciones
    $opciones = [
      ["menu" => "Inicio", "url" => "../admin/admin.view.php"],
      ["menu" => "Prestamos", "url" => "../admin/prestamos.view.php"]
    ];
  break;
}

//Ahora renderizamos los permisos
foreach($opciones as $item){
  echo "
    <hr class='sidebar-divider'>
    <li class='nav-item'>
        <a class='nav-link' href='{$item['url']}'>
            <i class='fa-solid fa-file-signature fa-xl'></i>
            <span>{$item['menu']}</span>
        </a>
    </li>
  ";
}

?>