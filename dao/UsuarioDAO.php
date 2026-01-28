<?php
// dao/UsuarioDAO.php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioDAO {
    private $conn;
    private $table = 'usuarios';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    /**
     * Crear nuevo usuario
     */
    public function crear($data) {
        $query = "INSERT INTO " . $this->table . " 
                  (nombre, email, password, rol) 
                  VALUES (:nombre, :email, :password, :rol)";

        $stmt = $this->conn->prepare($query);

        // Hash de la contraseña
        $passwordHash = password_hash($data['password'], PASSWORD_BCRYPT);

        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':rol', $data['rol']);

        return $stmt->execute();
    }

    /**
     * Obtener usuario por ID
     */
    public function obtenerPorId($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener usuario por email
     */
    public function obtenerPorEmail($email) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Verificar login
     */
    public function verificarLogin($email, $password) {
        $usuario = $this->obtenerPorEmail($email);
        
        if ($usuario && password_verify($password, $usuario['password'])) {
            // No devolver la contraseña
            unset($usuario['password']);
            return $usuario;
        }
        
        return false;
    }

    /**
     * Obtener todos los usuarios
     */
    public function obtenerTodos() {
        $query = "SELECT id_usuario, nombre, email, rol, fecha_registro 
                  FROM " . $this->table . " 
                  ORDER BY fecha_registro DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Actualizar usuario
     */
    public function actualizar($id, $data) {
        $query = "UPDATE " . $this->table . " 
                  SET nombre = :nombre, email = :email";
        
        // Si se proporciona nueva contraseña
        if (!empty($data['password'])) {
            $query .= ", password = :password";
        }
        
        $query .= " WHERE id_usuario = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':email', $data['email']);
        
        if (!empty($data['password'])) {
            $passwordHash = password_hash($data['password'], PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $passwordHash);
        }

        return $stmt->execute();
    }

    /**
     * Eliminar usuario
     */
    public function eliminar($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>