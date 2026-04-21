-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.13.0.7147
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para agenciadeviajes
CREATE DATABASE IF NOT EXISTS `agenciadeviajes` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `agenciadeviajes`;

-- Volcando estructura para tabla agenciadeviajes.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla agenciadeviajes.categories: ~3 rows (aproximadamente)
INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
	(1, 'Business'),
	(2, 'Económica'),
	(3, 'Regular');

-- Volcando estructura para tabla agenciadeviajes.packages
CREATE TABLE IF NOT EXISTS `packages` (
  `package_id` int(100) NOT NULL AUTO_INCREMENT,
  `package_cat` int(100) NOT NULL,
  `package_type` int(100) NOT NULL,
  `package_title` varchar(255) NOT NULL,
  `package_price` int(100) NOT NULL,
  `package_desc` longtext NOT NULL,
  `package_image` text NOT NULL,
  `package_keywords` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla agenciadeviajes.packages: ~22 rows (aproximadamente)
INSERT INTO `packages` (`package_id`, `package_cat`, `package_type`, `package_title`, `package_price`, `package_desc`, `package_image`, `package_keywords`, `start_date`, `end_date`) VALUES
	(1, 1, 2, 'Bali: Paraíso Tropical Exótico', 5500, '<p>Sumérgete en la "Isla de los Dioses". Disfruta de playas cristalinas, templos sagrados y una cultura vibrante perfecta para desconectar.</p>', 'balitravel.jpg', 'bali Bali BALI tour Tour package Package PACKAGES packages tours TOURS travel TRAVEL travels TRAVELS Travel Travels Indonesia indonesia', '2026-08-18', '2026-08-24'),
	(2, 2, 2, 'Bichanakandi: El Oasis de Piedra', 5000, '<p>Donde las nubes tocan las montañas. Explora este destino único en Sylhet, famoso por sus aguas turquesas y lechos de piedra natural.</p>', 'bichanakandi02.jpg', 'bichanakandi sylhet regular family Regular Family REGULAR FAMILY Bichanakandi', '2026-06-16', '2026-06-24'),
	(4, 2, 3, 'Sri Lanka: La Perla del Índico', 7000, '<p>Un viaje de ensueño entre plantaciones de té, elefantes en libertad y playas doradas. La mezcla perfecta de naturaleza y cultura.</p>', 'srilanka01.jpg', 'srilanka SRILANKA Srilanka SriLanka Sri Lanka sri lanka tour travel Tour Travel TRAVEL TOUR', '2026-05-22', '2026-06-01'),
	(6, 3, 2, 'Maravillas de la India: Taj Mahal', 7000, '<p>Sé testigo del amor eterno. Visita una de las 7 maravillas del mundo y déjate cautivar por la majestuosidad arquitectónica de Agra.</p>', 'taj01.jpg', 'tajmahal taj mahal TajMahal Taj Mahal TAJMAHAL TAJmahal tajMAHAL regular family Regular Family tour travel Tour Travel India india INDIA', '2026-08-17', '2026-08-26'),
	(7, 2, 2, 'Katmandú Místico: Techo del Mundo', 5000, '<p>Aventura espiritual a los pies del Himalaya. Recorre templos antiguos, plazas históricas y siente la energía única de Nepal.</p>', 'nepal01.jpg', 'nepal kathmandu Nepal Kathmandu NEPAL KATHMANDU economy Economy ECONOMY family Family FAMILY', '2026-07-05', '2026-07-09'),
	(8, 1, 3, 'Escapada Alpina a Manali', 1400, '<p>Refúgiate entre picos nevados y bosques de pinos. El destino ideal para parejas y amantes de la montaña que buscan aire puro.</p>', 'manali01.jpg', 'manali Manali MANALI india India tour travel Tour TRAVEL TOUR Travel Business Couple business couple BUSINESS COUPLE', '2026-05-27', '2026-06-03'),
	(9, 1, 3, 'Cox\'s Bazar: Playa Infinita', 2200, '<p>Camina por la playa de arena natural más larga del mundo. Disfruta de atardeceres espectaculares y mariscos frescos frente al mar.</p>', 'coxs04.jpg', 'coxs bazar business Business Couple couple BUSINESS COUPLE tour sea beach', '2026-06-13', '2026-06-23'),
	(10, 1, 1, 'Suiza: Sueño en los Alpes', 7000, '<p>Paisajes de tarjeta postal. Lagos azules, montañas verdes y ciudades encantadoras te esperan en el corazón de Europa.</p>', 'swiss.jpg', 'swiss switzerland Switzerland Europe Business Single business single europe', '2026-08-04', '2026-08-07'),
	(11, 3, 2, 'Jaflong: Joya de la Frontera', 3000, '<p>Conocida como la hija de la naturaleza. Disfruta de las vistas panorámicas de las colinas indias y el río Dawki.</p>', 'jaflong.jpg', 'jaflong Jaflong JAFLONG regular Regular REGULAR FAMILY family Family sylhet Sylhet SYLHET', '2026-08-17', '2026-08-22'),
	(12, 1, 1, 'Darjeeling: Reina de las Colinas', 2100, '<p>Despierta con el aroma del mejor té del mundo y vistas al Kanchenjunga. Un retiro colonial lleno de encanto y paz.</p>', 'darjeeling.JPG', 'darjeeling Darjeeling DARJEELING india India INDIA business BUSINESS Business Single single SINGLE tour', '2026-05-07', '2026-05-11'),
	(13, 2, 1, 'Tanguar Haor: Espejo de Agua', 1000, '<p>Navega por este ecosistema único. Un santuario de biodiversidad perfecto para observar aves y vivir la vida local sobre el agua.</p>', 'tanguar.jpg', 'tanguar haor economy Economy ECONOMY SINGLE single Single Tanguar Haor', '2026-08-19', '2026-08-29'),
	(14, 3, 3, 'Rajastán Real: Tierra de Reyes', 9000, '<p>Vive un cuento de hadas entre palacios, fuertes y desiertos. Una explosión de color, historia y tradiciones reales.</p>', 'rajasthan.jpg', 'rajasthan Rajasthan RAJASTHAN regular Regular REGULAR couple Couple Couple India india INDIA', '2026-05-02', '2026-05-06'),
	(15, 1, 4, 'Aventura Grupal: Senderismo en los Alpes', 3500, '<p>Únete a un grupo de entusiastas del aire libre para una semana de senderismo espectacular en los Alpes. Incluye guías expertos y alojamiento en refugios de montaña.</p>', 'alps_group.jpeg', 'alpes senderismo montaña europa naturaleza grupo hiking', '2026-06-15', '2026-06-22'),
	(16, 2, 4, 'Tour Gastronómico por Tailandia en Grupo', 2800, '<p>Descubre los sabores de Tailandia en un viaje grupal enfocado en la comida callejera, clases de cocina y visitas a mercados locales.</p>', 'thai_food_group.jpg', 'tailandia asia comida gastronomia tour culinario grupo', '2026-07-10', '2026-07-18'),
	(17, 3, 5, 'Retiro de Silencio y Meditación en Japón', 4200, '<p>Un viaje individual diseñado para la introspección y la paz interior. Alojamiento en un templo zen con sesiones diarias de meditación.</p>', 'japan_solo_retreat.jpg', 'japon asia zen meditacion templo cultura solo retiro', '2026-09-01', '2026-09-08'),
	(18, 1, 5, 'Exploración Solitaria de las Auroras Boreales en Noruega', 3900, '<p>Viaja al norte de Noruega por tu cuenta para presenciar el mágico espectáculo de las auroras boreales. Incluye traslados y excursiones nocturnas.</p>', 'norway_aurora_solo.jpg', 'noruega europa auroras boreales nieve invierno solo artico', '2026-11-05', '2026-11-10'),
	(19, 2, 4, 'Crucero por las Islas Griegas para Jóvenes', 2200, '<p>Un crucero vibrante y divertido para grupos jóvenes, visitando Mykonos, Santorini y otras islas con fiestas a bordo y actividades en tierra.</p>', 'greek_cruise_group.jpg', 'grecia islas mediterraneo crucero mar verano grupo historia', '2026-08-01', '2026-08-08'),
	(20, 2, 4, 'Safari Fotográfico en Kenia', 4500, '<p>Una experiencia grupal inolvidable recorriendo el Masái Mara en busca de los "Cinco Grandes". Alojamiento en lodges ecológicos.</p>', 'kenya_safari_group.jpg', 'kenia africa safari animales naturaleza aventura grupo leones', '2026-09-10', '2026-09-18'),
	(21, 1, 5, 'Mochilero en Perú: Camino Inca', 3200, '<p>Desafíate a ti mismo con una ruta de senderismo en solitario hacia Machu Picchu, con guías locales y porteadores de apoyo.</p>', 'peru_solo_hike.jpg', 'peru sudamerica machu picchu inca senderismo historia solo andes', '2026-05-12', '2026-05-20'),
	(22, 3, 4, 'Roadtrip por la Ruta 66 en Estados Unidos', 4100, '<p>Únete a una caravana de viajeros para cruzar Estados Unidos en moto o coche convertible, descubriendo la historia de la mítica carretera madre.</p>', 'usa_route66_group.jpg', 'usa estados unidos ruta 66 carretera viaje coche grupo clasico', '2026-10-01', '2026-10-15'),
	(23, 1, 5, 'Escapada de Arte y Vino en la Toscana', 2600, '<p>Disfruta de tu propia compañía paseando por viñedos italianos, con clases de pintura y degustaciones de vino privadas.</p>', 'tuscany_solo_art.jpg', 'italia toscana europa vino arte cultura gastronomia solo', '2026-04-20', '2026-04-27'),
	(24, 2, 4, 'Expedición a Islandia: Tierras Altas', 3800, '<p>Aventura extrema en grupo 4x4 cruzando ríos y glaciares en las tierras altas de Islandia. Ideal para amantes de la naturaleza salvaje.</p>', 'iceland_adventure_group.jpg', 'islandia europa volcanes hielo naturaleza aventura grupo termal', '2026-11-15', '2026-11-22');

-- Volcando estructura para tabla agenciadeviajes.types
CREATE TABLE IF NOT EXISTS `types` (
  `type_id` int(100) NOT NULL AUTO_INCREMENT,
  `type_title` text NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla agenciadeviajes.types: ~5 rows (aproximadamente)
INSERT INTO `types` (`type_id`, `type_title`) VALUES
	(1, 'Destacados'),
	(2, 'Familiar'),
	(3, 'Pareja'),
	(4, 'Solitario'),
	(5, 'Grupo');

-- Volcando estructura para tabla agenciadeviajes.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `role` enum('admin','client') DEFAULT 'client',
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla agenciadeviajes.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `first_name`, `last_name`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'usuario', '$2y$10$tJZdZrL/MUnhaAQVkkfi3eBVk84zAzbRFkCkjqMaHhUH6pygLrd.y', 'usuario@gmail.com', 'usuario', 'prueba', 'client', 1, '2026-04-20 14:11:58', '2026-04-20 14:11:58'),
	(2, 'admin', '$2y$10$33S.T0qfceYdFEv19530h.JjXIr70Fh2F/Ppb2LPwuJ0GSsstisYG', 'admin@gmail.com', 'admin', 'prueba', 'admin', 1, '2026-04-20 14:13:15', '2026-04-20 14:14:11');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
