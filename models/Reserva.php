<?php
class Reserva {
    public $id_reserva;
    public $id_usuario;
    public $n_registro;
    public $fecha_entrada;
    public $fecha_salida;

    // Constructor
    public function __construct(
        $id_reserva = null,
        $id_usuario = null,
        $n_registro = null,
        $fecha_entrada = null,
        $fecha_salida = null
    ) {
        $this->id_reserva = $id_reserva;
        $this->id_usuario = $id_usuario;
        $this->n_registro = $n_registro;
        $this->fecha_entrada = $fecha_entrada;
        $this->fecha_salida = $fecha_salida;
    }

    // Getters
    public function getIdReserva() {
        return $this->id_reserva;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function getNRegistro() {
        return $this->n_registro;
    }

    public function getFechaEntrada() {
        return $this->fecha_entrada;
    }

    public function getFechaSalida() {
        return $this->fecha_salida;
    }

    // Setters
    public function setIdReserva($id_reserva) {
        $this->id_reserva = $id_reserva;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setNRegistro($n_registro) {
        $this->n_registro = $n_registro;
    }

    public function setFechaEntrada($fecha_entrada) {
        $this->fecha_entrada = $fecha_entrada;
    }

    public function setFechaSalida($fecha_salida) {
        $this->fecha_salida = $fecha_salida;
    }
}
?>