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
    // Registrar
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

    //Editar
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

    //Mostrar
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
}

?>