<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartamentos Turísticos de Lujo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --azul-profundo: #2C3E50;
            --dorado: #D4AF37;
            --crema: #F8F9FA;
            --blanco: #FFFFFF;
            --gris-texto: #555;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Lato', sans-serif;
            background-color: var(--crema);
            color: var(--gris-texto);
            line-height: 1.6;
        }
        
        /* HEADER */
        header {
            background-color: var(--azul-profundo);
            padding: 0.8rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            min-height: 85px;
        }
        
        .logo {
            display: flex;
            align-items: center;
            height: 70px;
        }
        
        .logo-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            height: 100%;
        }
        
        #logo-img {
            height: 110px;
            width: auto;
            max-width: 220px;
            min-width: 130px;
            object-fit: contain;
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        
        #logo-img:hover {
            transform: scale(1.05);
        }
        
        nav {
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }
        
        nav a {
            color: var(--crema);
            text-decoration: none;
            font-size: 1rem;
            font-weight: 400;
            position: relative;
            padding: 0.5rem 0;
            transition: color 0.3s ease;
        }
        
        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--dorado);
            transition: width 0.3s ease;
        }
        
        nav a:hover {
            color: var(--dorado);
        }
        
        nav a:hover::after {
            width: 100%;
        }
        
        /* MAIN SECTION */
        main {
            min-height: 80vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 3rem 5%;
        }
        
        #inicio {
            scroll-margin-top: 100px; /* Ajusta según la altura de tu header */
        }
        
        .video-container {
            width: 100%;
            max-width: 1200px;
            margin-bottom: 3rem;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(44, 62, 80, 0.2);
            position: relative;
        }
        
        .video-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 3px solid var(--dorado);
            border-radius: 12px;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }
        
        .video-container:hover::before {
            opacity: 1;
        }
        
        video {
            width: 100%;
            height: auto;
            display: block;
        }
        
        .eslogan {
            text-align: center;
            max-width: 900px;
            padding: 2rem;
        }
        
        .eslogan h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--azul-profundo);
            margin-bottom: 1rem;
            line-height: 1.2;
            letter-spacing: -1px;
        }
        
        .eslogan .decorador {
            display: inline-block;
            width: 120px;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--dorado), transparent);
            margin: 1.5rem 0;
        }
        
        .eslogan p {
            font-size: 1.3rem;
            color: var(--gris-texto);
            font-weight: 300;
            line-height: 1.8;
        }
        
        /* FOOTER */
        footer {
            background-color: var(--azul-profundo);
            color: var(--crema);
            padding: 4rem 5% 1.5rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }
        
        .footer-section h3 {
            font-family: 'Playfair Display', serif;
            color: var(--dorado);
            font-size: 1.4rem;
            margin-bottom: 1.2rem;
            font-weight: 600;
        }
        
        .footer-section p,
        .footer-section a {
            color: var(--crema);
            text-decoration: none;
            font-size: 0.95rem;
            line-height: 1.8;
            display: block;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        
        .footer-section a:hover {
            color: var(--dorado);
            transform: translateX(5px);
        }
        
        .contacto-item {
            margin-bottom: 0.8rem;
        }
        
        .contacto-item strong {
            color: var(--dorado);
            font-weight: 600;
        }
        
        .redes-sociales {
            display: flex;
            gap: 1.5rem;
            margin-top: 1rem;
        }
        
        .redes-sociales a {
            width: 45px;
            height: 45px;
            border: 2px solid var(--dorado);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .redes-sociales a:hover {
            background-color: var(--dorado);
            color: var(--azul-profundo);
            transform: translateY(-5px) rotate(360deg);
        }
        
        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(248, 249, 250, 0.2);
            font-size: 0.9rem;
            color: rgba(248, 249, 250, 0.7);
        }
        
        /* RESPONSIVE */
        @media (max-width: 1024px) {
            #logo-img {
                height: 65px;
                max-width: 180px;
            }
            
            header {
                min-height: 75px;
            }
            
            #inicio {
                scroll-margin-top: 90px;
            }
        }
        
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 1.2rem;
                padding: 1rem 5%;
                min-height: auto;
            }
            
            .logo {
                height: auto;
                justify-content: center;
                width: 100%;
            }
            
            .logo-link {
                justify-content: center;
            }
            
            #logo-img {
                height: 60px;
                max-width: 160px;
            }
            
            nav {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
                width: 100%;
            }
            
            nav a {
                padding: 0.8rem;
            }
            
            #inicio {
                scroll-margin-top: 80px;
            }
            
            .eslogan h1 {
                font-size: 2.2rem;
            }
            
            .eslogan p {
                font-size: 1.1rem;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }
        
        @media (max-width: 480px) {
            #logo-img {
                height: 50px;
                max-width: 140px;
            }
            
            #inicio {
                scroll-margin-top: 70px;
            }
            
            .eslogan h1 {
                font-size: 1.8rem;
            }
            
            .eslogan p {
                font-size: 1rem;
            }
            
            nav {
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <header>
        <div class="logo">
            <a href="#inicio" class="logo-link">
                <img src="images/GYA.png" alt="LuxeStay - Inicio" id="logo-img">
            </a>
        </div>
        <nav>
            <a href="#inicio">Inicio</a>
            <a href="#reservas">Reservas</a>
            <a href="#mapa">Mapa</a>
            <a href="#busqueda">Búsqueda</a>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main id="inicio">
        <div class="video-container">
            <video controls autoplay muted loop>
                <source src="tu-video.mp4" type="video/mp4">
                Tu navegador no soporta la reproducción de videos.
            </video>
        </div>
        
        <div class="eslogan">
            <h1>Donde el Lujo se Encuentra con el Hogar</h1>
            <div class="decorador"></div>
            <p>Descubre una experiencia única en nuestros apartamentos turísticos, diseñados para ofrecerte confort, elegancia y momentos inolvidables en cada estancia.</p>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="footer-content">
            <!-- Contacto -->
            <div class="footer-section">
                <h3>Contacto</h3>
                <div class="contacto-item">
                    <strong>Teléfono:</strong> +34 923 123 456
                </div>
                <div class="contacto-item">
                    <strong>Email:</strong> info@luxestay.com
                </div>
                <div class="contacto-item">
                    <strong>Dirección:</strong> Plaza Mayor, 1<br>37001 Salamanca, España
                </div>
            </div>
            
            <!-- Redes Sociales -->
            <div class="footer-section">
                <h3>Síguenos</h3>
                <div class="redes-sociales">
                    <a href="#" title="Facebook">f</a>
                    <a href="#" title="Instagram">📷</a>
                    <a href="#" title="Twitter">🐦</a>
                    <a href="#" title="LinkedIn">in</a>
                </div>
            </div>
            
            <!-- Acerca de Nosotros -->
            <div class="footer-section">
                <h3>Acerca de Nosotros</h3>
                <p>LuxeStay ofrece apartamentos turísticos premium en ubicaciones privilegiadas. Nos especializamos en crear experiencias de alojamiento excepcionales que combinan comodidad, estilo y servicios de primera clase para viajeros exigentes.</p>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2026 LuxeStay Apartamentos Turísticos. Todos los derechos reservados. | Licencia Turística: AT-37-0001 | Diseño web por tu empresa</p>
        </div>
    </footer>
</body>
</html>