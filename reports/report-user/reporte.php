<?php
//Librerías obtenidas mediante Composer
require '../../vendor/autoload.php';
require '../../models/Usuario.php';

//Namespaces (espacios de nombres/contenedor de clases)
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    $usuario = new Usuario();
    $datos = $usuario->getUsersReport(["id"]);
    $titulo = "Cyborg";

    // Construcción del contenido HTML del reporte
    ob_start();
    include '../estilos.html';
    include './datos.php';
    $content = ob_get_clean();

    // Configuración del archivo PDF
    $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8');
    $html2pdf->writeHTML($content);
    $html2pdf->output('reporte.pdf');
} catch (Html2PdfException $error) {
    $formatter = new ExceptionFormatter($error);
    echo $formatter->getHtmlMessage();
}
?>
