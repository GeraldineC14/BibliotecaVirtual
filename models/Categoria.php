<?php

//Requerimos acceso a la clase conexion
require_once "Conexion.php";


class Categoria extends Conexion{

    //Objeto que almacena la conexion que obtenemos
    private $acceso;

    //Constructor
    public function __construct(){
        $this->acceso = parent::getConexion();
    }

    //MODELO VISTA ADMIN
    public function listarCategoria(){
        try{
            //Preparamos la consulta
            $consulta = $this->acceso->prepare("CALL spu_categories_list()");

            //Ejecutamos la consulta
            $consulta->execute();

            //Almacenamos el resultado de la consulta en $datos
            //fetchAll = todos los registros
            //FETCH_ASSOC = constante que representa a array asociativo
            $datos = $consulta->fetchALL(PDO::FETCH_ASSOC);

            //Devolver los datos
            return $datos;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function registrarCategoria($datosGuardar){
        try{
            $consulta = $this->acceso->prepare("CALL spu_register_categorie(?)");
            $consulta->execute(array(
                $datosGuardar['categoryname']
            ));

        }
        catch(Exception $e){
            die($e->getMessage());
        }

    }

    public function getCategoria($idcategorie){
        try{
            $consulta = $this->acceso->prepare("CALL spu_obtain_categorie(?)");
            $consulta->execute(array($idcategorie));
            return $consulta->fetch(PDO::FETCH_ASSOC);

        }
        catch(Exception $e){
            die($e->getMessage());
        }

    }

    public function actualizarCategoria($datosGuardar){
        try{
            $consulta = $this->acceso->prepare("CALL spu_edit_categorie(?,?)");
            $consulta->execute(array(
                $datosGuardar['idcategorie'],
                $datosGuardar['categoryname']
            ));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function eliminarCategoria($idcategorie){
        try{
            $consulta = $this->acceso->prepare("CALL spu_categorie_delete(?)");
            $consulta->execute(array($idcategorie));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }


    //MODELOS VISTA PRINCIPAL
    public function VistaprincipalCategoria(){
        try{
            //Preparamos la consulta
            $consulta = $this->acceso->prepare("CALL spu_mainviewcategories_list()");

            //Ejecutamos la consulta
            $consulta->execute();

            //Almacenamos el resultado de la consulta en $datos
            //fetchAll = todos los registros
            //FETCH_ASSOC = constante que representa a array asociativo
            $datos = $consulta->fetchALL(PDO::FETCH_ASSOC);

            //Devolver los datos
            return $datos;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }


}

?>