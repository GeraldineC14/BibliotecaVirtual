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

    if($_GET['operacion'] == 'registrarPrestamos'){
        $datosSolicitados = [
            "idbook"         => $_GET['idbook'],
            "idusers"        => $_GET['idusers'],
            "observation"    => $_GET['observation'],
            "loan_date"      => $_GET['loan_date'],
            "return_date"    => $_GET['return_date'],
            "amount"         => $_GET['amount']
        ];
        $prestamo->registrarPrestamos($datosSolicitados);
    }
}



?>