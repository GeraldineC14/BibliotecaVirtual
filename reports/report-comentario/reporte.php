<?php
//Librerías obtenidas mediante Composer
require '../../vendor/autoload.php';
require '../../models/Comentario.php';

//Namespaces (espacios de nombres/contenedor de clases)
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    $comentario = new Comentario();
    $datos = $comentario->reporteComentario(
        ['idbook'        => $_GET['idbook'],
        'anio'          => $_GET['anio'],
        'mes'           => $_GET['mes'],
        'accesslevel'   => $_GET['accesslevel']]
    );

    $titulo = $_GET['titulo'];

    // Contenido (HTML) que renderizaremos como PDF
    $content = "";

    // Construcción del contenido HTML del reporte
    ob_start();
    include '../estilos.html';
    include './datos.php';
    $content = ob_get_clean();

    // Configuración del archivo PDF
    $html2pdf = new Html2Pdf('L', 'A4', 'es', true, 'UTF-8', array(20,20,20,20));
    $html2pdf->writeHTML($content);
    $html2pdf->output('ReporteComentario.pdf');
} catch (Html2PdfException $error) {
    $formatter = new ExceptionFormatter($error);
    echo $formatter->getHtmlMessage();
}
?>
