<?php

//Requerimos acceso al modelo
require_once '../models/Subcategoria.php';
require_once '../tools/helpers.php';

//Verificamos si existe un objeto
if(isset($_GET['operacion'])){

    $subcategoria = new Subcategoria();

//CONTROLLADORES DE VISTA ADMIN
    //Registrar(books)
    if($_GET['operacion'] == 'listarSubcategoria'){
        $datasubcategoria = $subcategoria->listarSubcategoria($_GET['idcategorie']);
        echo json_encode($datasubcategoria);
    }

    //Editar(books)
    if($_GET['operacion'] == 'listarSubcategoria2'){
        $datasubcategoria = $subcategoria->listarSubcategoria2();
        echo json_encode($datasubcategoria);
    }

    //Mostrar(tb. individual)
    if($_GET['operacion'] == 'listarSubcategoria3'){
        $datasubcategoria = $subcategoria->listarSubcategoria3();
        echo json_encode($datasubcategoria);
    }

    //Registrar(tb. individual)
    if($_GET['operacion'] == 'registrarSubcategoria'){
        $datosSolicitados = [
            "idcategorie"       => $_GET['idcategorie'],
            "subcategoryname"   => $_GET['subcategoryname']
        ];
        $subcategoria->registrarSubcategoria($datosSolicitados);
    }

    //Get(tb. individual)
    if($_GET['operacion'] == 'getSubcategoria'){
        echo json_encode($subcategoria->getSubcategoria($_GET['idsubcategorie']));
    }

    //Actualizar(tb. individual)
    if($_GET['operacion'] == 'actualizarSubcategoria'){
        $datosSolicitados = [
            "idcategorie"      => $_GET['idcategorie'],
            "idsubcategorie"   => $_GET['idsubcategorie'],
            "subcategoryname"  => $_GET['subcategoryname']
        ];

        $subcategoria->actualizarSubcategoria($datosSolicitados);
    }

    //Eliminar(tb.individual)
    if($_GET['operacion'] == 'eliminarSubcategoria'){
        $subcategoria->eliminarSubcategoria($_GET['idsubcategorie']);
    }

    //Reporte
    if ($_GET['operacion'] == 'ReporteSubcategoria') {
        renderJSON($subcategoria->ReporteSubcategoria(
            ['idcategorie' => $_GET['idcategorie']]
        ));
    }


}

?>