-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2024 a las 01:15:22
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokemones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `usuario`, `pass`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`id`, `imagen`, `tipo`, `numero`, `descripcion`) VALUES
(1, 'Bulbasaur', 'Planta', '#001', 'Bulbasaur es un Pokémon de tipo Planta. Es un pequeño Pokémon de color verde claro con una planta en su espalda.'),
(2, 'Ivysaur', 'Planta', '#002', 'Ivysaur es un Pokémon de tipo Planta. Es la evolución de Bulbasaur. Tiene una flor en su espalda que está en proceso de florecimiento.'),
(3, 'Venusaur', 'Planta', '#003', 'Venusaur es un Pokémon de tipo Planta. Es la evolución final de Bulbasaur. Tiene una gran flor en su espalda que ha florecido completamente.'),
(4, 'Charmander', 'Fuego', '#004', 'Charmander es un Pokémon de tipo Fuego. Tiene una llama en la punta de su cola y es de color naranja.'),
(5, 'Charmeleon', 'Fuego', '#005', 'Charmeleon es un Pokémon de tipo Fuego. Es la evolución de Charmander. Tiene una llama más grande en la punta de su cola y es de color rojo oscuro.'),
(6, 'Charizard', 'Fuego', '#006', 'Charizard es un Pokémon de tipo Fuego. Es la evolución final de Charmander. Es un poderoso dragón volador con alientos de fuego.'),
(7, 'Squirtle', 'Agua', '#007', 'Squirtle es un Pokémon de tipo Agua. Es de color azul y tiene una concha en su espalda.'),
(8, 'Wartortle', 'Agua', '#008', 'Wartortle es un Pokémon de tipo Agua. Es la evolución de Squirtle. Tiene una cola cubierta de piel y orejas largas.'),
(9, 'Blastoise', 'Agua', '#009', 'Blastoise es un Pokémon de tipo Agua. Es la evolución final de Squirtle. Tiene cañones de agua en su espalda.'),
(10, 'Caterpie', 'Bicho', '#010', 'Caterpie es un Pokémon de tipo Bicho. Es una pequeña oruga de color verde.'),
(11, 'Metapod', 'Bicho', '#011', 'Metapod es un Pokémon de tipo Bicho. Es la evolución de Caterpie. Tiene una dura capa protectora y no puede moverse mucho.'),
(12, 'Butterfree', 'Bicho', '#012', 'Butterfree es un Pokémon de tipo Bicho y Volador. Es la evolución final de Caterpie. Tiene grandes alas y puede lanzar polen para dormir a sus enemigos.'),
(13, 'Weedle', 'Bicho', '#013', 'Weedle es un Pokémon de tipo Bicho y Veneno. Tiene un aguijón venenoso en la parte superior de su cabeza.'),
(14, 'Kakuna', 'Bicho', '#014', 'Kakuna es un Pokémon de tipo Bicho y Veneno. Es la evolución de Weedle. Está envuelto en un capullo duro y apenas se mueve.'),
(15, 'Beedrill', 'Bicho', '#015', 'Beedrill es un Pokémon de tipo Bicho y Veneno. Es la evolución final de Weedle. Tiene aguijones venenosos y puede volar a gran velocidad.'),
(16, 'Pidgey', 'Normal', '#016', 'Pidgey es un Pokémon de tipo Normal y Volador. Es pequeño y tiene plumas marrones y blancas.'),
(17, 'Pidgeotto', 'Normal', '#017', 'Pidgeotto es un Pokémon de tipo Normal y Volador. Es la evolución de Pidgey. Tiene plumas más grandes y puede volar a grandes alturas.'),
(18, 'Pidgeot', 'Normal', '#018', 'Pidgeot es un Pokémon de tipo Normal y Volador. Es la evolución final de Pidgey. Tiene plumas majestuosas y es un excelente volador.'),
(19, 'Rattata', 'Normal', '#019', 'Rattata es un Pokémon de tipo Normal. Es pequeño y tiene bigotes largos.'),
(20, 'Raticate', 'Normal', '#020', 'Raticate es un Pokémon de tipo Normal. Es la evolución de Rattata. Tiene dientes afilados y es conocido por roer cosas.'),
(21, 'Spearow', 'Normal', '#021', 'Spearow es un Pokémon de tipo Normal y Volador. Es pequeño y tiene un pico largo y afilado.'),
(22, 'Fearow', 'Normal', '#022', 'Fearow es un Pokémon de tipo Normal y Volador. Es la evolución de Spearow. Tiene un pico grande y puede volar a grandes velocidades.'),
(23, 'Ekans', 'Veneno', '#023', 'Ekans es un Pokémon de tipo Veneno. Es una serpiente morada con ojos amarillos y puede inflar su cuerpo para asustar a los enemigos.'),
(24, 'Arbok', 'Veneno', '#024', 'Arbok es un Pokémon de tipo Veneno. Es la evolución de Ekans. Tiene una capucha que puede inflar para parecer más grande y peligroso.'),
(25, 'Pikachu', 'Eléctrico', '#025', 'Pikachu es un Pokémon de tipo Eléctrico. Es una pequeña criatura amarilla con mejillas rojas y una cola en forma de rayo.'),
(26, 'Raichu', 'Eléctrico', '#026', 'Raichu es un Pokémon de tipo Eléctrico. Es la evolución de Pikachu. Tiene orejas largas y puntiagudas y es capaz de generar grandes cantidades de electricidad.'),
(27, 'Sandshrew', 'Tierra', '#027', 'Sandshrew es un Pokémon de tipo Tierra. Tiene un cuerpo cubierto de púas y puede enrollarse en una bola para protegerse.'),
(28, 'Sandslash', 'Tierra', '#028', 'Sandslash es un Pokémon de tipo Tierra. Es la evolución de Sandshrew. Tiene púas más grandes y afiladas y es capaz de excavar rápidamente.'),
(29, 'Nidoran♀', 'Veneno', '#029', 'Nidoran♀ es un Pokémon de tipo Veneno. Es una criatura rosa con orejas puntiagudas y cuernos en su espalda.'),
(30, 'Nidorina', 'Veneno', '#030', 'Nidorina es un Pokémon de tipo Veneno. Es la evolución de Nidoran♀. Tiene una cola larga y es más grande que Nidoran♀.'),
(31, 'Nidoqueen', 'Veneno', '#031', 'Nidoqueen es un Pokémon de tipo Veneno y Tierra. Es la evolución final de Nidoran♀. Tiene una gran corona y es robusta y poderosa.'),
(32, 'Nidoran♂', 'Veneno', '#032', 'Nidoran♂ es un Pokémon de tipo Veneno. Es similar a Nidoran♀ pero de color azul y con cuernos más grandes.'),
(33, 'Nidorino', 'Veneno', '#033', 'Nidorino es un Pokémon de tipo Veneno. Es la evolución de Nidoran♂. Tiene una espalda con púas y es más fuerte que Nidoran♂.'),
(34, 'Nidoking', 'Veneno', '#034', 'Nidoking es un Pokémon de tipo Veneno y Tierra. Es la evolución final de Nidoran♂. Tiene una gran fuerza y ​​puede derribar edificios con su poder.'),
(35, 'Clefairy', 'Hada', '#035', 'Clefairy es un Pokémon de tipo Hada. Es pequeño y de color rosa con grandes orejas y una cola esponjosa.'),
(36, 'Clefable', 'Hada', '#036', 'Clefable es un Pokémon de tipo Hada. Es la evolución de Clefairy. Tiene alas y es capaz de volar.'),
(37, 'Vulpix', 'Fuego', '#037', 'Vulpix es un Pokémon de tipo Fuego. Es una criatura de color naranja con seis colas y ojos azules.'),
(38, 'Ninetales', 'Fuego', '#038', 'Ninetales es un Pokémon de tipo Fuego. Es la evolución de Vulpix. Tiene nueve colas y es conocido por su gracia y belleza.'),
(39, 'Jigglypuff', 'Normal', '#039', 'Jigglypuff es un Pokémon de tipo Normal. Es una bola rosa con grandes ojos y orejas.'),
(40, 'Wigglytuff', 'Normal', '#040', 'Wigglytuff es un Pokémon de tipo Normal y Hada. Es la evolución de Jigglypuff. Tiene una piel suave y puede cantar con una voz hipnótica.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
