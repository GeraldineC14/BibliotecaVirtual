<?php
require_once '../models/Prestamo.php';
require_once '../tools/helpers.php';
$prestamo = new Prestamo();

if (isset($_GET['operacion'])) {

    // Listar Préstamo
    if ($_GET['operacion'] == 'listarPrestamo') {
        $datos = $prestamo->listarPrestamo($_GET['idusers'],$_GET['accesslevel']);
        echo json_encode($datos);
    }

    if ($_GET['operacion'] == 'searchUsersloans') {
        $iduser = $_GET['iduser'];
        $resultado = $prestamo->searchUsersloans($iduser);
        echo json_encode($resultado);
    }

    // Entregar libro al usuario VISTA ADMIN
    if ($_GET['operacion'] == 'entregarLibro') {
        $idloan = $_GET['idloan'];
        $pickup_date = date('Y-m-d H:i:s'); // Obtener la fecha y hora actual en formato 'YYYY-MM-DD HH:MM:SS'

        $prestamo->entregarLibro($idloan, $pickup_date);
        echo json_encode(array('message' => 'Libro entregado exitosamente.'));
    }

    // Cancelar entrega del libro VISTA ADMIN
    if ($_GET['operacion'] == 'cancelarPrestamo') {
        $idloan = $_GET['idloan'];
        $cancellation_date = date('Y-m-d H:i:s'); // Obtener la fecha y hora actual en formato 'YYYY-MM-DD HH:MM:SS'

        $prestamo->cancelarPrestamo($idloan);
        echo json_encode(array('message' => 'Préstamo cancelado exitosamente.'));
    }

    // Retornar libro a la Biblioteca VISTA ADMIN
    if ($_GET['operacion'] == 'retornarLibro') {
        $idloan = $_GET['idloan'];
        $acotacion = $_GET['acotacion'];
        $return_date = date('Y-m-d H:i:s'); // Obtener la fecha y hora actual en formato 'YYYY-MM-DD HH:MM:SS'

        $prestamo->retornarLibro($idloan, $acotacion);
        echo json_encode(array('message' => 'Libro retornado exitosamente.'));
    }

    // Registrar Préstamo VISTA PRINCIPAL
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

    // Filtrar Préstamo
    if ($_GET['operacion'] == 'filtrarPrestamo') {
        $state = $_GET['state'];
        $resultados = $prestamo->filtrarPrestamo($state);
        echo json_encode($resultados);
    }
}
