-- CREACIÓN DE LA BASE DE DATOS
-- =========================================
CREATE DATABASE IF NOT EXISTS proyecto_apartamentos;
USE proyecto_apartamentos;
 
-- =========================================
-- TABLA: APARTAMENTOS (DATOS DE LA API)
-- Pensada para mapa interactivo (GPS)
-- =========================================
CREATE TABLE apartamentos (
    n_registro VARCHAR(20) PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    direccion VARCHAR(200),
    c_postal VARCHAR(10),
    provincia VARCHAR(100),
    municipio VARCHAR(100),
    localidad VARCHAR(100),
    telefono_1 VARCHAR(20),
    telefono_2 VARCHAR(20),
    email VARCHAR(150),
    web VARCHAR(150),
    plazas INT,
    gps_longitud DECIMAL(10,7),
    gps_latitud DECIMAL(10,7),
    accesible_a_personas_con_discapacidad BOOLEAN
);
 
-- =========================================
-- TABLA: USUARIOS (5 ATRIBUTOS)
-- Para registro y login
-- =========================================
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);
 
-- =========================================
-- TABLA: RESERVAS
-- Relaciona usuarios con apartamentos
-- =========================================
CREATE TABLE reservas (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    n_registro VARCHAR(20) NOT NULL,
    fecha_entrada DATE NOT NULL,
    fecha_salida DATE NOT NULL,
 
    CONSTRAINT fk_reserva_usuario
        FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
        ON DELETE CASCADE ON UPDATE CASCADE,
 
    CONSTRAINT fk_reserva_apartamento
        FOREIGN KEY (n_registro) REFERENCES apartamentos(n_registro)
        ON DELETE CASCADE ON UPDATE CASCADE
);
 
-- =========================================
-- ÍNDICES EXTRA PARA MEJOR RENDIMIENTO
-- =========================================
CREATE INDEX idx_provincia ON apartamentos(provincia);
CREATE INDEX idx_municipio ON apartamentos(municipio);
CREATE INDEX idx_coordenadas ON apartamentos(gps_latitud, gps_longitud);
CREATE INDEX idx_fechas_reserva ON reservas(fecha_entrada, fecha_salida);