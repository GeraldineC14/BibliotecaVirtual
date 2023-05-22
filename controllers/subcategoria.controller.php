<?php

//Requerimos acceso al modelo
require_once '../models/Subcategoria.php';

//Verificamos si existe un objeto 
if(isset($_GET['operacion'])){

    $subcategoria = new Subcategoria();
    
    //Registrar
    if($_GET['operacion'] == 'listarSubcategoria'){
        $datasubcategoria = $subcategoria->listarSubcategoria($_GET['idcategorie']);
        echo json_encode($datasubcategoria);
    }

    //Editar
    if($_GET['operacion'] == 'listarSubcategoria2'){
        $datasubcategoria = $subcategoria->listarSubcategoria2();
        echo json_encode($datasubcategoria);
    }
}

?>