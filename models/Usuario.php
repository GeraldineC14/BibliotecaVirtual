<?php

require_once 'Conexion.php';

class Usuario extends Conexion{

    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent::getConexion();
    }

    // Consumira a nuestro spu

    public function login($email){
        try{
            $consulta = $this->acceso->prepare("CALL spu_users_login(?)");
            // Arreglo no tiene un limite de objetos definidos
            $consulta->execute(array($email));

            return $consulta->fetch(PDO::FETCH_ASSOC);

        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function registrarUsuario($datosGuardar){
        try{
            $consulta = $this->acceso->prepare("CALL spu_users_register(?,?,?,?,?)");

            $consulta->execute(array(
                $datosGuardar['surnames'],
                $datosGuardar['namess'],
                $datosGuardar['email'],
                $datosGuardar['accesslevel'],
                $datosGuardar['accesskey'] 
            ));


        }
        catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function listarUsuarios(){
        try{
            $consulta = $this->acceso->prepare("CALL spu_users_list()");
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }
        catch(Exception $e){
            die($e->getMessage());

        }
    }

    public function eliminarUsuario($idusers){
        try{
            $consulta = $this->acceso->prepare("CALL spu_users_disable(?)");
            $consulta->execute(array($idusers));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getUsers($idusers){
        try{
            $consulta = $this->acceso->prepare("CALL spu_users_obtain(?)");
            $consulta->execute(array($idusers));

            return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function actualizarUsuario($datosGuardar){
        try{
            $consulta = $this->acceso->prepare("CALL spu_users_update(?,?,?,?,?,?)");
            
            $consulta->execute(array(
                $datosGuardar['idusers'],
                $datosGuardar['namess'],
                $datosGuardar['surnames'],
                $datosGuardar['email'],
                $datosGuardar['accesslevel'],
                $datosGuardar['accesskey']

            ));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

}

?>