<?php

require_once 'Conexion.php';

class Prestamo extends Conexion
{
    private $acceso;

    public function __construct()
    {
        $this->acceso = parent::getConexion();
    }

     // Listar Préstamo
     public function listarPrestamo()
     {
         try {
             $consulta = $this->acceso->prepare("CALL spu_listar_prestamo()");
             $consulta->execute();
             $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
             return $datos;
         } catch (Exception $e) {
             die($e->getMessage());
         }
     }
     

    // Registrar Préstamos vista principal
    public function registrarPrestamo($data)
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_loan_registration(?, ?, ?, ?, ?, ?, ?)");
            $consulta->execute(
                array(
                    $data['idbook'],
                    $data['idusers'],
                    $data['amount'],
                    $data['pickup_date'],
                    $data['return_date'],
                    $data['cancellation_date'],
                    $data['observation']
                )
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Reporte Préstamo
    public function reportePrestamo($data = [])
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_reporte_prestamos(?,?,?)");
            $consulta->execute(
                array(
                    $data['idbook'],
                    $data['anio'],
                    $data['mes']
                )
            );
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Grafico de Préstamo
    public function graficoPrestamos($selectedMonth, $selectedYear)
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_grafico_prestamos(?, ?)");
            $consulta->execute(array($selectedMonth, $selectedYear));
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
