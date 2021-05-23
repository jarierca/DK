-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2021 a las 22:03:08
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `digitalkeys`
--
CREATE DATABASE IF NOT EXISTS `digitalkeys` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `digitalkeys`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido1` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido2` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nick`, `password`, `nombre`, `apellido1`, `apellido2`, `mail`, `telefono`) VALUES
(1, 'LkQtmC8NNm7XuHtG+qmNbg==', '$2y$10$i1g3RnHwENe757ukFZoJZOpY0F63mOhHWcLmb2VNXVgcIt0QRUzJO', 'Kkw/Z5BufwSPBDEHeuFBGA==', 'QyIWyN9BM1n4fmldlrpZBg==', '/3n1F9xfS2b66tO/xVNTew==', 'ulrS1URn1XOupONa9Cs9MToMGazBnmuzUcCT59/6fGc=', '7r6JwwlygZWRr7O73EF77A==');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `idproducto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `idusuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(5000) COLLATE utf8_spanish2_ci NOT NULL,
  `genero` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `plataforma` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `plataformaPublicacion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `idvendedor` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `genero`, `tipo`, `plataforma`, `plataformaPublicacion`, `precio`, `foto`, `stock`, `idvendedor`) VALUES
(7, 'Cyberpunk2077 Steam', 'Cyberpunk 2077 para PC es un shooter en primera persona, pero uno distinto al resto. Ambientado en un estado libre distópico de California, las reglas de la nación y del estado ya no son aplicadas. En cambio, jugando como un mercenario llamado V, el jugador debe abrirse paso por la ciudad, alcanzando sus objetivos y luchando contra enemigos a medida que avanza.Acerca del JuegoCon un tiempo de desarrollo de 7 años, Cyberpunk 2077 parece estar a la altura de todo el revuelo generado durante su presentación en el E3 de 2019.Ambientado cincuenta y siete años después del juego de mesa en el que está basado, Cyberpunk 2020, los gráficos están exquisitamente renderizados, con personajes, escenarios e incluso acciones tan realistas que pueden ser confundidas con secuencias de películas.A medida que avanzas a través de la narrativa del juego, es posible jugar sin matar a ningún otro personaje, utilizando armas y estrategia no letales que te mantienen alejado de confrontaciones series que del tipo que tienen a ser letales.El juego incluye desnudos completos, ya que los jugadores pueden mejorar sus cuerpos con modificaciones que les otorgan poderes y capacidades adicionales, así que necesitan desnudarse para poder ajustarse sus nuevas extremidades y aditamentos.Nuevos detallesUno de los puntos de venta exclusivos de este juego es la aparición destacada de Keanu Reeves. Él interpreta a un personaje llamado Johnny Silverhand, que es el cantante principal de una banda de nombre Samurai, cuyas canciones contienen letras relevantes para el estado anímico y la vida de V.Silverhand, un personaje original del juego de mesa, está muerto en esta ocasión, pero ‘vive’ en la mente de V. Esto significa que es el personaje que cuenta con más líneas de diálogo, exceptuando a V, que es el protagonista.La aparición de Reeves fue una sorpresa que se reveló con la publicación del tercer tráiler, y dio la fecha oficial de lanzamiento a los entusiasmados fanáticos, deseosos de probar lo último que CD PROKECKT RED tiene para ofrecer, estudio conocido por brindarnos la amada franquicia de The Witcher.', 'RPGE', 'PC GAMES', 'PC', 'Steam', '69.9', '/DigitalKeys/uploads/cyberpunk-2077.jpg', '12', 'InfoKeys'),
(15, 'Grand Theft Auto V: Premium Online  Edition', 'Grand Theft Auto V: Premium Online Edition incluye:  - la experiencia completa de la historia de Grand Theft Auto V, el mundo en constante evolución de Grand Theft Auto Online, todas las mejoras jugables y de contenido hasta la fecha como Golpe del Juicio Final, Tráfico de armas, Smuggler\'s Run, Moteros y mucho más.  También incluye el Criminal Enterprise Starter Pack, la forma más rápida de impulsar los imperios criminales para los nuevos jugadores de GTA Online con el contenido más emocionante y popular, además de un bonus de 1 000 000$ para gastar en GTA Online. Valorado en más de 10 000 000 de GTA$.  Grand Theft Auto V: Premium Online Edition para PC fue lanzado junto a la versión del juego para un solo jugador. La apuesta era ambiciosa, y en un principio el juego fue blanco de muchas quejas por problemas de jugabilidad, pérdida de datos y otros tantos desperfectos. Sin embargo, los desarrolladores pusieron manos a la obra y pronto lanzaron actualizaciones y parches que solucionaron estos problemas, además de ofrecer un mayor número de misiones y modos de juego.  Acerca del Juego  En la versión para un solo jugador del juego [Insertar enlace a Grand Theft Auto V para PC], las acciones de los personajes están atados a una narrativa lineal que prácticamente debe ser completada de principio a fin de manera directa. Este no es el caso de la versión en línea, que ofrece más libertad – lo que a veces puede traducirse en mayor complejidad – para explorar y elegir las misiones que se deseen completar, en lugar de tener que ir completando todos los escenarios casi por casilla.  Los escenarios en los que se desarrolla el juego en línea son los mismos de la versión para un solo jugador, las ciudades ficticias de San Andreas y Los Santos, ubicadas en el condado de Blaine, las cuales cuentan con un mundo completamente funcional y actividades para probar por montones, así como edificios y calles que puedes explorar en todo momento.  La versión en línea del juego permite que hasta 30 jugadores jueguen de forma cooperativa o competitiva, luchando juntos en contra de otros enemigos, o entre sí, para conseguir una supremacía a corto plazo. Puedes unirte a equipos integrados por desconocidos, o unirte a tus amigos formando tu propio equipo cerrado.  Sin problemas de Lag  Con tanta gente accediendo a los servidores a la vez, uno podría esperar algún tipo de lag o retraso mientras todos se conectan y preparan para jugar. Lo cierto es que el inicio de sesión es de lo más rápido y sencillo, y los retrasos parecen ser poco frecuentes, lo que supone una agradable sorpresa, teniendo en cuenta la cantidad de datos en bruto que transmite un solo jugador, ¡ya no digamos los de treinta! Por supuesto, debes contar con banda ancha de alta velocidad y un ordenador para gaming de calidad relativamente buena para obtener la mejor experiencia de este juego.  Al iniciar sesión por primera vez, el personaje del jugador es recogido en el aeropuerto y recibe un vehículo y un arma. Después te espera un tutorial de una hora de duración que te dará muchos consejos útiles acerca de cómo explorar el mundo, unirte a partidas cooperativas o en equipo y, en general, de cómo sacar el máximo provecho de la experiencia del juego.', 'Acción,Aventura, Mundo abierto', 'PC GAMES', 'PC', 'Rockstar', '9.89', '/DigitalKeys/uploads/gta5premiumbase2.jpg', '22', 'infoKeys'),
(16, 'Nioh 2: The Complete Edition PS4', 'UNLEASH YOUR DARKNESS  Vive la emoción de enfrentarte a hordas de temibles yokai en este brutal RPG de acción masocore. Crea a tu protagonista original y emprende una aventura a través de devastados paisajes del Japón del período de Sengoku.  Al igual que la anterior entrega, que gozó de gran popularidad entre críticos y jugadores por igual, Nioh 2 ofrece una historia original profunda centrada en los comandantes militares del período de Sengoku. Además, en Nioh 2 puedes ir más allá del anterior juego y desatar el nuevo poder de Forma Yokai, con el que te transformarás para hacer frente al poder de los mayores yokai. Otra novedad de Nioh 2 es que tus enemigos pueden crear un Reino Oscuro, lo que eleva las apuestas y ofrece un nuevo reto para tu personaje. Enfréntate a temibles monstruos y desata tu oscuridad en el mundo de Nioh 2.Nioh 2: Complete Edition incluye todo el contenido de Nioh 2 y sus 3 expansiones de DLC, The Tengu’s Disciple, Darkness in the Capital, and The First Samurai.', 'JRPG, Accion', 'PS GAMES', 'PSN', 'PS4', '39.99', '/DigitalKeys/uploads/nioh-2-the-complete-edition-ps4.jpg', '10', 'infoKeys'),
(17, 'EURO TRUCK SIMULATOR 2 - GOING EAST DLC PC', 'El complemento Going East! amplía el mapa original del Euro Truck Simulator 2 con nuevos destinos para la entrega de carga en Polonia, República Checa, Eslovaquia y Hungría.', 'Simulacion', 'PC DLCS', 'PC', 'Steam', '4,69', '/DigitalKeys/uploads/ets2-ge_1_.jpg', '20', 'infoKeys'),
(18, 'PLAYSTATION PLUS: SUSCRIPCIÓN DE 12 MESES', 'Una suscripción a PlayStation Plus te ofrece juegos multijugador en línea ultrarrápidos. Con una suscripción a PlayStation Plus, obtendrá juegos gratis para descargar todos los meses, incluidos algunos de los títulos más populares. Almacenamiento seguro en la nube: libere espacio en el disco duro y lleve sus juegos mientras viaja con PlayStation Plus. Los miembros de PlayStation Plus obtienen acceso a ofertas y descuentos exclusivos todos los meses.', 'Online', 'PS PLUS', 'PSN', 'PSN', '46,99', '/DigitalKeys/uploads/12-month-playstation-plus-subscription.jpg', '25', 'infoKeys'),
(19, 'SUSCRIPCIÓN DE 12 MESES A PLAYSTATION NOW', 'Tanto si quieres ir a una aventura épica, mostrar tus habilidades en línea o jugar con tu familia y amigos, PS Now te tiene cubierto. Sumérgete en algunas de las historias y aventuras más emblemáticas de los juegos; explora vastos mundos abiertos, planea atrevidos atracos, lucha contra poderosos guerreros y alza el vuelo entre las estrellas. También te ofrecemos algunos de los mejores juegos por tiempo limitado, para que tengas la oportunidad de jugar a más títulos de PlayStation® de gran demanda. Juega como algunos de los héroes exclusivos de PlayStation® que han definido a PlayStation®, desde poderosos dioses e intrépidos buscadores de fortuna, hasta cazadores empedernidos y supervivientes desesperados. Encuentra una nueva aventura para los niños, reúne a la familia para la noche de juegos en una amplia variedad de juegos adecuados para jugadores de todas las edades.', 'Online', 'PS NOW', 'PSN', 'PS4', '45,99', '/DigitalKeys/uploads/playstation_now_12_month_subscription-spain.jpg', '10', 'infoKeys'),
(20, 'GEARS OF WAR: ULTIMATE EDITION XBOX ONE', 'El shooter que definió la primera generación de juegos en HD ha sido remasterizado minuciosamente en 1080P y modernizado para Xbox One, y está repleto de nuevos contenidos, incluyendo cinco capítulos de la campaña que nunca se publicaron en Xbox. La historia de \"Gears of War\" empuja a los jugadores a una profunda y angustiosa batalla por la supervivencia contra la Horda de las Langostas, una raza de criaturas de pesadilla que emerge de las profundidades del planeta. Los jugadores viven y respiran el papel de Marcus Fenix. Antiguo héroe de guerra deshonrado, Marcus busca la redención personal mientras lidera su equipo de fuego contra un ataque de guerreros despiadados desde abajo. Profundiza en la ficción de Gears con cinco cómics de Gears of War, que pueden ser desbloqueados y leídos dentro del juego.', 'Accion', 'XBOX GAMES', 'XBOX', 'XBOXOne', '3,49', '/DigitalKeys/uploads/gears_of_war_ultimate_edition_xbox_one.png', '8', 'infoKeys'),
(21, 'Xbox Live Gold 12 Meses', 'Con la tarjeta de abono prepago para Xbox 360 y Xbox One, conviértase en miembro privilegiado del Xbox Live Gold. Aproveche 3 fórmulas de duración para conectarse a su ritmo y según su presupuesto: La tarjeta prepago 1 mes de abono al Xbox live gold, el código prepago 3 meses deabono al Xbox live gold y la tarjeta prepago 12 meses deabono al Xbox live gold. Esta tarjeta prepago le permite poder aprovechar el Xbox Live Gold con gran rapidez y total seguridad.', 'Online', 'XBOX LIVE', 'XBOX', 'XBOX X/S', '44.99', '/DigitalKeys/uploads/xboxlive12es.jpg', '35', 'infoKeys'),
(22, 'ANIMAL CROSSING: NEW HORIZONS', 'Animal Crossing: New Horizons para Nintendo Switch es un juego de simulación que es principalmente para un jugador con algunos elementos multijugador y es la quinta entrega del juego que presenta la cara familiar y querida de Tom Nook, esta vez en una isla desierta. Al igual que con los otros juegos de Animal Crossing, construirás tu hogar, conocerás y ayudarás a tus vecinos y amigos animales y juntos construiréis una comunidad.', 'Simulacion', 'NINTENDO GAMES', 'NINTENDO', 'NINTENDO SWITCH', '44,79', '/DigitalKeys/uploads/animal-crossing-new-horizons-.jpg', '21', 'infoKeys'),
(23, 'Suscripción Nintendo 12 Meses (Individual)', 'Nintendo Entertainment System – Nintendo Switch Online  ¡Disfruta de un catálogo de juegos clásicos de NES que se irá ampliando en el futuro! No solo podrás jugar cuando y donde quieras: ¡también hemos añadido funciones en línea y otras mejoras como resolución en HD, filtros y opciones de guardado especiales!  Guardado de datos en la nube  Guarda una copia de tus datos de juego de manera automática y segura en línea, a la que podrás acceder fácilmente. Así te resultará más sencillo recuperar tus datos de juego si pierdes tu consola Nintendo Switch o decides utilizar otra distinta.  Aplicación para móviles  Utiliza la aplicación para móviles Nintendo Switch Online para disfrutar del chat de voz y acceder a funciones especiales en títulos de Nintendo Switch compatibles.  Ofertas exclusivas para suscriptores  Disfruta de una amplia variedad de ofertas, como, por ejemplo, productos solo disponibles para los suscriptores del servicio Nintendo Switch Online.', 'Online', 'NINTENDO ONLINE', 'NINTENDO', 'NINTENDO SWITCH', '17,69', '/DigitalKeys/uploads/nintendo_switch_online_12_month_365_day_membership_switch.jpg', '14', 'infoKeys'),
(24, 'Microsoft Windows 10 Pro OEM', 'Windows 10 es un sistema operativo de computadora personal desarrollado y lanzado por Microsoft como parte de la familia de sistemas operativos Windows NT. Fue lanzado el 29 de julio de 2015 y es la primera versión de Windows que recibe actualizaciones continuas de funciones.     Windows 10 está diseñado para ser compatible con el hardware, el software y los periféricos que ya posee. Y las actualizaciones siempre habilitadas lo ayudan a mantenerse actualizado sobre las funciones y la seguridad durante la vida útil admitida de su dispositivo. Windows 10 le brinda la mejor experiencia para hacer lo que hace. Manténgase enfocado con formas fáciles de colocar aplicaciones en su lugar y optimizar el espacio de su pantalla para hacer las cosas. Vea sus tareas abiertas en una sola vista y cree escritorios virtuales para ganar espacio o agrupe cosas por proyecto, como aplicaciones de Office para trabajar y juegos para jugar. ahora puedes jugar y conectarte con jugadores en dispositivos Xbox One y Windows 10. Desde los mejores juegos casuales hasta una nueva generación de juegos de PC, Windows 10 está diseñado para los juegos que te encantan.', 'Clave', 'CLAVES WINDOWS', 'WINDOWS', 'WINDOWS10', '16.11', '/DigitalKeys/uploads/w10_key_pro_oem.jpg', '26', 'infoKeys'),
(25, 'MICROSOFT OFFICE 365', 'Office 365 Personal tiene la última versión de las aplicaciones que conoces y amas, además de servicios en la nube para que puedas tener Office cuando y donde lo necesites. Sólo tienes que iniciar sesión y podrás acceder a tus archivos, aplicaciones y configuraciones de Office desde cualquier lugar. Las últimas versiones de todas nuestras mejores aplicaciones, además de servicios en la nube, como Skype y OneDrive en 1 PC o Mac, y 1 tableta de Windows o iPad. Además, instale fácilmente Office Mobile en varios teléfonos inteligentes, incluidos los iPhones y los teléfonos Android (Office Mobile ya está instalado en los teléfonos con Windows).', 'Ofimatica', 'OFFICE', 'WINDOWS', 'WINDOWS10', '50,09', '/DigitalKeys/uploads/office-365.jpg', '45', 'infoKeys'),
(26, 'Adobe Creative Cloud (PC) 1 Mes- Adobe', 'Adobe Creative Cloud es un conjunto de aplicaciones y servicios de Adobe Inc. que brinda a los suscriptores acceso a una colección de software utilizado para diseño gráfico, edición de video, desarrollo web, fotografía, junto con un conjunto de aplicaciones móviles y también algunos servicios en la nube opcionales. En Creative Cloud, se ofrece un servicio de suscripción mensual o anual a través de Internet.', 'Licencia', 'LICENCIAS', 'WINDOWS', 'WINDOWS10', '29.54', '/DigitalKeys/uploads/adobe-creative-cloud-1-mes.png', '5', 'infoKeys');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido1` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido2` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `whitelist` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nick`, `password`, `nombre`, `apellido1`, `apellido2`, `telefono`, `mail`, `whitelist`, `codigo`) VALUES
(32, 'LkQtmC8NNm7XuHtG+qmNbg==', '$2y$10$i1g3RnHwENe757ukFZoJZOpY0F63mOhHWcLmb2VNXVgcIt0QRUzJO', 'Kkw/Z5BufwSPBDEHeuFBGA==', 'QyIWyN9BM1n4fmldlrpZBg==', '/3n1F9xfS2b66tO/xVNTew==', '7r6JwwlygZWRr7O73EF77A==', 'ulrS1URn1XOupONa9Cs9MToMGazBnmuzUcCT59/6fGc=', 0, '6314'),
(33, 'lXCN4rMoDUfuOILLynwYdQ==', '$2y$10$FAnoPLFisvZBQTIZ/KyJv.vQZarM5UVTa38rjcVwpaYETuGzbhGYi', 'lXCN4rMoDUfuOILLynwYdQ==', 'lXCN4rMoDUfuOILLynwYdQ==', 'qMnSIRFdCHfqbuTZqEypHg==', 'osCBemWpmXJ13nvEVmU6NQ==', 'mMdQjoF5zCGX9mqmgrH9bkZc39s+xvfbFH9ZBcuPBvM=', 0, ''),
(34, '0Nx8y2yA2HT0jfn24aO8FA==', '$2y$10$Cee7HJpvjpuet9/ZHgnBh.X/HWA6ivbU36dWJxNS3gByWWmQo3mha', '0Nx8y2yA2HT0jfn24aO8FA==', '1xgEeEPqWsAq7LUv5fTasQ==', 'ZUcYDHBfOAEQu5rIQCEc7w==', '2+oRTWLv9aLeN8WJYbVlIw==', 'RGEbND8x4Va7/CYziM/diPlQ5Z8yE2czPdZD5YhETFo=', 0, ''),
(39, 'hraTzEAL7/nn70ZVqawO+A==', '$2y$10$rSQw6Zx7SIduZuiYn2mHbOj0t0A5VyfEWAOduOwHeaKIWlM8sBUXC', 'hraTzEAL7/nn70ZVqawO+A==', '8FHypBYKtxwetgb3ejf9ag==', 'lGa65MymI6JeznHhVykDVg==', 'ChUrWFToYzripzVo6IseMw==', 'nru3MpPCnyIr/INLVRupfObTOLHF7KlIDB19086nCtvp4IUAO1dKrgU5oCXQL7wJ', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `id` int(11) NOT NULL,
  `idproducto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nota` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `ventas` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `ganancias` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `valoraciones` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`id`, `nombre`, `password`, `mail`, `telefono`, `ventas`, `ganancias`, `valoraciones`) VALUES
(2, 'Oi0QsWcRT2vNZs6tuZW0WQ==', '$2y$10$Fx6J4PYs711r1irZ8yN4ZOSXGUmDApwxFMV6gBRaikerXb/JVRqHC', 'fkjT7ZcJwKGC+P1jGJzNtQ==', 'ppzXbnhysQo7S/YTIEL6YA==', 'DnT/M7CCAKtJuW0L82FXqA==', 'Fs7nFTWCedtI9mwC52athA==', 'Flv6CGPqinu5Ato8UqvZjQ=='),
(3, 'uL1REv5O0ksLp7fSELXgdw==', 'mDLmgKVIyragsz3fpI0Yig==', 'xaovAZGIuzomXi9dAQCm1A==', 'hvP19qQueQb2Djo2ikzDkQ==', 'lutcHlmIg0rIWs4/olPm4Q==', '0eeJCHciGMTcpwPtX0ypHw==', 'Q1X6d7vCrlzsnD7rgqtbVg=='),
(4, 'rv56N5csN8Ey2qGw01STPg==', 'osCBemWpmXJ13nvEVmU6NQ==', 'NAULISP03yInedZCnNtf8w==', 'FuauxquPHD4/7g35OvPL/w==', 'QgQlvWQuH0y1OGvH3as8OQ==', '0eeJCHciGMTcpwPtX0ypHw==', 'DWj7rfJ5Ql40NWXmVPjugg=='),
(5, '4RKcw9NR5QSzEU6vXNSK8w==', 'osCBemWpmXJ13nvEVmU6NQ==', 'NAULISP03yInedZCnNtf8w==', 'FuauxquPHD4/7g35OvPL/w==', 'QgQlvWQuH0y1OGvH3as8OQ==', '0eeJCHciGMTcpwPtX0ypHw==', 'DWj7rfJ5Ql40NWXmVPjugg==');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
