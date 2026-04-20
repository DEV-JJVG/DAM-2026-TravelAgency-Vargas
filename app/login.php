<?php
session_start();
require_once "vistas/db.php";
include("functions/functions.php");

$mensaje = "";

// Verifico que no haya alguien logueado antes de iniciar sesión
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Proceso el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreUsuario = trim($_POST['username'] ?? '');
    $contraseña = $_POST['password'] ?? '';
    $nombreSaldo = trim($_POST[''] ?? '');
    if (empty($nombreUsuario) || empty($contraseña)) {
        $mensaje = "<p class='error_msg'>Por favor, completa todos los campos.</p>";
    } else {
        try {
            $stmt = $conexion->prepare("SELECT user_id, username, password, role FROM users WHERE username = ? OR email = ?");
            $stmt->execute([$nombreUsuario, $nombreUsuario]);
            $user = $stmt->fetch();

            if ($user && password_verify($contraseña, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                header("Location: index.php");
                exit();
            } else {
                $mensaje = "<p class='error_msg'>Credenciales incorrectas.</p>";
            }
        } catch (PDOException $e) {
            $mensaje = "<p class='error_msg'>Error en el inicio de sesión: " . $e->getMessage() . "</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agencia de viajes : Iniciar Sesión</title>
    <link rel="stylesheet" href="assets/styles/style.css?v=<?php echo time(); ?>" media="all">
</head>

<body>
    <div class="main_wrapper">
        <?php include 'vistas/header.php'; ?>
        <?php include 'vistas/navbar.php'; ?>

        <div class="content_wrapper">
            <div id="content_area" style="width: 100%; display: flex; justify-content: center;">
                <div class="auth_form_container">
                    <h2>Iniciar Sesión</h2>
                    <?php echo $mensaje; ?>
                    <form method="POST" action="login.php" class="auth_form">
                        <div class="form_group">
                            <label for="username">Usuario o Email</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="form_group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn_auth">Entrar</button>
                    </form>
                    <p class="auth_link">¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
                </div>
            </div>
        </div>

        <?php include "vistas/footer.php"; ?>
    </div>
</body>

</html>