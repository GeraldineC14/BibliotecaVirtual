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
    public function listarPrestamo($iduser,$accesslevel,$estado)
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_listar_prestamo(?,?,?)");
            $consulta->execute(array($iduser,$accesslevel,$estado));
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function searchUsersloans($iduser)
    {
        try {
            $consulta = $this->acceso->PREPARE("CALL spu_search_users_loans(?)");
            $consulta->bindParam(1, $iduser, PDO::PARAM_INT);
            $consulta->EXECUTE();

            return $consulta->FETCH(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Entregar libro al usuario VISTA ADMIN
    public function entregarLibro($idloan, $pickup_date)
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_pickup_date(?, ?)");
            $consulta->execute([$idloan, $pickup_date]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Cancelar entrega del libro VISTA ADMIN
    public function cancelarPrestamo($idloan)
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_cancellation_date(?)");
            $consulta->execute([$idloan]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Retornar libro a la Biblioteca VISTA ADMIN
    public function retornarLibro($idloan, $acotacion)
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_return_date(?, ?)");
            $consulta->execute([$idloan, $acotacion]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Registrar Préstamos VISTA PRINCIPAL
    public function registrarPrestamo($data)
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_registration_date(?, ?, ?, ?, ?, ?, ?)");
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
            $consulta = $this->acceso->prepare("CALL spu_reporte_prestamos(?,?,?,?)");
            $consulta->execute(
                array(
                    $data['idbook'],
                    $data['anio'],
                    $data['mes'],
                    $data['estado']
                )
            );
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //estado-reporte
    public function listarEstados()
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_list_estado()");
            $consulta->execute();
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

    // Filtrar Préstamo
    public function filtrarPrestamo($state)
    {
        try {
            $consulta = $this->acceso->prepare("CALL spu_filtrar_prestamo(?)");
            $consulta->execute([$state]);
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
