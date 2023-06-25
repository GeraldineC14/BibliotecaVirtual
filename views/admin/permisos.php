<?php
session_start();

//1. Obteniendo nivel de acceso (LOGIN)
$nivelacceso = $_SESSION['login']['accesslevel'];
//$nivelacceso = A - D - E

//2. Obtener el nombre de la vista
$url = $_SERVER['REQUEST_URI'];
$url_array = explode("/", $url);
$vistaActiva = $url_array[count($url_array) - 1];

//3. Definir los permisos
$permisos = [
  "A" => ["admin.view.php", "libros.view.php", "prestamos.view.php", "docente.view.php","perfil.view.php","categoria.view.php","subcategoria.view.php", "edit-pdf.php", "edit-frontpage.php", "report.php"],
  "D" => ["admin.view.php", "prestamos.view.php","perfil.view.php"],
  "E" => ["admin.view.php", "prestamos.view.php","perfil.view.php"]
];

//4. Validar el acceso
$autorizado = false;

//5. Comprobar los permisos
$vistasPermitidas = $permisos[$nivelacceso];

foreach($vistasPermitidas as $item){
  if ($item == $vistaActiva){
    $autorizado = true;
  }
}

if (!$autorizado){
  //Cargar una vista
  echo "<h1>Acceso restringido</h1>";
  exit();
}

?>