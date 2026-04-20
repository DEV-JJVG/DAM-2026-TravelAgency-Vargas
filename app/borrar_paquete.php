<?php
session_start();
require_once "vistas/db.php";

// Verifico si el usuario es administrador
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Si no es admin, redirijo al inicio
    header("Location: index.php");
    exit();
}

if (isset($_GET['pack_id'])) {
    $pack_id = $_GET['pack_id'];

    try {
        // Obtengo la imagen para borrarla si es necesario
        $stmt_img = $conexion->prepare("SELECT package_image FROM packages WHERE package_id = ?");
        $stmt_img->execute([$pack_id]);
        $pack = $stmt_img->fetch();

        if ($pack) {
            // Borrar el registro de la base de datos mediante PDO
            $conexion->prepare("DELETE FROM packages WHERE package_id = ?")->execute([$pack_id]);

            // Redirigir al inicio con éxito
            header("Location: index.php?msg=borrado_exito");
            exit();
        } else {
            header("Location: index.php?msg=error_paquete_no_encontrado");
            exit();
        }
    } catch (PDOException $e) {
        // En caso de error, muestro el error o redirijo
        die("Error al borrar el paquete: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit();
}
