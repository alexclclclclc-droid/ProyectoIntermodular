<?php
// dao/ReservaDAO.php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Reserva.php';

class ReservaDAO {
    private $conn;
    private $table = 'reservas';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    /**
     * Crear nueva reserva
     */
    public function crear($data) {
        $query = "INSERT INTO " . $this->table . " 
                  (id_usuario, n_registro, fecha_entrada, fecha_salida) 
                  VALUES (:id_usuario, :n_registro, :fecha_entrada, :fecha_salida)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_usuario', $data['id_usuario']);
        $stmt->bindParam(':n_registro', $data['n_registro']);
        $stmt->bindParam(':fecha_entrada', $data['fecha_entrada']);
        $stmt->bindParam(':fecha_salida', $data['fecha_salida']);

        return $stmt->execute();
    }

    /**
     * Obtener reservas de un usuario
     */
    public function obtenerPorUsuario($id_usuario) {
        $query = "SELECT r.*, a.nombre as nombre_apartamento, a.provincia, a.municipio
                  FROM " . $this->table . " r
                  INNER JOIN apartamentos a ON r.n_registro = a.n_registro
                  WHERE r.id_usuario = :id_usuario
                  ORDER BY r.fecha_entrada DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener reservas de un apartamento
     */
    public function obtenerPorApartamento($n_registro) {
        $query = "SELECT r.*, u.nombre as nombre_usuario, u.email
                  FROM " . $this->table . " r
                  INNER JOIN usuarios u ON r.id_usuario = u.id_usuario
                  WHERE r.n_registro = :n_registro
                  ORDER BY r.fecha_entrada";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':n_registro', $n_registro);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Verificar disponibilidad
     */
    public function verificarDisponibilidad($n_registro, $fecha_entrada, $fecha_salida) {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . "
                  WHERE n_registro = :n_registro
                  AND (
                      (fecha_entrada <= :entrada AND fecha_salida >= :entrada)
                      OR (fecha_entrada <= :salida AND fecha_salida >= :salida)
                      OR (fecha_entrada >= :entrada AND fecha_salida <= :salida)
                  )";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':n_registro', $n_registro);
        $stmt->bindParam(':entrada', $fecha_entrada);
        $stmt->bindParam(':salida', $fecha_salida);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'] == 0; // True si está disponible
    }

    /**
     * Obtener reserva por ID
     */
    public function obtenerPorId($id) {
        $query = "SELECT r.*, a.nombre as nombre_apartamento, u.nombre as nombre_usuario
                  FROM " . $this->table . " r
                  INNER JOIN apartamentos a ON r.n_registro = a.n_registro
                  INNER JOIN usuarios u ON r.id_usuario = u.id_usuario
                  WHERE r.id_reserva = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Cancelar reserva
     */
    public function eliminar($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_reserva = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    /**
     * Obtener todas las reservas
     */
    public function obtenerTodas() {
        $query = "SELECT r.*, 
                         a.nombre as nombre_apartamento, 
                         a.provincia, 
                         a.municipio,
                         u.nombre as nombre_usuario,
                         u.email
                  FROM " . $this->table . " r
                  INNER JOIN apartamentos a ON r.n_registro = a.n_registro
                  INNER JOIN usuarios u ON r.id_usuario = u.id_usuario
                  ORDER BY r.fecha_entrada DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>