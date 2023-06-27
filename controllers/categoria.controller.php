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
        $categoria->registrarCategoria($datosSolicitados);
    }

    if($_GET['operacion'] == 'getCategoria'){
        echo json_encode($categoria->getCategoria($_GET['idcategorie']));
    }

    if($_GET['operacion'] == 'actualizarCategoria'){
        $datosSolicitados = [
            "idcategorie"   => $_GET['idcategorie'],
            "categoryname"  => $_GET['categoryname']
        ];

        $categoria->actualizarCategoria($datosSolicitados);
    }

    if($_GET['operacion'] == 'eliminarCategoria'){
        $categoria->eliminarCategoria($_GET['idcategorie']);
    }

    //CONTROLADOR VISTA PRINCIPAL
    if($_GET['operacion'] == 'VistaprincipalCategoria'){
        $dataCategoria = $categoria->VistaprincipalCategoria();
        echo json_encode($dataCategoria);
    }
}

?>