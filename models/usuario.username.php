<?php
require_once 'Conexion.php';

class Usuario extends Conexion {
    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent::getConexion();
    }

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
                $datosGuardar['username'],
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

    public function validacionUsuario($email){
        try{
            $consulta = $this->acceso->prepare("CALL spu_validate_email(?)");
            $consulta->execute(array($email));
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }
        catch(Exception $e){
            die($e->getMessage());

        }
    }


    public function searchUser($nombre = '') {
        try {
            $consulta = $this->acceso->prepare("CALL spu_searchuser(?)");
            $consulta->execute([$nombre]);

            if ($consulta->rowCount() > 0) {
                return $consulta->fetch(PDO::FETCH_ASSOC);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            throw new Exception("Error al buscar usuario: " . $e->getMessage());
        }
    }

    public function registraRecuperacion($data = []){
        try{
          $consulta = $this->conexion->prepare("CALL spu_registra_claverecuperacion(?,?,?)");
          $consulta->execute(
            array(
              $data['idusuario'],
              $data['email'],
              $data['clavegenerada']
          ));
    
          return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          die($e->getMessage());
        }
      }
    
      //Retornará: PERMITIDO/DENEGADO
      //Se sugiere retornar bool/int/string
      public function validarClave($data = []){
        try{
          $consulta = $this->conexion->prepare("CALL spu_usuario_validarclave(?,?)");
          $consulta->execute(
            array(
              $data['idusuario'],
              $data['clavegenerada']
          ));
    
          return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          die($e->getMessage());
        }
      }
    
      public function validarTiempo($data = []){
        try{
          $consulta = $this->conexion->prepare("CALL spu_usuario_validartiempo(?)");
          $consulta->execute(
            array(
              $data['idusuario']
          ));
    
          return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          die($e->getMessage());
        }
      }
    
      public function actualizarClave($data = []){
        $resultado = ["status" => false];
        try{
          $consulta = $this->conexion->prepare("CALL spu_usuario_actualizarpasssword(?,?)");
          $resultado ["status"] = $consulta->execute(
            array(
              $data['idusuario'],
              $data['claveacceso']
          ));
          return $resultado;
        }
        catch(Exception $e){
          die($e->getMessage());
        }
      }
}
?>
