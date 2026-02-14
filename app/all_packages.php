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
                        $sql = "SELECT * FROM packages";
                        $result = mysqli_query($con, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "
                        <div class='single_package'>
                            <h3>{$row['package_title']}</h3>
                            <img src='assets/images/packages/{$row['package_image']}' alt='{$row['package_title']}'>
                            <p><strong>Precio: {$row['package_price']} €</strong></p>
                            <a href='details.php?pack_id={$row['package_id']}'>Detalles</a>
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
