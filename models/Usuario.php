<?php
class Usuario {
    private $id_usuario;
    private $nombre;
    private $email;
    private $password;
    private $rol;
    private $fecha_registro;
    
    // Constructor
    public function __construct(
        $id_usuario = null,
        $nombre = null,
        $email = null,
        $password = null,
        $rol = 'usuario',
        $fecha_registro = null
    ) {
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
        $this->fecha_registro = $fecha_registro;
    }

    // Getters
    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getFechaRegistro() {
        return $this->fecha_registro;
    }

    // Setters
    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setFechaRegistro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }
}
?>