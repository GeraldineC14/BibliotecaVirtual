<?php
require_once '../models/Prestamo.php';
require_once '../tools/helpers.php';
$prestamo = new Prestamo();

if (isset($_GET['operacion'])) {

    // Listar Préstamo
    if ($_GET['operacion'] == 'listarPrestamo') {
        $datos = $prestamo->listarPrestamo();
        echo json_encode($datos);
    }

    if ($_GET['operacion'] == 'searchUsersloans') {
        $iduser = $_GET['iduser'];
        $resultado = $prestamo->searchUsersloans($iduser);
        echo json_encode($resultado);
    }

    // Registrar Préstamo Vista Principal
    if ($_GET['operacion'] == 'registrarPrestamo') {
        $data = array(
            'idbook' => $_GET['idbook'],
            'idusers' => $_GET['idusers'],
            'amount' => $_GET['amount'],
            'pickup_date' => $_GET['pickup_date'],
            'return_date' => $_GET['return_date'],
            'cancellation_date' => $_GET['cancellation_date'],
            'observation' => $_GET['observation']
        );

        $prestamo->registrarPrestamo($data);
        echo json_encode(array('message' => 'Préstamo registrado exitosamente.'));
    }

    // Reporte Préstamo
    if ($_GET['operacion'] == 'reportePrestamo') {
        renderJSON($prestamo->reportePrestamo(
            [
                'idbook' => $_GET['idbook'],
                'anio' => $_GET['anio'],
                'mes' => $_GET['mes']
            ]
        ));
    }

    // Grafico Préstamo
    if ($_GET['operacion'] == 'graficoPrestamos') {
        echo json_encode($prestamo->graficoPrestamos($_GET['selectedMonth'], $_GET['selectedYear']));
    }
}
