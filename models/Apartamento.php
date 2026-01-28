<?php
class Apartamento {
    private $n_registro;
    private $nombre;
    private $direccion;
    private $c_postal;
    private $provincia;
    private $municipio;
    private $localidad;
    private $telefono_1;
    private $telefono_2;
    private $email;
    private $web;
    private $plazas;
    private $gps_longitud;
    private $gps_latitud;
    private $accesible_a_personas_con_discapacidad;

    // Constructor
    public function __construct(
        $n_registro = null,
        $nombre = null,
        $direccion = null,
        $c_postal = null,
        $provincia = null,
        $municipio = null,
        $localidad = null,
        $telefono_1 = null,
        $telefono_2 = null,
        $email = null,
        $web = null,
        $plazas = null,
        $gps_longitud = null,
        $gps_latitud = null,
        $accesible_a_personas_con_discapacidad = false
    ) {
        $this->n_registro = $n_registro;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->c_postal = $c_postal;
        $this->provincia = $provincia;
        $this->municipio = $municipio;
        $this->localidad = $localidad;
        $this->telefono_1 = $telefono_1;
        $this->telefono_2 = $telefono_2;
        $this->email = $email;
        $this->web = $web;
        $this->plazas = $plazas;
        $this->gps_longitud = $gps_longitud;
        $this->gps_latitud = $gps_latitud;
        $this->accesible_a_personas_con_discapacidad = $accesible_a_personas_con_discapacidad;
    }

    // Getters
    public function getNRegistro() {
        return $this->n_registro;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getCPostal() {
        return $this->c_postal;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getMunicipio() {
        return $this->municipio;
    }

    public function getLocalidad() {
        return $this->localidad;
    }

    public function getTelefono1() {
        return $this->telefono_1;
    }

    public function getTelefono2() {
        return $this->telefono_2;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getWeb() {
        return $this->web;
    }

    public function getPlazas() {
        return $this->plazas;
    }

    public function getGpsLongitud() {
        return $this->gps_longitud;
    }

    public function getGpsLatitud() {
        return $this->gps_latitud;
    }

    public function isAccesible() {
        return $this->accesible_a_personas_con_discapacidad;
    }

    // Setters
    public function setNRegistro($n_registro) {
        $this->n_registro = $n_registro;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setCPostal($c_postal) {
        $this->c_postal = $c_postal;
    }

    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    public function setLocalidad($localidad) {
        $this->localidad = $localidad;
    }

    public function setTelefono1($telefono_1) {
        $this->telefono_1 = $telefono_1;
    }

    public function setTelefono2($telefono_2) {
        $this->telefono_2 = $telefono_2;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setWeb($web) {
        $this->web = $web;
    }

    public function setPlazas($plazas) {
        $this->plazas = $plazas;
    }

    public function setGpsLongitud($gps_longitud) {
        $this->gps_longitud = $gps_longitud;
    }

    public function setGpsLatitud($gps_latitud) {
        $this->gps_latitud = $gps_latitud;
    }

    public function setAccesible($accesible) {
        $this->accesible_a_personas_con_discapacidad = $accesible;
    }
}
?>