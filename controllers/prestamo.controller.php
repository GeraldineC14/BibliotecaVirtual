<?php
require_once '../models/Prestamo.php';
$prestamo = new Prestamo();

if (isset($_GET['operacion'])) {
    if ($_GET['operacion'] == 'listarPrestamos') {
        echo json_encode($prestamo->listarPrestamos($_GET['idusers'], $_GET['accesslevel']));
    }

    if ($_GET['operacion'] == 'listarUsuarioLoans') {
        $dataprestamo = $prestamo->listarUsuarioLoans();
        echo json_encode($dataprestamo);
    }

    if ($_GET['operacion'] == 'registrarPrestamos') {
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

    if ($_GET['operacion'] == 'cambiarEstadoPrestamo') {
        $datosSolicitados = [
            "idloan"         => $_GET['idloan'],
            "state"        => $_GET['state']
        ];
        $prestamo->cambiarEstadoPrestamo($datosSolicitados);
    }

    if ($_GET['operacion'] == 'devolverPrestamo') {
        $prestamo->devolverPrestamo($_GET['idloan']);
    }
}
