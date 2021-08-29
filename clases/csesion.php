<?php
    
    class CSesion{

    function __construct()
    {
        session_start();
    }

    function conexion()
    {
        $conx=mysqli_connect('localhost','root','','cafe');
        return $conx;
    }

    function cerrarSesion()
    {
        session_destroy();
    }

    function validarSesion()
    {
        if(!isset($_SESSION['id']))
        {
            header("LOCATION: ../login/login.php");
        }
    }


    }
