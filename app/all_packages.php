<?php
require_once "functions/functions.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Travel Bird : All Packages</title>
        <link rel="stylesheet" href="assets/styles/style.css">
    </head>
    <body>

        <div class="main_wrapper">

            <?php include 'vistas/header.php'; ?>
            <?php include 'vistas/navbar.php'; ?>

            <div class="content_wrapper">

                <?php include 'vistas/left-sidebar.php'; ?>

                <div id="content_area">

                    <div id="shopping_cart">
                        <span style="float:right; font-size:16px;">
                            Bienvenido Invitado 
                        </span>
                    </div>

                    <div id="packages_box">
                        <?php
                        require_once 'vistas/db.php';

                        // Obtengo todos los paquetes disponibles sin filtro ni límite
                        // SELECT * FROM packages → tabla: packages, sin parámetros
                        $stmt = $conexion->prepare("SELECT * FROM packages");
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            // Itero cada fila devuelta y construyo la tarjeta HTML
                            while ($fila = $stmt->fetch()) {
                                echo "
                        <div class='single_package'>
                            <h3>{$fila['package_title']}</h3>
                            <img src='assets/imagenes/packages/{$fila['package_image']}' alt='{$fila['package_title']}'>
                            <p><strong>Precio: {$fila['package_price']} €</strong></p>
                            <a href='details.php?pack_id={$fila['package_id']}'>Detalles</a>
                        </div>
                        ";
                            }
                        } else {
                            echo "<p>No hay paquetes disponibles.</p>";
                        }
                        ?>
                    </div>

                </div>
            </div>

            <?php include 'vistas/footer.php'; ?>

        </div>

    </body>
</html>
