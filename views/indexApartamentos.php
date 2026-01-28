<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartamentos Turísticos - Castilla y León</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <style>
        /* Estilos específicos para apartamentos */
        .apartamentos-hero {
            background: linear-gradient(135deg, var(--azul-profundo) 0%, #34495e 100%);
            color: var(--blanco);
            padding: 4rem 5%;
            text-align: center;
            margin-bottom: 3rem;
        }

        .apartamentos-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--dorado);
        }

        .apartamentos-hero p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
            opacity: 0.95;
        }

        .apartamentos-hero .decorador {
            display: inline-block;
            width: 120px;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--dorado), transparent);
            margin: 1.5rem 0;
        }

        /* Selector de provincias */
        .provincias-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem 5%;
        }

        .provincias-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .provincia-card {
            background: var(--blanco);
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            border: 2px solid transparent;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .provincia-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 30px rgba(212, 175, 55, 0.3);
            border-color: var(--dorado);
        }

        .provincia-card i {
            font-size: 3rem;
            color: var(--dorado);
            margin-bottom: 1rem;
        }

        .provincia-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--azul-profundo);
        }

        .provincia-card .count {
            font-size: 1.1rem;
            color: var(--gris-texto);
            font-weight: 300;
        }

        /* Listado de apartamentos */
        .apartamentos-section {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem 5%;
        }

        .apartamentos-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid var(--dorado);
        }

        .apartamentos-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: var(--azul-profundo);
        }

        .btn-volver {
            background-color: var(--azul-profundo);
            color: var(--blanco);
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-volver:hover {
            background-color: var(--dorado);
            color: var(--azul-profundo);
            transform: translateX(-5px);
        }

        .apartamentos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        .apartamento-card {
            background: var(--blanco);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .apartamento-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 35px rgba(44, 62, 80, 0.2);
            border-color: var(--dorado);
        }

        .apartamento-header-card {
            background: linear-gradient(135deg, var(--azul-profundo) 0%, #34495e 100%);
            padding: 1.5rem;
            color: var(--blanco);
        }

        .apartamento-header-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            color: var(--dorado);
        }

        .apartamento-registro {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .apartamento-body {
            padding: 1.5rem;
        }

        .apartamento-info {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
            font-size: 0.95rem;
        }

        .info-item i {
            color: var(--dorado);
            width: 20px;
            margin-top: 0.2rem;
        }

        .info-item-content {
            flex: 1;
        }

        .info-item-content strong {
            color: var(--azul-profundo);
            display: block;
            margin-bottom: 0.2rem;
        }

        .apartamento-footer {
            padding: 1.5rem;
            background-color: var(--crema);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #e0e0e0;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .plazas-badge {
            background-color: var(--dorado);
            color: var(--azul-profundo);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .accesible-badge {
            background-color: #27ae60;
            color: var(--blanco);
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .contacto-buttons {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .btn-contacto {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-telefono {
            background-color: var(--azul-profundo);
            color: var(--blanco);
        }

        .btn-telefono:hover {
            background-color: var(--dorado);
            color: var(--azul-profundo);
        }

        .btn-email {
            background-color: var(--dorado);
            color: var(--azul-profundo);
        }

        .btn-email:hover {
            background-color: var(--azul-profundo);
            color: var(--blanco);
        }

        .btn-web {
            background-color: #3498db;
            color: var(--blanco);
        }

        .btn-web:hover {
            background-color: #2980b9;
        }

        .btn-mapa {
            background-color: #e74c3c;
            color: var(--blanco);
        }

        .btn-mapa:hover {
            background-color: #c0392b;
        }

        .no-resultados {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--gris-texto);
            grid-column: 1 / -1;
        }

        .no-resultados i {
            font-size: 4rem;
            color: var(--dorado);
            margin-bottom: 1rem;
        }

        .no-resultados h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--azul-profundo);
            margin-bottom: 0.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .apartamentos-hero h1 {
                font-size: 2rem;
            }

            .apartamentos-hero p {
                font-size: 1rem;
            }

            .provincias-grid {
                grid-template-columns: 1fr;
            }

            .apartamentos-grid {
                grid-template-columns: 1fr;
            }

            .apartamentos-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .apartamento-footer {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 480px) {
            .apartamentos-hero h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>

    <!-- HERO SECTION -->
    <section class="apartamentos-hero">
        <h1>Apartamentos Turísticos</h1>
        <div class="decorador"></div>
        <p>Descubre los mejores apartamentos turísticos de Castilla y León. Selecciona tu provincia y encuentra el alojamiento perfecto para tu experiencia.</p>
    </section>

    <!-- SELECTOR DE PROVINCIAS -->
    <div class="provincias-container">
        <div class="provincias-grid">
            <!-- Ávila -->
            <a href="#" class="provincia-card">
                <i class="fas fa-mountain"></i>
                <h3>Ávila</h3>
                <p class="count">12 apartamentos</p>
            </a>

            <!-- Burgos -->
            <a href="#" class="provincia-card">
                <i class="fas fa-landmark"></i>
                <h3>Burgos</h3>
                <p class="count">18 apartamentos</p>
            </a>

            <!-- León -->
            <a href="#" class="provincia-card">
                <i class="fas fa-crown"></i>
                <h3>León</h3>
                <p class="count">15 apartamentos</p>
            </a>

            <!-- Palencia -->
            <a href="#" class="provincia-card">
                <i class="fas fa-church"></i>
                <h3>Palencia</h3>
                <p class="count">8 apartamentos</p>
            </a>

            <!-- Salamanca -->
            <a href="#" class="provincia-card">
                <i class="fas fa-graduation-cap"></i>
                <h3>Salamanca</h3>
                <p class="count">25 apartamentos</p>
            </a>

            <!-- Segovia -->
            <a href="#" class="provincia-card">
                <i class="fas fa-chess-rook"></i>
                <h3>Segovia</h3>
                <p class="count">14 apartamentos</p>
            </a>

            <!-- Soria -->
            <a href="#" class="provincia-card">
                <i class="fas fa-tree"></i>
                <h3>Soria</h3>
                <p class="count">6 apartamentos</p>
            </a>

            <!-- Valladolid -->
            <a href="#" class="provincia-card">
                <i class="fas fa-wine-glass"></i>
                <h3>Valladolid</h3>
                <p class="count">22 apartamentos</p>
            </a>

            <!-- Zamora -->
            <a href="#" class="provincia-card">
                <i class="fas fa-archway"></i>
                <h3>Zamora</h3>
                <p class="count">10 apartamentos</p>
            </a>
        </div>
    </div>

    <!-- EJEMPLO DE LISTADO DE APARTAMENTOS (Comentado para referencia futura) -->
    <!--
    <div class="apartamentos-section">
        <div class="apartamentos-header">
            <h2>Apartamentos en Salamanca</h2>
            <a href="indexApartamentos.php" class="btn-volver">
                <i class="fas fa-arrow-left"></i> Volver a Provincias
            </a>
        </div>
        <div class="apartamentos-grid">
            
            <div class="apartamento-card">
                <div class="apartamento-header-card">
                    <h3>Apartamentos Universidad</h3>
                    <span class="apartamento-registro">Registro: 37/00001/SA</span>
                </div>
                <div class="apartamento-body">
                    <div class="apartamento-info">
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info-item-content">
                                <strong>Dirección</strong>
                                Calle Compañía, 12<br>
                                37002 - Salamanca
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-address-book"></i>
                            <div class="info-item-content">
                                <strong>Contacto</strong>
                                <div class="contacto-buttons">
                                    <a href="tel:923012345" class="btn-contacto btn-telefono">
                                        <i class="fas fa-phone"></i> 923 012 345
                                    </a>
                                    <a href="mailto:info@apartamentos.com" class="btn-contacto btn-email">
                                        <i class="fas fa-envelope"></i> Email
                                    </a>
                                    <a href="https://www.ejemplo.com" target="_blank" class="btn-contacto btn-web">
                                        <i class="fas fa-globe"></i> Web
                                    </a>
                                    <a href="https://www.google.com/maps?q=40.9651600,-5.6640200" target="_blank" class="btn-contacto btn-mapa">
                                        <i class="fas fa-map-marked-alt"></i> Mapa
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="apartamento-footer">
                    <div class="plazas-badge">
                        <i class="fas fa-users"></i>
                        6 plazas
                    </div>
                    <div class="accesible-badge">
                        <i class="fas fa-wheelchair"></i>
                        Accesible
                    </div>
                </div>
            </div>

            <div class="apartamento-card">
                <div class="apartamento-header-card">
                    <h3>Suites Plaza Mayor</h3>
                    <span class="apartamento-registro">Registro: 37/00002/SA</span>
                </div>
                <div class="apartamento-body">
                    <div class="apartamento-info">
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info-item-content">
                                <strong>Dirección</strong>
                                Plaza Mayor, 22<br>
                                37002 - Salamanca
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-address-book"></i>
                            <div class="info-item-content">
                                <strong>Contacto</strong>
                                <div class="contacto-buttons">
                                    <a href="tel:923123456" class="btn-contacto btn-telefono">
                                        <i class="fas fa-phone"></i> 923 123 456
                                    </a>
                                    <a href="mailto:suites@plazamayor.com" class="btn-contacto btn-email">
                                        <i class="fas fa-envelope"></i> Email
                                    </a>
                                    <a href="https://www.suitesplazamayor.com" target="_blank" class="btn-contacto btn-web">
                                        <i class="fas fa-globe"></i> Web
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="apartamento-footer">
                    <div class="plazas-badge">
                        <i class="fas fa-users"></i>
                        4 plazas
                    </div>
                    <div class="accesible-badge">
                        <i class="fas fa-wheelchair"></i>
                        Accesible
                    </div>
                </div>
            </div>

        </div>
    </div>
    -->

    <?php include '../inc/footer.php'; ?>
</body>
</html>