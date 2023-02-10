-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2023 a las 10:17:32
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_juegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `usuario` bigint(20) UNSIGNED NOT NULL,
  `juego` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `texto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`usuario`, `juego`, `fecha`, `texto`) VALUES
(2, 16, '2022-12-16', 'Assassin\'s Creed es una burda copia de este juego. Está guay, pero de nuevo, faltan cinemáticas. Amateurs.'),
(2, 17, '2022-10-20', 'Kojima San aprueba este juego de vídeo. Buen gameplay, buena música, buenos personajes. Echo en falta cinemáticas de 17 horas, pero no todos podéis ser perfectos como yo.'),
(3, 3, '2023-02-01', 'Si lo sacan en pc de una puta vez, le mamo la polla a todos los desarrolladore de sony sin falta.'),
(3, 4, '2023-02-01', 'Vaya hostias mete la tía esta con la lanza esa to guapa. Mu guapo el juego. Mu guapoooo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `plataforma` bigint(20) UNSIGNED NOT NULL,
  `caratula` varchar(100) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`, `descripcion`, `plataforma`, `caratula`, `fecha_lanzamiento`, `activo`) VALUES
(1, 'Hogwarts Legacy', 'Juegarro de magias y movidas explosivas. Y además puedes volar, ¿qué le gusta más a un crío que poder volar, aparte de un baptisterio romano del siglo primero? Qué locura.', 1, '../media/img_juegos/hogwarts.jpg', '2023-02-10', 1),
(2, 'Breath of the Wild', 'Un man qua va corriendo pa tos laos haciendo movidas con mucho copyright.', 2, '../media/img_juegos/breath.jpg', '2023-01-04', 1),
(3, 'God of War: Ragnarok', 'Un colega to fuerte que va con su crío buscando un sitio donde clavar la sombrilla, y como no encuentra ningún sitio libre se cabrea que flipas y empieza a repartir hostias a todo el que ve.', 1, '../media/img_juegos/ragnarok.jpg', '2022-12-16', 1),
(4, 'Horizon: Forbidden West', 'Una muchacha con una lanza y muchos circuitos y movidas va peleándose con dinosaurios de latón porque se ha pasado con las setas.', 1, '../media/img_juegos/horizon.jpg', '2022-09-14', 1),
(5, 'SpiderMan: Miles Morales', 'El colega de los saltos ahora es latino. Que a mí me parece genial, pero los fachas no veas, van a convulsionar.', 1, '../media/img_juegos/spiderman.jpg', '2022-12-14', 1),
(6, 'Pokemon Arceus', 'Estos hijos de puta de Nintendo hacen los juegos con los ojos cerrados pero les da absolutamente igual porque saben que to dios lo va a comprar. ', 2, '../media/img_juegos/pokemon.jpg', '2022-07-13', 1),
(7, 'Luigi\'s Mansion 3', 'El hermano de mario, el otro italiano, el rarito, se mete en una casa con fantasmas y se muere de un infarto.', 2, '../media/img_juegos/luigi.jpg', '2022-03-16', 1),
(8, 'Kirby y la tierra olvidada', 'Nuestro colega Kirby sigue drogándose sin ningún tipo de control ni parpadeo, esas pupilas están cada vez más dilatadas. Su adicción lo ha llevado a una zona inhóspita y desconocida: Almanjáyar. ', 2, '../media/img_juegos/kirby.jpg', '2022-02-09', 1),
(9, 'Halo Infinite', 'Pues no sé de qué va esto, un pavo con armadura que va pegando tiros supongo y en el espacio, rodeado de una espectacular movida giratoria.', 3, '../media/img_juegos/halo.jpg', '2022-05-17', 1),
(10, 'The Medium', 'Un juego de susticos que fue criticado. Fantasmas que no dan miedo vaya, lo que te encuentras todos los días cuando vas a clase o al trabajo.', 3, '../media/img_juegos/medium.jpg', '2021-02-10', 1),
(11, 'Forza Horizon 5', 'Coches que van completamente follados sin ningún tipo de ley ni orden. Como meterte en Salobreña a conducir.', 3, '../media/img_juegos/forza.jpg', '2021-04-09', 1),
(12, 'FarCry 6', 'Ahora Gus Fring es un dictador latinoamericano. Para nuestra desgracia, ya no tiene Los Pollos Hermanos, ahora sólo dispone de paramilitares que hacen lo que les ordena. Igual que antes.', 3, '../media/img_juegos/farcry.jpg', '2021-09-16', 1),
(13, 'Beyond Good and Evil', 'Menudo juegardo por dios. De lo mejor que hubo en la play 2. Ya no se hacen juegos así.', 4, '../media/img_juegos/beyond.jpg', '2019-09-11', 1),
(14, 'Destroy All Humans', 'Básicamente eres un alien que va reventando yankis, arrancándoles el cerebro y nutriéndote de sus conocimientos. En esencia lo mismo que hacen los propios yankis con el resto del mundo, o Inglaterra y el British Museum con cualquier obra que no es suya.', 4, '../media/img_juegos/destroy.jpg', '2018-02-16', 1),
(15, 'Grand Theft Auto: San Andreas', 'Vaya juegazo con gráficos sangrantes y una jugabilidad que daban ganas de arrancarse las manos. Toreando a todo el ejército yanki subido en una bici mientras vas vestido con los vaqueros de tu tío Rodolfo y una camiseta de tirantes blanca llena de lamparones. Historia de los videojuegos.', 4, '../media/img_juegos/gta.jpg', '2018-05-11', 1),
(16, 'Prince of Persia: Sands of Time', 'Otro juegardo. Vaya época fue la PS2. Este men podía retroceder el tiempo y además hacía parkour, una especie de Ezio Auditore hipertrofiado. Espectacular.', 4, '../media/img_juegos/persia.jpg', '2017-02-16', 1),
(17, 'The Last Of Us: Part I', 'EL JUEGO.', 1, '../media/img_juegos/tlou.jpg', '2021-02-17', 1),
(18, 'Hogwarts Legacy', 'Juegarro de magias y movidas explosivas. Y además puedes volar, ¿qué le gusta más a un crío que poder volar, aparte de un baptisterio romano del siglo primero? Qué locura.', 3, '../media/img_juegos/hogwarts.jpg', '2022-06-15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `logotipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`id`, `nombre`, `activo`, `logotipo`) VALUES
(1, 'PlayStation 5', 1, '../media/img_plataformas/ps5.png'),
(2, 'Nintendo Switch', 1, '../media/img_plataformas/switch.png'),
(3, 'Xbox Series X', 1, '../media/img_plataformas/xbox.png'),
(4, 'PlayStation 2', 1, '../media/img_plataformas/ps2.png'),
(5, 'Steam', 1, '../media/img_plataformas/steam.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `nick`, `pass`, `activo`) VALUES
(0, 'Administrador', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 0),
(2, 'Hideo Kojima', 'kojisan', 'f2671bcea2e7e2d90dcb2f0ab5ea549b', 0),
(3, 'Gamer TM', 'geimer', 'f1187e160d3dd9721f2e21a1cf4064db', 1),
(4, 'Neil Druckmann', 'neild', '1d0b794ff83d2d4dbe35214394145b9e', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`usuario`,`juego`),
  ADD KEY `ce_com_jue` (`juego`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `ce_jue_plat` (`plataforma`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `ce_com_jue` FOREIGN KEY (`juego`) REFERENCES `juegos` (`id`),
  ADD CONSTRAINT `ce_com_usu` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `ce_jue_plat` FOREIGN KEY (`plataforma`) REFERENCES `plataformas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
