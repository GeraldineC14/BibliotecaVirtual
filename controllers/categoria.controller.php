<?php

//Requerimos acceso al modelo
require_once '../models/Categoria.php';

//Verificamos si existe un objeto 
if(isset($_GET['operacion'])){


    $categoria = new Categoria();

    //CONTROLADOR VISTA ADMIN
    if($_GET['operacion'] == 'listarCategoria'){
        $dataCategoria = $categoria->listarCategoria();
        echo json_encode($dataCategoria);
    }

    if($_GET['operacion'] == 'registrarCategoria'){
        $datosSolicitados = [
            "categoryname" => $_GET['categoryname']
        ];
    }

    //CONTROLADOR VISTA PRINCIPAL
    if($_GET['operacion'] == 'VistaprincipalCategoria'){
        $dataCategoria = $categoria->VistaprincipalCategoria();
        echo json_encode($dataCategoria);
    }
}

?>