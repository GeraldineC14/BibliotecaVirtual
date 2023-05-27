<?php

require_once 'Conexion.php';

class Prestamo extends Conexion{
    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent :: getConexion();
    }

    public function listarPrestamos(){
        try{
            $consulta = $this->acceso->prepare("CALL spu_loans_list()");
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function listarUsuarioLoans(){
        try{
            $consulta = $this->acceso->prepare("CALL spu_usersloans_list()");
            $consulta->execute();
            $datos = $consulta->fetchALL(PDO::FETCH_ASSOC);
            return $datos;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function registrarPrestamos($datosGuardar){
        try{
            $consulta = $this->acceso->prepare("CALL spu_loans_register(?,?,?,?,?,?)");
            $consulta->execute(array(
                $datosGuardar['idbook'],
                $datosGuardar['idusers'],
                $datosGuardar['observation'],
                $datosGuardar['loan_date'],
                $datosGuardar['return_date'],
                $datosGuardar['amount']
            ));

        }catch(Exception $e){
            die($e->getMessage());
        }

    }
}



?>