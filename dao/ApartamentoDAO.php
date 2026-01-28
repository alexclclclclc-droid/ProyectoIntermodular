<?php
// dao/ApartamentoDAO.php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Apartamento.php';

class ApartamentoDAO {
    private $conn;
    private $table = 'apartamentos';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    /**
     * Insertar o actualizar apartamento
     */
    public function insertarOActualizar($data) {
        $query = "INSERT INTO " . $this->table . " 
                  (n_registro, nombre, direccion, c_postal, provincia, municipio, 
                   localidad, telefono_1, telefono_2, email, web, plazas, 
                   gps_longitud, gps_latitud, accesible_a_personas_con_discapacidad)
                  VALUES 
                  (:n_registro, :nombre, :direccion, :c_postal, :provincia, :municipio,
                   :localidad, :telefono_1, :telefono_2, :email, :web, :plazas,
                   :gps_longitud, :gps_latitud, :accesible)
                  ON DUPLICATE KEY UPDATE
                  nombre = :nombre,
                  direccion = :direccion,
                  c_postal = :c_postal,
                  provincia = :provincia,
                  municipio = :municipio,
                  localidad = :localidad,
                  telefono_1 = :telefono_1,
                  telefono_2 = :telefono_2,
                  email = :email,
                  web = :web,
                  plazas = :plazas,
                  gps_longitud = :gps_longitud,
                  gps_latitud = :gps_latitud,
                  accesible_a_personas_con_discapacidad = :accesible";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':n_registro', $data['n_registro']);
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':direccion', $data['direccion']);
        $stmt->bindParam(':c_postal', $data['c_postal']);
        $stmt->bindParam(':provincia', $data['provincia']);
        $stmt->bindParam(':municipio', $data['municipio']);
        $stmt->bindParam(':localidad', $data['localidad']);
        $stmt->bindParam(':telefono_1', $data['telefono_1']);
        $stmt->bindParam(':telefono_2', $data['telefono_2']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':web', $data['web']);
        $stmt->bindParam(':plazas', $data['plazas']);
        $stmt->bindParam(':gps_longitud', $data['gps_longitud']);
        $stmt->bindParam(':gps_latitud', $data['gps_latitud']);
        $stmt->bindParam(':accesible', $data['accesible_a_personas_con_discapacidad']);

        return $stmt->execute();
    }

    /**
     * Obtener todos los apartamentos
     */
    public function obtenerTodos($limit = null, $offset = 0) {
        $query = "SELECT * FROM " . $this->table . " ORDER BY nombre";
        
        if ($limit !== null) {
            $query .= " LIMIT :limit OFFSET :offset";
        }

        $stmt = $this->conn->prepare($query);
        
        if ($limit !== null) {
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtener por número de registro
     */
    public function obtenerPorRegistro($n_registro) {
        $query = "SELECT * FROM " . $this->table . " WHERE n_registro = :n_registro";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':n_registro', $n_registro);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Buscar por provincia
     */
    public function buscarPorProvincia($provincia) {
        $query = "SELECT * FROM " . $this->table . " 
                  WHERE provincia LIKE :provincia 
                  ORDER BY municipio, nombre";
        
        $stmt = $this->conn->prepare($query);
        $searchTerm = "%{$provincia}%";
        $stmt->bindParam(':provincia', $searchTerm);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Buscar por municipio
     */
    public function buscarPorMunicipio($municipio) {
        $query = "SELECT * FROM " . $this->table . " 
                  WHERE municipio LIKE :municipio 
                  ORDER BY nombre";
        
        $stmt = $this->conn->prepare($query);
        $searchTerm = "%{$municipio}%";
        $stmt->bindParam(':municipio', $searchTerm);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Buscar apartamentos cercanos a unas coordenadas
     */
    public function buscarCercanos($latitud, $longitud, $radioKm = 10) {
        $query = "SELECT *, 
                  (6371 * acos(cos(radians(:lat)) * cos(radians(gps_latitud)) * 
                  cos(radians(gps_longitud) - radians(:lon)) + 
                  sin(radians(:lat)) * sin(radians(gps_latitud)))) AS distancia
                  FROM " . $this->table . "
                  WHERE gps_latitud IS NOT NULL AND gps_longitud IS NOT NULL
                  HAVING distancia <= :radio
                  ORDER BY distancia";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':lat', $latitud);
        $stmt->bindParam(':lon', $longitud);
        $stmt->bindParam(':radio', $radioKm);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Contar total de apartamentos
     */
    public function contarTotal() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    /**
     * Obtener provincias únicas
     */
    public function obtenerProvincias() {
        $query = "SELECT DISTINCT provincia FROM " . $this->table . " 
                  WHERE provincia IS NOT NULL 
                  ORDER BY provincia";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * Obtener municipios
     */
    public function obtenerMunicipios($provincia = null) {
        if ($provincia) {
            $query = "SELECT DISTINCT municipio FROM " . $this->table . " 
                      WHERE provincia = :provincia AND municipio IS NOT NULL
                      ORDER BY municipio";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':provincia', $provincia);
        } else {
            $query = "SELECT DISTINCT municipio FROM " . $this->table . " 
                      WHERE municipio IS NOT NULL
                      ORDER BY municipio";
            $stmt = $this->conn->prepare($query);
        }
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
?>