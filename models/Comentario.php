<?php

require_once "Conexion.php";

class Comentario extends Conexion
{
    private $acceso;

    public function __construct()
    {
        $this->acceso = parent::getConexion();
    }

    public function mostrarCommentaries($idusers, $accesslevel)
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_commentaries_list(?,?)");
            $consulta->execute(array($idusers, $accesslevel));
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

    public function enviarComentario($datosGuardar)
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_register_commentaries(?,?,?,?)");
            $consulta->execute(array(
                $datosGuardar['idbook'],
                $datosGuardar['iduser'],
                $datosGuardar['commentary'],
                $datosGuardar['score']

            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    
    }

    public function obtenerComentario($idComentario)
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_obtener_Comentario(?)");
            $consulta->execute(array($idComentario));
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Reporte
    public function reporteComentario($data=[])
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_reporte_comentario(?,?,?,?)");
            $consulta->execute(
                array(
                    $data['idbook'],
                    $data['anio'],
                    $data['mes'],
                    $data['accesslevel']
                  )
            );
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


}
