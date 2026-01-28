<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas - Apartamentos Turísticos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
    <style>
        /* Estilos específicos para la página de reservas */
        .reservas-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }
        
        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            color: var(--azul-profundo);
            text-align: center;
            margin-bottom: 1rem;
        }
        
        .page-subtitle {
            text-align: center;
            color: var(--gris-texto);
            font-size: 1.2rem;
            margin-bottom: 3rem;
        }
        
        .decorador-center {
            display: block;
            width: 120px;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--dorado), transparent);
            margin: 1.5rem auto 2rem;
        }
        
        /* Formulario de reserva */
        .form-reserva {
            background: var(--blanco);
            border-radius: 12px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(44, 62, 80, 0.1);
            margin-bottom: 3rem;
        }
        
        .form-section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--azul-profundo);
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--dorado);
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
        }
        
        .form-group label {
            font-weight: 600;
            color: var(--azul-profundo);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 0.9rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Lato', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: var(--crema);
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--dorado);
            background-color: var(--blanco);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }
        
        .form-group input[readonly] {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }
        
        .form-group-full {
            grid-column: 1 / -1;
        }
        
        /* Botones */
        .btn-container {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }
        
        .btn {
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 8px;
            font-family: 'Lato', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .btn-primary {
            background-color: var(--dorado);
            color: var(--azul-profundo);
        }
        
        .btn-primary:hover {
            background-color: #c19b2e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }
        
        .btn-secondary {
            background-color: var(--azul-profundo);
            color: var(--crema);
        }
        
        .btn-secondary:hover {
            background-color: #1a252f;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(44, 62, 80, 0.3);
        }
        
        /* Sección de información */
        .info-box {
            background: linear-gradient(135deg, var(--azul-profundo), #34495e);
            color: var(--crema);
            padding: 2rem;
            border-radius: 12px;
            margin-bottom: 3rem;
        }
        
        .info-box h3 {
            font-family: 'Playfair Display', serif;
            color: var(--dorado);
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .info-box ul {
            list-style: none;
            padding: 0;
        }
        
        .info-box ul li {
            padding: 0.5rem 0;
            padding-left: 1.5rem;
            position: relative;
        }
        
        .info-box ul li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: var(--dorado);
            font-weight: bold;
        }
        
        /* Mensajes de estado */
        .mensaje {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: none;
        }
        
        .mensaje.exito {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        
        .mensaje.error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .reservas-container {
                padding: 2rem 1rem;
            }
            
            .form-reserva {
                padding: 2rem 1.5rem;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .btn-container {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php include '../inc/header.php'; ?>

    <main>
        <div class="reservas-container">
            <h1 class="page-title">Reserva tu Apartamento</h1>
            <div class="decorador-center"></div>
            <p class="page-subtitle">Complete el formulario para realizar su reserva</p>
            
            <!-- Mensaje de estado -->
            <div id="mensaje" class="mensaje"></div>
            
            <!-- Información importante -->
            <div class="info-box">
                <h3>Información de Reserva</h3>
                <ul>
                    <li>Las reservas deben realizarse con al menos 48 horas de antelación</li>
                    <li>La fecha de salida debe ser posterior a la fecha de entrada</li>
                    <li>Recibirá un correo de confirmación tras completar la reserva</li>
                    <li>Para modificaciones o cancelaciones, contacte con nosotros</li>
                </ul>
            </div>
            
            <!-- Formulario de reserva -->
            <form id="form-reserva" class="form-reserva" method="POST" action="../controllers/procesar_reserva.php">
                
                <h2 class="form-section-title">Selección de Apartamento</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="n_registro">Apartamento *</label>
                        <select id="n_registro" name="n_registro" required>
                            <option value="">Seleccione un apartamento</option>
                            <!-- Opciones cargadas dinámicamente desde la BD -->
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="nombre_apartamento">Nombre del Apartamento</label>
                        <input type="text" id="nombre_apartamento" name="nombre_apartamento" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="provincia">Provincia</label>
                        <input type="text" id="provincia" name="provincia" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="plazas">Plazas Disponibles</label>
                        <input type="text" id="plazas" name="plazas" readonly>
                    </div>
                </div>
                
                <h2 class="form-section-title">Fechas de Estancia</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="fecha_entrada">Fecha de Entrada *</label>
                        <input type="date" id="fecha_entrada" name="fecha_entrada" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="fecha_salida">Fecha de Salida *</label>
                        <input type="date" id="fecha_salida" name="fecha_salida" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="num_personas">Número de Personas *</label>
                        <input type="number" id="num_personas" name="num_personas" min="1" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="noches">Noches de Estancia</label>
                        <input type="text" id="noches" name="noches" readonly>
                    </div>
                </div>
                
                <h2 class="form-section-title">Datos del Usuario</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="id_usuario">ID Usuario *</label>
                        <input type="number" id="id_usuario" name="id_usuario" required placeholder="Ingrese su ID de usuario">
                    </div>
                    
                    <div class="form-group">
                        <label for="nombre_usuario">Nombre Completo *</label>
                        <input type="text" id="nombre_usuario" name="nombre_usuario" required placeholder="Nombre completo">
                    </div>
                    
                    <div class="form-group">
                        <label for="email_usuario">Email *</label>
                        <input type="email" id="email_usuario" name="email_usuario" required placeholder="correo@ejemplo.com">
                    </div>
                    
                    <div class="form-group">
                        <label for="telefono_usuario">Teléfono *</label>
                        <input type="tel" id="telefono_usuario" name="telefono_usuario" required placeholder="+34 600 000 000">
                    </div>
                    
                    <div class="form-group form-group-full">
                        <label for="observaciones">Observaciones</label>
                        <textarea id="observaciones" name="observaciones" rows="4" placeholder="Indique cualquier petición especial o comentario..."></textarea>
                    </div>
                </div>
                
                <!-- Botones -->
                <div class="btn-container">
                    <button type="submit" class="btn btn-primary">Confirmar Reserva</button>
                    <button type="reset" class="btn btn-secondary">Limpiar Formulario</button>
                </div>
            </form>
        </div>
    </main>

    <?php include '../inc/footer.php'; ?>
    
    <script src="../js/reservas.js"></script>
</body>
</html>