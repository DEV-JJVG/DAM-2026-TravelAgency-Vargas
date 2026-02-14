<?php

// Configuración de la base de datos
$db = 'mysql:host=localhost;dbname=agenciadeviajes;charset=utf8mb4';
$usuario = 'root';
$contraseña = '';

try {
    $pdo = new PDO($db, $usuario, $contraseña);

    // Configuración de atributos para manejo de errores y modo de obtención
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // En producción, es mejor registrar el error en un log en lugar de mostrarlo
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
?>