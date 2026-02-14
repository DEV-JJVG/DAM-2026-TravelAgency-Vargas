<?php
session_start();
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Agencia de viajes : Inicio</title>
        <link rel="stylesheet" href="assets/styles/style.css?v=<?php echo time(); ?>" media="all">

    </head>
    <body>
        <!--Contenedor principal-->
        <div class="main_wrapper">
            <!--Inicio de cabecera-->
            <?php include 'vistas/header.php'; ?>
            <!--Final de cabecera-->
            <!--Inicio del Navbar-->
            <?php include 'vistas/navbar.php'; ?>
            <!--Fin del Navbar-->
            <!--Inicio del contenido-->
            <div class="content_wrapper">
                <!--Inicio del sidebar izquierdo-->
                <?php include "vistas/left-sidebar.php"; ?>
                <!--Fin del sidebar izquierdo-->
                <!--Contenido empieza-->
                <div id="content_area">

                    <div id="packages_box">
                        <?php getPack(); ?>
                        <?php getCatPack(); ?>
                        <?php getTypePack(); ?>
                        <?php getSearchPack(); ?>
                    </div>
                </div>
            </div>
            <!--Fin del contenido-->
            <!--Inicio del pie-->
            <?php include "vistas/footer.php"; ?>
            <!--Fin del pie-->
        </div>
        <!--Fin del Contenedor principal-->
    </body>
</html>