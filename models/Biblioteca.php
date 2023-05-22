<?php

//Requerimos acceso a la clase conexion
require_once "Conexion.php";

//La clase bibloteca sera subclase de conexion
class Biblioteca extends Conexion{

    //Objeto que almacena la conexiom que obtenemos
    private $acceso;

    //Construcotr
    public function __construct(){
        $this->acceso = parent::getConexion();
    }

    // MODELO VISTA ADMIN
    public function listarLibros(){
        try{
            //Preparamos la consulta
            $consulta = $this->acceso->prepare("CALL spu_books_list()");

            //Ejecutamos la consulta
            $consulta->execute();

            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

            return $datos;

        }
        catch(Exception $e){
            die($e->getMessage);

        }
    }

    public function registrarLibros($datosGuardar){
        try{
            //Cada ?(comodín). representa una variableque requiere el SPU
            $consulta = $this->acceso->prepare("CALL spu_books_register(?,?,?,?,?,?,?,?,?)");

            $consulta->execute(array(
                $datosGuardar['idcategorie'],
                $datosGuardar['idsubcategorie'],
                $datosGuardar['amount'],
                $datosGuardar['descriptions'],
                $datosGuardar['author'],
                $datosGuardar['state'],
                $datosGuardar['locationresponsible'],
                $datosGuardar['url'],
                $datosGuardar['frontpage']
            ));
        }
        catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function eliminarLibro($idbook){
        try{
            $consulta = $this->acceso->prepare("CALL spu_books_delete(?)");
            $consulta->execute(array($idbook));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getLibro($idbook){
        try{
            $consulta = $this->acceso->prepare("CALL spu_books_obtain(?)");
            $consulta->execute(array($idbook));

            return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function actualizarLibro($datosGuardar){
        try{
            $consulta = $this->acceso->prepare("CALL spu_books_update(?,?,?,?,?,?,?,?)");
            
            $consulta->execute(array(
                $datosGuardar['idbook'],
                $datosGuardar['idcategorie'],
                $datosGuardar['idsubcategorie'],
                $datosGuardar['amount'],
                $datosGuardar['descriptions'],
                $datosGuardar['author'],
                $datosGuardar['state'],
                $datosGuardar['locationresponsible']
            ));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function getBinarios($idbook){
        try{
            $consulta = $this->acceso->prepare("CALL spu_binarios_obtain(?)");
            $consulta->execute(array($idbook));

            return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //MODELO VISTA PRINCIPAL
    public function listarVistaLibros(){
        try{
            //Preparamos la consulta
            $consulta = $this->acceso->prepare("CALL spu_booksmainview_list()");

            //Ejecutamos la consulta
            $consulta->execute();

            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

            return $datos;

        }
        catch(Exception $e){
            die($e->getMessage);

        }
    }

    public function VistaResumen($idbook){
        try{
            $consulta = $this->acceso->prepare("CALL spu_booksummaries_list(?)");
            $consulta->execute(array($idbook));

            return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function VistaSubcategoria($idsubcategorie){
        try{
            //Preparamos la consulta
            $consulta = $this->acceso->prepare("CALL spu_bookssubcategory_list(?)");

            //Ejecutamos la consulta
            $consulta->execute(array($idsubcategorie));

            $datos = $consulta->fetchALL(PDO::FETCH_ASSOC);

            return $datos;
        }
        catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function Buscarlibros($type,$look){
        try{
            //Preparamos la consulta
            $consulta = $this->acceso->prepare("CALL spu_books_lookfor(?,?)");

            //Ejecutamos la consulta
            $consulta->execute(array($type,$look));

            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

            return $datos;
        }
        catch(Exception $e){
            die($e->getMessage());

        }
    }

}




?>