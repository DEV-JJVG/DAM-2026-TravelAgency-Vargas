<?php
session_start();
require_once "vistas/db.php";
include("functions/functions.php");

$mensaje = "";

// Verifico que no haya alguien logueado antes de registrarse
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Proceso el formulario de registro
if (isset($_POST['username'])) {
    $nombreUsuario = trim($_POST['username'] ?? '');
    $contraseña = $_POST['password'] ?? '';
    $email = trim($_POST['email'] ?? '');
    $nombre = trim($_POST['first_name'] ?? '');
    $apellido = trim($_POST['last_name'] ?? '');

    if (empty($nombreUsuario) || empty($contraseña) || empty($email)) {
        $mensaje = "<p class='error_msg'>Por favor, completa los campos obligatorios (Usuario, Contraseña, Email).</p>";
    } else {
        $hashContraseña = password_hash($contraseña, PASSWORD_DEFAULT);

        try {
            $conexion->prepare("INSERT INTO users (username, password, email, first_name, last_name) VALUES (?, ?, ?, ?, ?)")->execute([
                $nombreUsuario,
                $hashContraseña,
                $email,
                $nombre,
                $apellido,
            ]);
            $mensaje = "<p class='success_msg'>Usuario registrado correctamente. <a href='login.php'>Inicia sesión aquí</a></p>";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $mensaje = "<p class='error_msg'>Error: El nombre de usuario o email ya existe.</p>";
            } else {
                $mensaje = "<p class='error_msg'>Error en el registro: " . $e->getMessage() . "</p>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agencia de viajes : Registro</title>
    <link rel="stylesheet" href="assets/styles/style.css?v=<?php echo time(); ?>" media="all">
</head>

<body>
    <div class="main_wrapper">
        <?php include 'vistas/header.php'; ?>
        <?php include 'vistas/navbar.php'; ?>

        <div class="content_wrapper">
            <div id="content_area" style="width: 100%; display: flex; justify-content: center;">
                <div class="auth_form_container">
                    <h2>Registro de Usuario</h2>
                    <?php echo $mensaje; ?>
                    <form method="POST" action="register.php" class="auth_form">
                        <div class="form_group">
                            <label for="username">Usuario *</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="form_group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form_group">
                            <label for="password">Contraseña *</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="form_group">
                            <label for="first_name">Nombre</label>
                            <input type="text" id="first_name" name="first_name">
                        </div>
                        <div class="form_group">
                            <label for="last_name">Apellidos</label>
                            <input type="text" id="last_name" name="last_name">
                        </div>
                        <button type="submit" class="btn_auth">Registrarse</button>
                    </form>
                    <p class="auth_link">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
                </div>
            </div>
        </div>

        <?php include "vistas/footer.php"; ?>
    </div>
</body>

</html>