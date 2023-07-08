<?php
date_default_timezone_set('America/Lima');
//Librerías obtenidas mediante Composer
require '../../vendor/autoload.php';
require '../../models/Subcategoria.php';

//Namespaces (espacios de nombres/contenedor de clases)
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    $subcategoria = new Subcategoria();
    $datos = $subcategoria->ReporteSubcategoria(
        [
            "idcategorie" =>$_GET['idcategorie']
        ]
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
    $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', array(20,20,20,20));
    $html2pdf->writeHTML($content);
    $html2pdf->output('ReporteSubcategoria.pdf');
} catch (Html2PdfException $error) {
    $formatter = new ExceptionFormatter($error);
    echo $formatter->getHtmlMessage();
}
?>
