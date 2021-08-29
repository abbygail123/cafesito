<?php
class Conexion
{

    public static function conexion()
    {
        $nameDataBase = 'cafe';
        $motor = "mysql";
        $servidor = "localhost";
        try { //manejos de excepciones <--
            $cadena = "$motor:host=$servidor;dbname=$nameDataBase";
            $conexion = new PDO($cadena, 'root', '');
            //return $conexion;
            echo "CONNECT TO DATABASE";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
