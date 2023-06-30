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
    if ($_GET['operacion'] == 'eliminarComentario') {
        $datosSolicitados = [
            "idcomentario"         => $_GET['idcomentario']
        ];
        $dataComentario = $comentario->eliminarComentario($datosSolicitados);

        echo json_encode($dataComentario);
    }

    if ($_GET['operacion'] == 'enviarComentario') {
        $datosSolicitados = [
            "idbook"            => $_GET['idbook'],
            "iduser"            => $_GET['iduser'],
            "commentary"        => $_GET['commentary'],
            "score"             => $_GET['score']
        ];
        $dataComentario = $comentario->enviarComentario($datosSolicitados);

        echo json_encode($dataComentario);
    }


    if ($_GET['operacion'] == 'obtenerComentario') {
        $idComentario = $_GET['idcomentario'];

        $comentarioSeleccionado = $comentario->obtenerComentario($idComentario);

        echo json_encode($comentarioSeleccionado);
    }
}

?>
<?php
