<?php
// Aseguramos que la sesión esté iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="header_wrapper">
    <a href="index.php"><img id="logo" src="assets/imagenes/logo.png" alt="Logo"></a>

    <img id="banner" src="assets/imagenes/banner.jpg" alt="Banner">

    <div class="auth-section">
        <?php if (isset($_SESSION['user_id'])): ?>
            <span class="welcome-msg">Hola, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <a href="logout.php" class="btn-auth-header">Cerrar Sesión</a>
        <?php else: ?>
            <a href="login.php" class="btn-auth-header">Iniciar Sesión</a>
            <a href="register.php" class="btn-auth-header">Registrarse</a>
        <?php endif; ?>
    </div>
</div>