<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas - Apartamentos Turísticos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/ProyectoIntermodular/css/estilos.css">
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
                        <label for="nombre">Nombre del Apartamento</label>
                        <input type="text" id="nombre" name="nombre" readonly>
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
                </div>
                
                <h2 class="form-section-title">Datos del Usuario</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="id_usuario">ID Usuario *</label>
                        <input type="number" id="id_usuario" name="id_usuario" required placeholder="Ingrese su ID de usuario">
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