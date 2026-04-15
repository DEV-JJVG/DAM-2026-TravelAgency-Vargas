<?php
session_start();
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Política de privacidad de la Agencia de Viajes. Cómo recopilamos, usamos y protegemos sus datos personales según el RGPD.">
        <title>Agencia de Viajes : Política de Privacidad</title>
        <link rel="stylesheet" href="assets/styles/style.css?v=<?php echo time(); ?>" media="all">
    </head>
    <body>
        <div class="main_wrapper">
            <?php include 'vistas/header.php'; ?>
            <?php include 'vistas/navbar.php'; ?>

            <div class="legal-page-wrapper">
                <div class="legal-hero">
                    <h1>Política de Privacidad</h1>
                    <p class="legal-subtitle">Última actualización: <?php echo date('d/m/Y'); ?></p>
                </div>

                <div class="legal-content">

                    <div class="legal-toc">
                        <h2>Índice</h2>
                        <ol>
                            <li><a href="#responsable">Responsable del tratamiento</a></li>
                            <li><a href="#datos-recogidos">Datos que recopilamos</a></li>
                            <li><a href="#finalidad">Finalidad del tratamiento</a></li>
                            <li><a href="#base-legal">Base legal</a></li>
                            <li><a href="#conservacion">Conservación de datos</a></li>
                            <li><a href="#derechos">Sus derechos</a></li>
                            <li><a href="#seguridad">Seguridad</a></li>
                            <li><a href="#cookies">Cookies</a></li>
                        </ol>
                    </div>

                    <section id="responsable" class="legal-section">
                        <h2>1. Responsable del tratamiento</h2>
                        <p>De conformidad con el Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo (RGPD), le informamos que el responsable del tratamiento de sus datos personales es:</p>
                        <div class="legal-highlight-box">
                            <p><strong>Agencia de Viajes — Proyecto DAM 2026</strong></p>
                            <p>Responsable: Jorge Juan Vargas Gálvez</p>
                            <p>Email de contacto: info@agenciaviajes.es</p>
                        </div>
                    </section>

                    <section id="datos-recogidos" class="legal-section">
                        <h2>2. Datos que recopilamos</h2>
                        <p>Recopilamos los siguientes tipos de datos personales:</p>
                        <ul class="legal-list">
                            <li><strong>Datos de registro:</strong> nombre, apellidos, dirección de correo electrónico y contraseña (cifrada). O por lo menos fíese ;)</li>
                            <li><strong>Datos de contacto:</strong> teléfono y dirección postal para la gestión de reservas.</li>
                            <li><strong>Datos de navegación:</strong> dirección IP, tipo de navegador, páginas visitadas y tiempo de permanencia.</li>
                            <li><strong>Datos de transacciones:</strong> historial de reservas y paquetes contratados.</li>
                        </ul>
                    </section>

                    <section id="finalidad" class="legal-section">
                        <h2>3. Finalidad del tratamiento</h2>
                        <p>Sus datos personales son tratados con las siguientes finalidades:</p>
                        <ul class="legal-list">
                            <li>Gestión y ejecución de reservas y contratación de paquetes turísticos.</li>
                            <li>Comunicación de información sobre el estado de sus reservas.</li>
                            <li>Envío de comunicaciones comerciales sobre ofertas y novedades (solo con su consentimiento).</li>
                            <li>Cumplimiento de obligaciones legales y fiscales.</li>
                            <li>Mejora de nuestros servicios y experiencia de usuario.</li>
                        </ul>
                    </section>

                    <section id="base-legal" class="legal-section">
                        <h2>4. Base legal</h2>
                        <p>El tratamiento de sus datos se basa en las siguientes bases legitimadoras:</p>
                        <ul class="legal-list">
                            <li><strong>Ejecución del contrato:</strong> para la gestión de reservas y prestación de servicios.</li>
                            <li><strong>Consentimiento del interesado:</strong> para el envío de comunicaciones comerciales.</li>
                            <li><strong>Cumplimiento de obligaciones legales:</strong> para la facturación y declaraciones fiscales.</li>
                            <li><strong>Interés legítimo:</strong> para la mejora de nuestros servicios.</li>
                        </ul>
                    </section>

                    <section id="conservacion" class="legal-section">
                        <h2>5. Conservación de datos</h2>
                        <p>Sus datos serán conservados durante el tiempo necesario para la finalidad para la que fueron recabados y para determinar las posibles responsabilidades que pudieran derivarse de dicha finalidad. En cualquier caso, respetaremos los plazos mínimos de conservación establecidos por la legislación vigente.</p>
                    </section>

                    <section id="derechos" class="legal-section">
                        <h2>6. Sus derechos</h2>
                        <p>Tiene derecho a ejercitar los siguientes derechos en relación con sus datos personales:</p>
                        <ul class="legal-list">
                            <li><strong>Acceso:</strong> conocer qué datos tratamos sobre usted.</li>
                            <li><strong>Rectificación:</strong> corregir datos inexactos o incompletos.</li>
                            <li><strong>Supresión:</strong> solicitar el borrado de sus datos cuando ya no sean necesarios.</li>
                            <li><strong>Oposición:</strong> oponerse al tratamiento de sus datos para determinadas finalidades.</li>
                            <li><strong>Limitación:</strong> solicitar la restricción del tratamiento de sus datos.</li>
                            <li><strong>Portabilidad:</strong> recibir sus datos en un formato estructurado y de uso común.</li>
                        </ul>
                        <p>Para ejercer estos derechos, puede contactarnos en <strong>info@agenciaviajes.es</strong>. Asimismo, tiene derecho a presentar una reclamación ante la Agencia Española de Protección de Datos (AEPD).</p>
                    </section>

                    <section id="seguridad" class="legal-section">
                        <h2>7. Seguridad</h2>
                        <p>Hemos adoptado medidas técnicas y organizativas apropiadas para proteger sus datos personales contra pérdidas accidentales, accesos no autorizados, divulgación, alteración o destrucción. Las contraseñas se almacenan siempre cifradas y nunca en texto plano.</p>
                    </section>

                    <section id="cookies" class="legal-section">
                        <h2>8. Cookies</h2>
                        <p>Este sitio web utiliza cookies de sesión para mantener la autenticación del usuario y garantizar el correcto funcionamiento del sistema. No utilizamos cookies de publicidad ni de seguimiento de terceros. Para más información consulte nuestra <a href="condiciones_uso.php">Política de Cookies</a>.</p>
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
