<?php

require_once "Conexion.php";

class Comentario extends Conexion
{
    private $acceso;

    public function __construct()
    {
        $this->acceso = parent::getConexion();
    }

    public function mostrarCommentaries()
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_commentaries_list()");
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarComentario($datosGuardar)
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_delete_commentaries(?)");
            $consulta->execute(array(
                $datosGuardar['idcomentario']
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    
    }

}
?>
