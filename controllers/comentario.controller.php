<?php

require_once "../models/Comentario.php";

if (isset($_GET['operacion'])) {
    $comentario = new Comentario();

    if ($_GET['operacion'] == 'listarComentario') {
        // Obtener la lista de comentarios
        $dataComentario = $comentario->mostrarCommentaries();
        // Mostrar los comentarios
        echo json_encode($dataComentario);
    }
}

?>
<?php

