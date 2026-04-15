<?php

// Configuración de la base de datos la cual incluye el host, nombre de la base de datos y el charset junto al usuario y contraseña
$db = 'mysql:host=localhost;dbname=agenciadeviajes;charset=utf8mb4';
$usuario = 'root';
$contraseña = '';

try {
    $conexion = new PDO($db, $usuario, $contraseña);

    // Lanza PDOException ante cualquier error SQL (en vez de fallar silenciosamente)
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // fetch() y fetchAll() devuelven arrays asociativos por defecto (columna hacia el valor)
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
?>