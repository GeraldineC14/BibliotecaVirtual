<?php

//Requerimos acceso a la clase conexion
require_once "Conexion.php";


class Subcategoria extends Conexion{

    //Objeto que almacena la conexion que obtenemos
    private $acceso;

    //Constructor
    public function __construct(){
        $this->acceso = parent::getConexion();
    }

    //MODELO VISTA ADMIN
    // Registrar(books)
    public function listarSubcategoria($idcategorie){
        try{
            //Preparamos la consulta
            $consulta = $this->acceso->prepare("CALL spu_subcategories_list(?)");

            //Ejecutamos la consulta
            $consulta->execute(array($idcategorie));

            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

            return $datos;
        }
        catch(Exception $e){
            die($e->getMessage());

        }
    }

    //Editar(books)
    public function listarSubcategoria2(){
        try{
            //Preparamos la consulta
            $consulta = $this->acceso->prepare("CALL spu_subcategories2_list()");

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

    //Mostrar(tb.individual)
    public function listarSubcategoria3(){
        try{
            $consulta = $this->acceso->prepare("CALL spu_subcategories3_list()");
            $consulta->execute();
            $datos = $consulta->fetchALL(PDO::FETCH_ASSOC);
            return $datos;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Registrar(tb.individual)
    public function registrarSubcategoria($datosGuardar){
        try{
            $consulta = $this->acceso->prepare("CALL spu_register_subcategorie(?,?)");
            $consulta->execute(array(
                $datosGuardar['idcategorie'],
                $datosGuardar['subcategoryname']
            ));

        }
        catch(Execption $e){
            die($e->getMessage());
        }
    }

    //Get(tb.individual)
    public function getSubcategoria($idsubcategorie){
        try{
            $consulta = $this->acceso->prepare("CALL spu_obtain_subcategorie(?)");
            $consulta->execute(array($idsubcategorie));
            return $consulta->fetch(PDO::FETCH_ASSOC);

        }
        catch(Exception $e){
            die($e->getMessage());
        }

    }

    //Actualizar(tb.individual)
    public function actualizarSubcategoria($datosGuardar){
        try{
            $consulta = $this->acceso->prepare("CALL spu_edit_subcategorie(?,?,?)");
            $consulta->execute(array(
                $datosGuardar['idcategorie'],
                $datosGuardar['idsubcategorie'],
                $datosGuardar['subcategoryname']
            ));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }



}

?>