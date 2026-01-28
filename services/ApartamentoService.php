<?php
// services/ApartamentoService.php

class ApartamentoService {
    private $baseUrl = 'https://analisis.datosabiertos.jcyl.es/api/explore/v2.1/catalog/datasets/registro-de-turismo-de-castilla-y-leon/records';

    /**
     * Obtener apartamentos de la API externa
     */
    public function obtenerApartamentos($limit = 100, $offset = 0) {
        $params = [
            'limit' => $limit,
            'offset' => $offset,
            'refine' => 'establecimiento:"Apartamentos Turísticos"'
        ];

        $url = $this->baseUrl . '?' . http_build_query($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if (curl_errno($ch)) {
            throw new Exception('Error en cURL: ' . curl_error($ch));
        }
        
        curl_close($ch);

        if ($httpCode !== 200) {
            throw new Exception("Error HTTP: $httpCode");
        }

        $data = json_decode($response, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Error al decodificar JSON: ' . json_last_error_msg());
        }

        return $data;
    }

    /**
     * Obtener TODOS los apartamentos (paginado automático)
     */
    public function obtenerTodosLosApartamentos() {
        $todosLosApartamentos = [];
        $limit = 100;
        $offset = 0;
        $totalRecords = null;

        do {
            $response = $this->obtenerApartamentos($limit, $offset);
            
            if ($totalRecords === null) {
                $totalRecords = $response['total_count'] ?? 0;
            }

            if (isset($response['records']) && is_array($response['records'])) {
                $todosLosApartamentos = array_merge($todosLosApartamentos, $response['records']);
            }

            $offset += $limit;

        } while ($offset < $totalRecords);

        return $todosLosApartamentos;
    }

    /**
     * Transformar datos de la API al formato de la BD
     */
    public function transformarDatos($record) {
        $fields = $record['fields'] ?? [];

        return [
            'n_registro' => $fields['n_registro'] ?? null,
            'nombre' => $fields['nombre'] ?? null,
            'direccion' => $fields['direccion'] ?? null,
            'c_postal' => $fields['c_postal'] ?? null,
            'provincia' => $fields['provincia'] ?? null,
            'municipio' => $fields['municipio'] ?? null,
            'localidad' => $fields['localidad'] ?? null,
            'telefono_1' => $fields['telefono_1'] ?? null,
            'telefono_2' => $fields['telefono_2'] ?? null,
            'email' => $fields['email'] ?? null,
            'web' => $fields['web'] ?? null,
            'plazas' => isset($fields['plazas']) ? (int)$fields['plazas'] : null,
            'gps_longitud' => $fields['geopoint']['lon'] ?? null,
            'gps_latitud' => $fields['geopoint']['lat'] ?? null,
            'accesible_a_personas_con_discapacidad' => isset($fields['accesible']) ? 
                ($fields['accesible'] === 'Sí' || $fields['accesible'] === true) : false
        ];
    }
}
?>