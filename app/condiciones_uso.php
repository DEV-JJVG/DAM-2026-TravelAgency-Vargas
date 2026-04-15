<?php
session_start();
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Condiciones de uso del sitio web de la Agencia de Viajes. Información sobre el uso aceptable, responsabilidades y derechos del usuario.">
        <title>Agencia de Viajes : Condiciones de Uso</title>
        <link rel="stylesheet" href="assets/styles/style.css?v=<?php echo time(); ?>" media="all">
    </head>
    <body>
        <div class="main_wrapper">
            <?php include 'vistas/header.php'; ?>
            <?php include 'vistas/navbar.php'; ?>

            <div class="legal-page-wrapper">
                <div class="legal-hero">
                    <h1>Condiciones de Uso</h1>
                    <p class="legal-subtitle">Última actualización: <?php echo date('d/m/Y'); ?></p>
                </div>

                <div class="legal-content">

                    <div class="legal-toc">
                        <h2>Índice</h2>
                        <ol>
                            <li><a href="#aceptacion">Aceptación de las condiciones</a></li>
                            <li><a href="#uso-permitido">Uso permitido del sitio</a></li>
                            <li><a href="#propiedad-intelectual">Propiedad intelectual</a></li>
                            <li><a href="#limitacion">Limitación de responsabilidad</a></li>
                            <li><a href="#enlaces">Enlaces a terceros</a></li>
                            <li><a href="#modificaciones">Modificaciones</a></li>
                            <li><a href="#legislacion">Legislación aplicable</a></li>
                        </ol>
                    </div>

                    <section id="aceptacion" class="legal-section">
                        <h2>1. Aceptación de las condiciones</h2>
                        <p>El acceso y uso de este sitio web implica la aceptación plena y sin reservas de las presentes Condiciones de Uso. Si no está de acuerdo con alguno de los términos aquí recogidos, le rogamos que abandone el sitio web.</p>
                        <p>Estas condiciones pueden ser modificadas en cualquier momento por la Agencia de Viajes sin previo aviso. Es responsabilidad del usuario revisarlas periódicamente.</p>
                    </section>

                    <section id="uso-permitido" class="legal-section">
                        <h2>2. Uso permitido del sitio</h2>
                        <p>El usuario se compromete a utilizar este sitio web y todos sus contenidos y servicios de conformidad con la ley, las presentes Condiciones de Uso, la moral y el orden público. Queda expresamente prohibido:</p>
                        <ul class="legal-list">
                            <li>Reproducir, copiar, distribuir o modificar los contenidos del sitio sin autorización expresa.</li>
                            <li>Introducir o difundir virus informáticos o cualquier otro sistema físico o lógico que pueda dañar el sitio web.</li>
                            <li>Intentar acceder a áreas restringidas del sitio sin la debida autorización.</li>
                            <li>Utilizar el sitio con fines comerciales o publicitarios no autorizados.</li>
                            <li>Suministrar datos falsos durante los procesos de registro o contratación.</li>
                        </ul>
                    </section>

                    <section id="propiedad-intelectual" class="legal-section">
                        <h2>3. Propiedad intelectual</h2>
                        <p>Todos los contenidos del sitio web, incluyendo textos, fotografías, gráficos, imágenes, iconos, diseño y código fuente, son propiedad de la Agencia de Viajes o de terceros cuyos derechos han sido legítimamente adquiridos, y están protegidos por las leyes de propiedad intelectual e industrial.</p>
                        <p>Queda prohibida la reproducción total o parcial de los contenidos del sitio sin autorización previa y por escrito de la Agencia de Viajes.</p>
                    </section>

                    <section id="limitacion" class="legal-section">
                        <h2>4. Limitación de responsabilidad</h2>
                        <p>La Agencia de Viajes no garantiza la disponibilidad continua del sitio web ni la ausencia de errores en sus contenidos. No se responsabiliza de los daños que pudieran derivarse de:</p>
                        <ul class="legal-list">
                            <li>Interrupciones en el servicio por causas técnicas o de mantenimiento.</li>
                            <li>Información errónea o desactualizada contenida en el sitio.</li>
                            <li>El uso indebido del sitio por parte del usuario.</li>
                            <li>Intrusiones o ataques informáticos de terceros.</li>
                        </ul>
                    </section>

                    <section id="enlaces" class="legal-section">
                        <h2>5. Enlaces a terceros</h2>
                        <p>Este sitio puede contener enlaces a páginas web de terceros. La Agencia de Viajes no asume ninguna responsabilidad sobre el contenido, informaciones o servicios que aparezcan en dichos sitios, los cuales tienen exclusivamente carácter informativo y no implican ninguna relación entre la Agencia y los responsables de esas páginas.</p>
                    </section>

                    <section id="modificaciones" class="legal-section">
                        <h2>6. Modificaciones</h2>
                        <p>La Agencia de Viajes se reserva el derecho de efectuar, sin previo aviso, las modificaciones que considere oportunas en su portal, pudiendo cambiar, suprimir o añadir tanto los contenidos y servicios que se presten a través del mismo, como la forma en la que éstos aparezcan presentados o localizados en el portal.</p>
                    </section>

                    <section id="legislacion" class="legal-section">
                        <h2>7. Legislación aplicable</h2>
                        <p>Las presentes Condiciones de Uso se rigen por la legislación española vigente. Para la resolución de cualquier conflicto derivado de la interpretación o aplicación de estas condiciones, las partes se someten expresamente a los Juzgados y Tribunales de España, con renuncia a cualquier otro fuero que pudiera corresponderles.</p>
                    </section>

                    <div class="legal-back">
                        <a href="index.php" class="btn-legal-back">← Volver al inicio</a>
                    </div>

                </div>
            </div>

            <?php include "vistas/footer.php"; ?>
        </div>
    </body>
</html>
