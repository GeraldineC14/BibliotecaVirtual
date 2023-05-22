<?php

class Conexion{
    //Atributo que almacena la conexion
    protected $pdo;

    //Método que accede al server > db
    private function Conectar(){
        $cn = new PDO("mysql:host=localhost;port=3306;dbname=library;charset=utf8","root","");
        //$cn = new PDO("mysql:host=localhost;port=3306;dbname=u404941694_library;charset=utf8","u404941694_HoracioZG","&n&^W5MgI2w");
        return $cn;

    }

    //Método que retorna / compartirá la conexion
    public function getConexion(){
        try{
            //Almacenamos la conexion en el atributo 'pdo'
            $pdo = $this->Conectar();

            //Controlar exepciones
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Retornamos la conexion
            return $pdo;
        }
        catch(Exception $e){
            die($e->getMessage());
        }

    }
}
