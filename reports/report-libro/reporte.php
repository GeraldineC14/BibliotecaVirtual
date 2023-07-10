<?php
date_default_timezone_set('America/Lima');
//Librerías obtenidas mediante Composer
require '../../vendor/autoload.php';
require '../../models/Biblioteca.php';

//Namespaces (espacios de nombres/contenedor de clases)
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    $biblioteca = new Biblioteca();
    $datos = $biblioteca->reporteLibro(
        ['idcategorie'        => $_GET['idcategorie'],
        'idsubcategorie'      => $_GET['idsubcategorie']]
    );

    $titulo_Categoria = $_GET['titulo_Categoria'];
    $titulo_Subcategoria = $_GET['titulo_Subcategoria'];

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
    $html2pdf->output('ReporteLibros.pdf');
} catch (Html2PdfException $error) {
    $formatter = new ExceptionFormatter($error);
    echo $formatter->getHtmlMessage();
}
?>
