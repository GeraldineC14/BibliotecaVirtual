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
            $consulta = $this->acceso->prepare("CALL spu_users_update(?,?,?,?,?,?)");

            $consulta->execute([
                $datosGuardar['idusers'],
                $datosGuardar['namess'],
                $datosGuardar['surnames'],
                $datosGuardar['username'],
                $datosGuardar['email'],
                $datosGuardar['accesslevel']
            ]);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function actualizarContraseña($datosGuardar){
        try{
            $consulta = $this->acceso->prepare("CALL spu_users_password(?,?)");

            $consulta->execute([
                $datosGuardar['idusers'],
                $datosGuardar['accesskey']
            ]);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function searchUser($username = ''){
        try{
          $sql = ("SELECT idusers,surnames,namess,email FROM users WHERE username = ? AND state = '1'");
          $consulta = $this->acceso->prepare($sql);
          $consulta->execute(array($username));
    
          return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          die($e->getMessage());
        }
    }

    public function registraRecuperacion($data = []){
        try{
          $consulta = $this->acceso->prepare("CALL spu_registra_claverecuperacion(?,?,?)");
          $consulta->execute(
            array(
              $data['idusers'],
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
        $consulta = $this->acceso->prepare("CALL spu_usuario_validarclave(?,?)");
        $consulta->execute(
            array(
            $data['idusers'],
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
            $consulta = $this->acceso->prepare("CALL spu_usuario_validartiempo(?)");
            $consulta->execute(
            array(
                $data['idusers']
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
          $consulta = $this->acceso->prepare("CALL spu_usuario_actualizarpasssword(?,?)");
          $resultado ["status"] = $consulta->execute(
            array(
              $data['idusers'],
              $data['accesskey']
          ));
          return $resultado;
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

    public function registraValidacioncorreo($data = []){
        try{
          $consulta = $this->acceso->prepare("CALL spu_registra_clavevalidacioncorreo(?,?)");
          $consulta->execute(
            array(
              $data['email'],
              $data['clavegenerada']
          ));
    
          return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          die($e->getMessage());
        }
    }

    public function validarCorreotiempo($data = []){
        try{
            $consulta = $this->acceso->prepare("CALL spu_correo_validartiempo(?)");
            $consulta->execute(
            array(
                $data['email']
            ));

            return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function validarClavecorreo($data = []){
        try{
        $consulta = $this->acceso->prepare("CALL spu_correo_validarclave(?,?)");
        $consulta->execute(
            array(
            $data['email'],
            $data['clavegenerada']
        ));

        return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
        die($e->getMessage());
        }
    }

    public function validarCodigoestudiante($codigoEstudiante)
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_validatecode(?)");
            $consulta->bindParam(1, $codigoEstudiante, PDO::PARAM_STR); // Enlaza el parámetro correctamente
            $consulta->execute();
    
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function generarCodigoestudiante(){
        try{
            $consulta = $this->acceso->prepare("CALL spu_insertorupdatecode()");
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function listarCodigoestudiante(){
        try{
            $consulta = $this->acceso->prepare("CALL spu_listcode()");
            $consulta->execute();
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
            return $datos;
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function validacionCompleta($data = ''){
        $resultado = ["status" => false];
        try{
          $consulta = $this->acceso->prepare("CALL spu_correo_validacioncompleta(?)");
          $resultado ["status"] = $consulta->execute(array($data));
          return $resultado;
        }
        catch(Exception $e){
          die($e->getMessage());
        }
    }

    public function contadorBooks(){
        try{
            $consulta = $this->acceso->prepare("CALL spu_list_dashboard_books()");
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function contadorUsers(){
        try{
            $consulta = $this->acceso->prepare("CALL spu_list_dashboard_users()");
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function actualizarPerfil($datosGuardar){
        try{
            $consulta = $this->acceso->prepare("CALL spu_update_users(?,?)");
            $consulta->execute([
                $datosGuardar['idusers'],
                $datosGuardar['accesskey']
            ]);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function comparacionContraseña($email){
        try{
            $consulta = $this->acceso->prepare("CALL spu_users_contraseña(?)");
            $consulta->execute([$email]);

            return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    // Reportes
    public function getUsersReport($data=[]) {
        try {
            $consulta = $this->acceso->prepare("CALL spu_order_user(?)");
            $consulta->execute(
                array(
                  $data['iduser']
                )
              );
              return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
              die($e->getMessage());
            }
    }



}
?>
