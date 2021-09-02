<?php

class User
{
    // variables --> solo se pueden usar en esta clase : private
    private $idusuario;
    private $nombre;
    private $apellido;
    private $usuario;
    private $clave;
    private $dni;
    private $telefono;
    private $foto;

    public function __construct($idusuario, $nombre, $apellido, $dni, $telefono, $usuario, $clave, $foto)
    {
        $this->idusuario = $idusuario;
        $this->nombre   = $nombre;
        $this->apellido = $apellido;
        $this->dni      = $dni;
        $this->telefono = $telefono;
        $this->usuario  = $usuario;
        $this->clave    = $clave;
        $this->foto     = $foto;
    }
    //function set :: editar los datos;
    public function setIdUsuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function setClave($clave)
    {
        $this->clave = $clave;
    }
    public function setDni($dni)
    {
        $this->dni = $dni;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }
    //function get :: obterner datos;
    public function getIdUsuario()
    {
        return $this->idusuario;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getClave()
    {
        return $this->clave;
    }
    public function getDni()
    {
        return $this->dni;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getFoto()
    {
        return $this->foto;
    }
}
