<?php
// config/config.php

// Configuración general del proyecto
define('BASE_URL', 'http://localhost/ProyectoIntermodular/');
define('API_URL', BASE_URL . 'api/');

// Configuración de la API externa
define('API_EXTERNA_URL', 'https://analisis.datosabiertos.jcyl.es/api/explore/v2.1/catalog/datasets/registro-de-turismo-de-castilla-y-leon/records');

// Zona horaria
date_default_timezone_set('Europe/Madrid');

// Mostrar errores (solo en desarrollo)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuración de sesiones
session_start();
?>