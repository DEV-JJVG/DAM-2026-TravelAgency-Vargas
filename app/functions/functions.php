<?php

require_once "vistas/db.php";

// Obtengo de la IP para su guardado en la base de datos
function getIp(): string {
    return $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];
}

// Obtengo categorías y tipos 

function getCats(): void {
    global $pdo;

    $stmt = $pdo->query("SELECT cat_id, cat_title FROM categories");

    while ($row = $stmt->fetch()) {
        echo "<li><a href='index.php?cat={$row['cat_id']}'>{$row['cat_title']}</a></li>";
    }
}

function getTypes(): void {
    global $pdo;

    $stmt = $pdo->query("SELECT type_id, type_title FROM types");

    while ($row = $stmt->fetch()) {
        echo "<li><a href='index.php?type={$row['type_id']}'>{$row['type_title']}</a></li>";
    }
}

// Render de paquetes

function renderPackage(array $pack): void {
    echo "
    <div class='single_package'>
        <h3>{$pack['package_title']}</h3>
        <img src='assets/imagenes/packages/{$pack['package_image']}' alt='{$pack['package_title']}'>
        <p><strong>Precio: {$pack['package_price']} €</strong></p>
        <a href='details.php?pack_id={$pack['package_id']}'>Detalles</a>
    </div>
    ";
}

// Consultas de paquetes

function getPack(): void {
    // Si se ha seleccionado una categoría o un tipo específico, no ejecutamos esta función por defecto
    if (isset($_GET['cat']) || isset($_GET['type']) || isset($_GET['search'])) {
        return;
    }

    global $pdo;

    // Selecciono los paquetes donde package_type sea 1 (Destacados)

    $sql = "SELECT * FROM packages WHERE package_type = 1 LIMIT 6";

    $stmt = $pdo->query($sql);

    if ($stmt->rowCount() == 0) {
        $sql = "SELECT * FROM packages ORDER BY RAND() LIMIT 6";
        $stmt = $pdo->query($sql);
    }

    while ($row = $stmt->fetch()) {
        renderPackage($row);
    }
}

function getCatPack(): void {
    if (!isset($_GET['cat'])) {
        return;
    }

    global $pdo;

    $cat_id = $_GET['cat'];

    $sql = "SELECT * FROM packages WHERE package_cat = :id";
    $stmt = $pdo->prepare($sql);

    // Ejecuto pasando el parámetro
    $stmt->execute([':id' => $cat_id]);

    // Verifico si hay resultados
    if ($stmt->rowCount() === 0) {
        echo "<p>No hay paquetes en esta categoría.</p>";
        return;
    }

    while ($row = $stmt->fetch()) {
        renderPackage($row);
    }
}

function getTypePack(): void {
    if (!isset($_GET['type'])) {
        return;
    }

    global $pdo;

    $type_id = $_GET['type'];

    $sql = "SELECT * FROM packages WHERE package_type = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([':id' => $type_id]);

    if ($stmt->rowCount() === 0) {
        echo "<p>No hay paquetes asociados a este tipo.</p>";
        return;
    }

    while ($row = $stmt->fetch()) {
        renderPackage($row);
    }
}

// Función para el buscador
function getSearchPack(): void {
    if (!isset($_GET['search'])) {
        return;
    }

    global $pdo;

    $user_query = $_GET['user_query'] ?? ''; // Destino
    $date_query = $_GET['date_query'] ?? ''; // Fecha
    // Preparo la consulta base
    $sql = "SELECT * FROM packages WHERE 1=1";
    $params = [];

    // Filtro por texto (título)
    if (!empty($user_query)) {
        $sql .= " AND package_title LIKE :query";
        $params[':query'] = "%$user_query%";
    }

    // Filtro por fecha (viajes que empiezan en o después de la fecha seleccionada)
    if (!empty($date_query)) {
        $sql .= " AND start_date >= :date";
        $params[':date'] = $date_query;
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    if ($stmt->rowCount() === 0) {
        echo "<h3 style='grid-column: 1/-1; text-align: center; color: #264653;'>No se encontraron viajes con esos criterios.</h3>";
        return;
    }

    echo "<h3 style='grid-column: 1/-1; margin-bottom: 20px; color: #2A9D8F;'>Resultados de la búsqueda:</h3>";

    while ($row = $stmt->fetch()) {
        renderPackage($row);
    }
}

?>
