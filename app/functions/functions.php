<?php

require_once "vistas/db.php";

// Obtengo categorías y tipos mediante una sentencia Select desde la base de datos SQL

function getCategorias(): void {
    global $conexion;

    $stmt = $conexion->prepare("SELECT cat_id, cat_title FROM categories");
    $stmt->execute();

    // Renderizo cada categoría como un ítem de lista enlazado
    while ($fila = $stmt->fetch()) {
        echo "<li><a href='index.php?cat={$fila['cat_id']}'>{$fila['cat_title']}</a></li>";
    }
}

function getTipos(): void {
    global $conexion;

    $stmt = $conexion->prepare("SELECT type_id, type_title FROM types");
    $stmt->execute();

    // Renderizo cada tipo como un ítem de lista enlazado
    while ($fila = $stmt->fetch()) {
        echo "<li><a href='index.php?type={$fila['type_id']}'>{$fila['type_title']}</a></li>";
    }
}

// Render de paquetes

function renderPackage(array $paquetes): void {
    echo "
    <div class='single_package'>
        <h3>{$paquetes['package_title']}</h3>
        <img src='assets/imagenes/packages/{$paquetes['package_image']}' alt='{$paquetes['package_title']}'>
        <p><strong>Precio: {$paquetes['package_price']} €</strong></p>
        <div class='package_actions'>
            <a href='details.php?pack_id={$paquetes['package_id']}'>Detalles</a>";

    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        echo "
            <a href='editar_paquete.php?pack_id={$paquetes['package_id']}' class='btn-edit'>Editar</a>
            <a href='borrar_paquete.php?pack_id={$paquetes['package_id']}' class='btn-delete' onclick='return confirm(\"¿Estás seguro de que quieres borrar este paquete?\");'>Borrar</a>";
    }

    echo "
        </div>
    </div>
    ";
}

// Consultas de paquetes

function getPaquetes(): void {
    // Si hay algún filtro activo, esta función no debe ejecutarse
    if (isset($_GET['cat']) || isset($_GET['type']) || isset($_GET['search'])) {
        return;
    }

    global $conexion;

    // Intentamos obtener los paquetes marcados como destacados (package_type = 1)
    $stmt = $conexion->prepare("SELECT * FROM packages WHERE package_type = 1 LIMIT 6");
    $stmt->execute();

    // Si no hay paquetes destacados, mostramos 6 paquetes aleatorios como fallback
    if ($stmt->rowCount() == 0) {
        $stmt = $conexion->prepare("SELECT * FROM packages ORDER BY RAND() LIMIT 6");
        $stmt->execute();
    }

    while ($fila = $stmt->fetch()) {
        renderPackage($fila);
    }
}

function getCatPaquetes(): void {
    if (!isset($_GET['cat'])) {
        return;
    }

    global $conexion;

    $cat_id = $_GET['cat'];

    $stmt = $conexion->prepare("SELECT * FROM packages WHERE package_cat = :id");

    // Ejecuto pasando el parámetro, en este caso el id de la categoría
    $stmt->execute([':id' => $cat_id]);

    // Verifico si hay resultados
    if ($stmt->rowCount() === 0) {
        echo "<p>No hay paquetes en esta categoría.</p>";
        return;
    }

    while ($fila = $stmt->fetch()) {
        renderPackage($fila);
    }
}

function getTipoPaquetes(): void {
    if (!isset($_GET['type'])) {
        return;
    }

    global $conexion;

    $type_id = $_GET['type'];

    $stmt = $conexion->prepare("SELECT * FROM packages WHERE package_type = :id");
    $stmt->execute([':id' => $type_id]);

    if ($stmt->rowCount() === 0) {
        echo "<p>No hay paquetes asociados a este tipo.</p>";
        return;
    }

    while ($fila = $stmt->fetch()) {
        renderPackage($fila);
    }
}

// Función para el buscador
function getBusquedaPaquete(): void {
    if (!isset($_GET['search'])) {
        return;
    }

    global $conexion;

    $user_query = $_GET['user_query'] ?? ''; // Destino (texto libre)
    $date_query = $_GET['date_query'] ?? ''; // Fecha mínima de salida

    // Consulta base: seleccionamos todo sin filtro todavía
    $sql    = "SELECT * FROM packages WHERE 1=1";
    $params = [];

    // Filtro por texto: búsqueda parcial en el título del paquete (LIKE con comodines)
    if (!empty($user_query)) {
        $sql .= " AND package_title LIKE :query";
        $params[':query'] = "%$user_query%";
    }

    // Filtro por fecha: viajes cuya fecha de inicio sea igual o posterior a la elegida
    if (!empty($date_query)) {
        $sql .= " AND start_date >= :date";
        $params[':date'] = $date_query;
    }

    // Preparamos y ejecutamos la consulta con los parámetros activos
    $stmt = $conexion->prepare($sql);
    $stmt->execute($params);

    if ($stmt->rowCount() === 0) {
        echo "<h3 style='grid-column: 1/-1; text-align: center; color: #264653;'>No se encontraron viajes con esos criterios.</h3>";
        return;
    }

    echo "<h3 style='grid-column: 1/-1; margin-bottom: 20px; color: #2A9D8F;'>Resultados de la búsqueda:</h3>";

    while ($fila = $stmt->fetch()) {
        renderPackage($fila);
    }
}
?>
