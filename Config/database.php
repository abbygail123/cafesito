<?php
class Conexion
{
    function Conexion()
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
