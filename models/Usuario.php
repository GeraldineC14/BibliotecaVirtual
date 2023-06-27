<?php
require_once 'Conexion.php';

class Usuario extends Conexion {
    private $acceso;

    public function __construct(){
        $this->acceso = parent::getConexion();
    }

    public function login($email){
        try{
            $consulta = $this->acceso->prepare("CALL spu_users_login(?)");
            $consulta->execute([$email]);

            return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function registrarUsuario($datosGuardar){
        try{
            $consulta = $this->acceso->prepare("CALL spu_users_register(?,?,?,?,?,?)");

            $consulta->execute([
                $datosGuardar['username'],
                $datosGuardar['surnames'],
                $datosGuardar['namess'],
                $datosGuardar['email'],
                $datosGuardar['accesskey'],
                $datosGuardar['accesslevel']
            ]);
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
            $consulta->execute([$idusers]);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getUsers($idusers){
        try{
            $consulta = $this->acceso->prepare("CALL spu_users_obtain(?)");
            $consulta->execute([$idusers]);

            return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function actualizarUsuario($datosGuardar){
        try{
            $consulta = $this->acceso->prepare("CALL spu_users_update(?,?,?,?,?,?,?)");

            $consulta->execute([
                $datosGuardar['idusers'],
                $datosGuardar['namess'],
                $datosGuardar['surnames'],
                $datosGuardar['username'],
                $datosGuardar['email'],
                $datosGuardar['accesslevel'],
                $datosGuardar['accesskey']
            ]);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function validacionUsuario($username){
        try{
            $consulta = $this->acceso->prepare("CALL spu_validate_username(?)");
            $consulta->execute([$username]);
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function validacionCorreo($email){
        try{
            $consulta = $this->acceso->prepare("CALL spu_validate_email(?)");
            $consulta->execute([$email]);
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>
