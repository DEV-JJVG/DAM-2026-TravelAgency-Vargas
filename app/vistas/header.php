<?php
// Aseguramos que la sesión esté iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lógica para activar/desactivar el modo admin
if (isset($_GET['toggle_admin'])) {
    // Si existe la variable, la invertimos (True a False, o viceversa)
    $_SESSION['admin_mode'] = !($_SESSION['admin_mode'] ?? false);

    // Redirigimos a index.php para refrescar la URL
    header("Location: index.php");
    exit();
}

// Icono: Candado cerrado (bloqueado) o abierto (admin activo)
$icon = ($_SESSION['admin_mode'] ?? false) ? '🔓' : '🔒';
$status_text = ($_SESSION['admin_mode'] ?? false) ? 'Modo Admin: ON' : 'Modo Admin: OFF';
?>

<div class="header_wrapper">
    <a href="index.php"><img id="logo" src="assets/imagenes/logo.png" alt="Logo"></a>

    <img id="banner" src="assets/imagenes/banner.jpg" alt="Banner">

    <a href="?toggle_admin=true" class="admin-toggle" title="<?php echo $status_text; ?>">
        <span class="admin-icon"><?php echo $icon; ?></span>
    </a>
</div>