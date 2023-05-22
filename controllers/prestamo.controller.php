<?php
require_once '../models/Prestamo.php';
$prestamo = new Prestamo();

if(isset($_GET['operacion'])){

    if($_GET['operacion']== 'listarPrestamos'){
        echo json_encode($prestamo->listarPrestamos());
    }

    if($_GET['operacion'] == 'listarUsuarioLoans'){
        $dataprestamo = $prestamo->listarUsuarioLoans();
        echo json_encode($dataprestamo);
    }

}



?>