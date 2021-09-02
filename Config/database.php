<?php
class Conexion{
    public static function conexion(){
        $nameDataBase='cafe';
        $motor="mysql";
        $servidor="localhost";
        try{
            $cadena="$motor:host=$servidor;dbname=$nameDataBase";
            $conexion = new PDO($cadena,'root','');
            return $conexion;
            echo "conectado a la base de datos";
        }catch(SQLException $e) {
            echo "error en la conección".$e->getMessage();
        }
    } 
}
?>
