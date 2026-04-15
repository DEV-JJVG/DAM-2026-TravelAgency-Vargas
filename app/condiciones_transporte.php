<?php
session_start();
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Condiciones de transporte de la Agencia de Viajes. Información sobre equipaje, embarque, cancelaciones y derechos del viajero.">
        <title>Agencia de Viajes : Condiciones de Transporte</title>
        <link rel="stylesheet" href="assets/styles/style.css?v=<?php echo time(); ?>" media="all">
    </head>
    <body>
        <div class="main_wrapper">
            <?php include 'vistas/header.php'; ?>
            <?php include 'vistas/navbar.php'; ?>

            <div class="legal-page-wrapper">
                <div class="legal-hero">
                    <h1>Condiciones de Transporte</h1>
                    <p class="legal-subtitle">Última actualización: <?php echo date('d/m/Y'); ?></p>
                </div>

                <div class="legal-content">

                    <div class="legal-toc">
                        <h2>Índice</h2>
                        <ol>
                            <li><a href="#reserva">Reserva y documentación</a></li>
                            <li><a href="#equipaje">Equipaje</a></li>
                            <li><a href="#embarque">Embarque y salida</a></li>
                            <li><a href="#cancelaciones">Cancelaciones y cambios</a></li>
                            <li><a href="#retrasos">Retrasos e irregularidades</a></li>
                            <li><a href="#responsabilidad">Responsabilidad del transportista</a></li>
                            <li><a href="#derechos-viajero">Derechos del viajero</a></li>
                            <li><a href="#menores">Menores no acompañados</a></li>
                        </ol>
                    </div>

                    <section id="reserva" class="legal-section">
                        <h2>1. Reserva y documentación</h2>
                        <p>Para realizar una reserva de transporte a través de nuestra agencia, el viajero deberá proporcionar datos personales válidos y actualizados. Es responsabilidad del viajero:</p>
                        <ul class="legal-list">
                            <li>Verificar que los datos del pasajero en el billete son correctos antes de la confirmación.</li>
                            <li>Disponer de documentación de viaje válida (DNI o pasaporte en vigor, visado si procede).</li>
                            <li>Consultar los requisitos de entrada del país de destino antes de viajar.</li>
                            <li>Presentarse en el punto de embarque con la antelación indicada en los billetes.</li>
                        </ul>
                    </section>

                    <section id="equipaje" class="legal-section">
                        <h2>2. Equipaje</h2>
                        <p>Las condiciones de equipaje varían según el transportista y la tarifa contratada. Con carácter general:</p>
                        <ul class="legal-list">
                            <li><strong>Equipaje de mano:</strong> dimensiones máximas de 55 × 40 × 20 cm y peso máximo de 10 kg (puede variar según transportista).</li>
                            <li><strong>Equipaje facturado:</strong> incluido o disponible como extra según la tarifa. El peso máximo por maleta es generalmente de 23 kg.</li>
                            <li><strong>Objetos prohibidos:</strong> queda estrictamente prohibido transportar artículos peligrosos, inflamables o que incumplan la normativa de seguridad aérea.</li>
                            <li><strong>Objetos de valor:</strong> se recomienda no incluir documentos de valor, dinero en efectivo o artículos electrónicos en el equipaje facturado.</li>
                        </ul>
                        <p>El transportista no se responsabiliza de pérdidas o daños en el equipaje facturado salvo que se demuestre su negligencia.</p>
                    </section>

                    <section id="embarque" class="legal-section">
                        <h2>3. Embarque y salida</h2>
                        <p>El viajero debe presentarse en el punto de embarque o facturación con la antelación mínima indicada por el transportista:</p>
                        <ul class="legal-list">
                            <li><strong>Vuelos nacionales e internacionales:</strong> entre 90 y 120 minutos antes de la hora de salida.</li>
                            <li><strong>Vuelos intercontinentales:</strong> entre 2 y 3 horas antes de la hora de salida.</li>
                            <li><strong>Transporte terrestre:</strong> mínimo 30 minutos antes de la salida.</li>
                        </ul>
                        <p>El incumplimiento de estos plazos podrá conllevar la denegación del embarque sin derecho a compensación ni reembolso por parte de la Agencia de Viajes.</p>
                    </section>

                    <section id="cancelaciones" class="legal-section">
                        <h2>4. Cancelaciones y cambios</h2>
                        <p>Las condiciones de cancelación y modificación de billetes dependen de la tarifa contratada:</p>
                        <ul class="legal-list">
                            <li><strong>Tarifa flexible:</strong> posibilidad de cambio o cancelación sin penalización hasta 24 horas antes del viaje.</li>
                            <li><strong>Tarifa estándar:</strong> cambios permitidos con un coste de gestión. Cancelaciones con reembolso parcial según antelación.</li>
                            <li><strong>Tarifa no reembolsable:</strong> no se admiten cancelaciones con reembolso. Los cambios pueden estar sujetos a tasas adicionales.</li>
                        </ul>
                        <p>En caso de cancelación por causas de fuerza mayor (catástrofes naturales, guerras, pandemias declaradas), se aplicarán condiciones especiales de acuerdo con la normativa vigente.</p>
                    </section>

                    <section id="retrasos" class="legal-section">
                        <h2>5. Retrasos e irregularidades</h2>
                        <p>En caso de retraso, cancelación o denegación de embarque involuntaria, los derechos del viajero quedan amparados por el Reglamento (CE) n.º 261/2004 del Parlamento Europeo, que establece:</p>
                        <ul class="legal-list">
                            <li>Derecho a recibir asistencia (comida, bebida, comunicación) durante la espera.</li>
                            <li>Derecho a reembolso o transporte alternativo en caso de cancelación.</li>
                            <li>Derecho a compensación económica entre 250 € y 600 € dependiendo de la distancia del vuelo y el retraso experimentado.</li>
                        </ul>
                    </section>

                    <section id="responsabilidad" class="legal-section">
                        <h2>6. Responsabilidad del transportista</h2>
                        <p>La Agencia de Viajes actúa como intermediaria en la contratación del transporte. La responsabilidad directa frente al viajero en la ejecución del servicio de transporte recae sobre el transportista contratado. La Agencia de Viajes no se responsabiliza de:</p>
                        <ul class="legal-list">
                            <li>Retrasos, cancelaciones o modificaciones de horario imputables al transportista.</li>
                            <li>Pérdida o daño del equipaje durante el transporte.</li>
                            <li>Cambios en las condiciones del servicio por causas ajenas a la Agencia.</li>
                        </ul>
                    </section>

                    <section id="derechos-viajero" class="legal-section">
                        <h2>7. Derechos del viajero</h2>
                        <p>De acuerdo con la normativa española y europea, el viajero tiene derecho a:</p>
                        <ul class="legal-list">
                            <li>Recibir información clara y veraz sobre las condiciones del viaje antes de la contratación.</li>
                            <li>Obtener documentación acreditativa de la reserva y el pago realizados.</li>
                            <li>Beneficiarse de las garantías establecidas por el Real Decreto Legislativo 1/2007 y el Real Decreto 39/2010.</li>
                            <li>Presentar reclamaciones formales ante la Agencia y, en su caso, ante las autoridades competentes.</li>
                        </ul>
                    </section>

                    <section id="menores" class="legal-section">
                        <h2>8. Menores no acompañados</h2>
                        <p>El transporte de menores no acompañados está sujeto a condiciones especiales y debe ser comunicado explícitamente a la Agencia en el momento de la reserva. Se requerirá autorización firmada del tutor legal. Consulte con nosotros las condiciones específicas del transportista para este servicio.</p>
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
