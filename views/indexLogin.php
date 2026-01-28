<?php
// indexLogin.php

require_once   '../config/config.php';
require_once   '../dao/UsuarioDAO.php';
include '../inc/header.php';

$error = '';
$mensaje = '';

// Procesar el formulario de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($email) || empty($password)) {
        $error = 'Por favor, completa todos los campos';
    } else {
        try {
            $usuarioDAO = new UsuarioDAO();
            $usuario = $usuarioDAO->verificarLogin($email, $password);
            
            if ($usuario) {
                // Login exitoso - guardar datos en sesión
                $_SESSION['usuario'] = $usuario;
                $_SESSION['usuario_id'] = $usuario['id_usuario'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                $_SESSION['usuario_rol'] = $usuario['rol'];
                
                // Redirigir según el rol
                if ($usuario['rol'] === 'admin') {
                    header('Location: views/admin/dashboard.php');
                } else {
                    header('Location: index.php');
                }
                exit();
            } else {
                $error = 'Email o contraseña incorrectos';
            }
        } catch (Exception $e) {
            $error = 'Error al procesar el login. Intenta nuevamente.';
        }
    }
}

// Mensaje de registro exitoso
if (isset($_GET['registro']) && $_GET['registro'] === 'exitoso') {
    $mensaje = '¡Registro exitoso! Ya puedes iniciar sesión';
}

// Si ya está logueado, redirigir
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Apartamentos CyL</title>  
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
   

    <!-- Main Content -->
    <main>
        <div class="login-container">
            <div class="login-header">
                <h2>Iniciar Sesión</h2>
                <p>Accede a tu cuenta para gestionar tus reservas</p>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert alert-error">
                    ⚠️ <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($mensaje)): ?>
                <div class="alert alert-success">
                    ✓ <?php echo htmlspecialchars($mensaje); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="indexLogin.php">
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="tu@email.com"
                        value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="••••••••"
                        required
                    >
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Recordarme</span>
                    </label>
                    <a href="views/recuperar-password.php" class="forgot-password">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <button type="submit" class="btn-login">
                    Iniciar Sesión
                </button>
            </form>

            <div class="divider">
                <span>o</span>
            </div>

            <div class="register-link">
                ¿No tienes cuenta? <a href="views/registro.php">Regístrate aquí</a>
            </div>
        </div>
    </main>
</body>
</html>

<?php include '../inc/footer.php'; ?>
