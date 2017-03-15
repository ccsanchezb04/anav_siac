-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2015 a las 03:40:35
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_anav`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anav_administradores`
--

CREATE TABLE IF NOT EXISTS `anav_administradores` (
  `admin_id` int(11) NOT NULL COMMENT 'Id del Administrador(a)',
  `admin_telefono` int(11) NOT NULL COMMENT 'Telefono',
  `admin_direccion` varchar(100) NOT NULL COMMENT 'direccion de residencia',
  `admin_genero` varchar(1) NOT NULL COMMENT 'Genero',
  `admin_fnacimiento` date NOT NULL COMMENT 'Fecha de nacimiento',
  `admin_rh` varchar(3) NOT NULL COMMENT 'Grupo sanguineo',
  `admin_idestado` int(11) NOT NULL COMMENT 'Estado ',
  `admin_idusua` int(11) NOT NULL COMMENT 'Este  es el id del usario que le corresponde'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anav_administradores`
--

INSERT INTO `anav_administradores` (`admin_id`, `admin_telefono`, `admin_direccion`, `admin_genero`, `admin_fnacimiento`, `admin_rh`, `admin_idestado`, `admin_idusua`) VALUES
(1, 0, 'ANAV IE', 'M', '2015-08-09', 'A+', 1, 1),
(4, 0, 'NA', 'M', '0000-00-00', '', 2, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anav_asignaciones`
--

CREATE TABLE IF NOT EXISTS `anav_asignaciones` (
  `asig_id` int(11) NOT NULL,
  `asig_idgrupo` int(11) NOT NULL,
  `asig_idmate` int(11) NOT NULL,
  `asig_idprog` int(11) NOT NULL,
  `asig_idinst` int(11) NOT NULL,
  `asig_idestado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anav_asignaciones`
--

INSERT INTO `anav_asignaciones` (`asig_id`, `asig_idgrupo`, `asig_idmate`, `asig_idprog`, `asig_idinst`, `asig_idestado`) VALUES
(1, 1, 2, 1, 1, 1),
(2, 2, 1, 2, 1, 1),
(3, 1, 3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anav_calificaciones`
--

CREATE TABLE IF NOT EXISTS `anav_calificaciones` (
  `calif_id` int(11) NOT NULL,
  `calif_idestu` int(11) NOT NULL,
  `calif_idmate` int(11) NOT NULL,
  `calif_nota1` decimal(3,2) DEFAULT NULL,
  `calif_nota2` decimal(3,2) DEFAULT NULL,
  `calif_nota3` decimal(3,2) DEFAULT NULL,
  `calif_notaf` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anav_calificaciones`
--

INSERT INTO `anav_calificaciones` (`calif_id`, `calif_idestu`, `calif_idmate`, `calif_nota1`, `calif_nota2`, `calif_nota3`, `calif_notaf`) VALUES
(1, 3, 1, '5.00', '5.00', '5.00', '5.00'),
(2, 5, 2, '3.20', '4.60', '5.00', '4.34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anav_directivos`
--

CREATE TABLE IF NOT EXISTS `anav_directivos` (
  `direc_id` int(11) NOT NULL COMMENT 'Id del Directivo(a)',
  `direc_telefono` int(11) NOT NULL COMMENT 'Telefono',
  `direc_direccion` varchar(100) NOT NULL COMMENT 'direccion de residencia',
  `direc_genero` varchar(1) NOT NULL COMMENT 'Genero',
  `direc_fnacimiento` date NOT NULL COMMENT 'Fecha de nacimiento',
  `direc_rh` varchar(3) NOT NULL COMMENT 'Grupo sanguineo',
  `direc_idestado` int(11) NOT NULL COMMENT 'Estado ',
  `direc_idusua` int(11) NOT NULL COMMENT 'Este  es el id del usario que le corresponde'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anav_directivos`
--

INSERT INTO `anav_directivos` (`direc_id`, `direc_telefono`, `direc_direccion`, `direc_genero`, `direc_fnacimiento`, `direc_rh`, `direc_idestado`, `direc_idusua`) VALUES
(5, 0, 'NA', 'M', '1954-11-17', 'A+', 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anav_estaacad`
--

CREATE TABLE IF NOT EXISTS `anav_estaacad` (
  `estaacad_id` int(11) NOT NULL,
  `estaacad_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anav_estaacad`
--

INSERT INTO `anav_estaacad` (`estaacad_id`, `estaacad_nombre`) VALUES
(1, 'Inscrito(a)'),
(2, 'Matriculado(a)'),
(3, 'Suspendido(a)'),
(4, 'Condicionado(a)'),
(5, 'Retirado(a)'),
(6, 'Graduado(a)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anav_estados`
--

CREATE TABLE IF NOT EXISTS `anav_estados` (
  `esta_id` int(11) NOT NULL COMMENT 'Id del estado',
  `esta_nombre` varchar(20) NOT NULL COMMENT 'Nombre del estado'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anav_estados`
--

INSERT INTO `anav_estados` (`esta_id`, `esta_nombre`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anav_estudiantes`
--

CREATE TABLE IF NOT EXISTS `anav_estudiantes` (
  `estu_id` int(11) NOT NULL COMMENT 'id del estudiante',
  `estu_codigo` varchar(20) NOT NULL COMMENT 'Codigo Estudiante',
  `estu_fingreso` date NOT NULL COMMENT 'fecha de ingreso',
  `estu_telefono` int(11) NOT NULL COMMENT 'telefono',
  `estu_direccion` varchar(100) NOT NULL COMMENT 'direccion de residencia',
  `estu_genero` varchar(1) NOT NULL COMMENT 'Genero',
  `estu_fnacimiento` date NOT NULL COMMENT 'Fecha de nacimiento',
  `estu_rh` varchar(3) NOT NULL COMMENT 'Grupo sanguineo',
  `estu_idestado` int(11) NOT NULL COMMENT 'Estado ',
  `estu_idestaacad` int(11) NOT NULL COMMENT 'Estado Academico',
  `estu_idprog` int(11) NOT NULL,
  `estu_idusua` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anav_estudiantes`
--

INSERT INTO `anav_estudiantes` (`estu_id`, `estu_codigo`, `estu_fingreso`, `estu_telefono`, `estu_direccion`, `estu_genero`, `estu_fnacimiento`, `estu_rh`, `estu_idestado`, `estu_idestaacad`, `estu_idprog`, `estu_idusua`) VALUES
(3, '123456789', '2016-02-01', 0, 'NA', 'M', '1999-01-01', 'B+', 1, 2, 1, 5),
(5, '01301', '2016-01-03', 0, 'NA', 'M', '1994-12-14', 'A+', 1, 2, 1, 11),
(6, '5566', '2016-01-11', 123568457, 'NA12', 'M', '1996-01-10', 'A+', 1, 2, 2, 12),
(8, '013014', '2016-01-01', 0, 'NA', 'M', '1999-02-03', 'A+', 1, 1, 2, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anav_estugrupos`
--

CREATE TABLE IF NOT EXISTS `anav_estugrupos` (
  `estugrupos_id` int(11) NOT NULL,
  `estugrupos_idestu` int(11) NOT NULL,
  `estugrupos_idgrupo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anav_estugrupos`
--

INSERT INTO `anav_estugrupos` (`estugrupos_id`, `estugrupos_idestu`, `estugrupos_idgrupo`) VALUES
(1, 3, 1),
(8, 5, 1),
(9, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anav_grupos`
--

CREATE TABLE IF NOT EXISTS `anav_grupos` (
  `grupo_id` int(11) NOT NULL,
  `grupo_codigo` varchar(15) NOT NULL,
  `grupo_nombre` varchar(20) NOT NULL,
  `grupo_anio` int(11) NOT NULL,
  `grupo_idprog` int(11) NOT NULL,
  `grupo_idestado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anav_grupos`
--

INSERT INTO `anav_grupos` (`grupo_id`, `grupo_codigo`, `grupo_nombre`, `grupo_anio`, `grupo_idprog`, `grupo_idestado`) VALUES
(1, 'TLA_I2015', 'TLA_I', 2015, 1, 1),
(2, 'DPA_I2015', 'DPA_I', 2015, 2, 1),
(3, 'ASA_I2015', 'ASA_I', 2015, 3, 1),
(4, 'DPA_II2016', 'DPA_II', 2016, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anav_instructores`
--

CREATE TABLE IF NOT EXISTS `anav_instructores` (
  `inst_id` int(11) NOT NULL COMMENT 'Id del Instructor(a)',
  `inst_codigo` varchar(20) NOT NULL COMMENT 'Codigo Instructor(a)',
  `inst_nlicencia` varchar(30) DEFAULT NULL COMMENT 'Fecha de ingreso',
  `inst_telefono` int(11) NOT NULL COMMENT 'Telefono',
  `inst_direccion` varchar(100) NOT NULL COMMENT 'direccion de residencia',
  `inst_genero` varchar(1) NOT NULL COMMENT 'Genero',
  `inst_fnacimiento` date NOT NULL COMMENT 'Fecha de nacimiento',
  `inst_rh` varchar(3) NOT NULL COMMENT 'Grupo sanguineo',
  `inst_idestado` int(11) NOT NULL,
  `inst_idusua` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anav_instructores`
--

INSERT INTO `anav_instructores` (`inst_id`, `inst_codigo`, `inst_nlicencia`, `inst_telefono`, `inst_direccion`, `inst_genero`, `inst_fnacimiento`, `inst_rh`, `inst_idestado`, `inst_idusua`) VALUES
(1, '456213', '5620', 23, 'CUALQUIERPARTE', 'M', '1969-01-01', 'A+', 1, 6),
(4, '0231', '12544', 0, 'NA', 'M', '0000-00-00', '', 1, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anav_materias`
--

CREATE TABLE IF NOT EXISTS `anav_materias` (
  `mate_id` int(11) NOT NULL,
  `mate_codigo` varchar(40) NOT NULL,
  `mate_nombre` varchar(40) NOT NULL,
  `mate_horas` int(11) NOT NULL,
  `mate_idprog` int(11) NOT NULL,
  `mate_idestado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anav_materias`
--

INSERT INTO `anav_materias` (`mate_id`, `mate_codigo`, `mate_nombre`, `mate_horas`, `mate_idprog`, `mate_idestado`) VALUES
(1, 'CLIMATOLOGIA_DPA', 'CLIMATOLOGIA_I', 5, 2, 1),
(2, 'CLIMATOLOGIA_TLA', 'CLIMATOLOGIA_I', 4, 1, 1),
(3, 'PRUEBA_TLA', 'PRUEBA_I', 5, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anav_programas`
--

CREATE TABLE IF NOT EXISTS `anav_programas` (
  `prog_id` int(11) NOT NULL COMMENT 'id del programa',
  `prog_codigo` varchar(10) NOT NULL COMMENT 'codigo programa',
  `prog_nombre` varchar(60) NOT NULL COMMENT 'nombre programa',
  `prog_idestado` int(11) NOT NULL COMMENT 'estado del programa'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anav_programas`
--

INSERT INTO `anav_programas` (`prog_id`, `prog_codigo`, `prog_nombre`, `prog_idestado`) VALUES
(1, 'TLA', 'TECNICO EN LINEA DE AVIONES', 1),
(2, 'DPA', 'Desapachador de aeronaves', 1),
(3, 'ASA', 'Auxiliar de servicio a bordo', 1),
(4, 'TLH', 'TECNICO EN LINEA DE HELICOPTEROS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anav_usuarios`
--

CREATE TABLE IF NOT EXISTS `anav_usuarios` (
  `usua_id` int(11) NOT NULL COMMENT 'Id Usuario',
  `usua_pnombre` varchar(64) NOT NULL COMMENT 'Primer Nombre',
  `usua_snombre` varchar(64) DEFAULT NULL COMMENT 'Segundo Nombre',
  `usua_papellido` varchar(64) NOT NULL COMMENT 'Primer Apellido',
  `usua_sapellido` varchar(64) DEFAULT NULL COMMENT 'Segundo Apellido',
  `usua_doc` bigint(20) NOT NULL COMMENT 'Documento de identidad',
  `usua_password` varchar(64) NOT NULL COMMENT 'Contraseña',
  `usua_email` varchar(120) NOT NULL COMMENT 'Correo Electronico',
  `usua_tipo` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anav_usuarios`
--

INSERT INTO `anav_usuarios` (`usua_id`, `usua_pnombre`, `usua_snombre`, `usua_papellido`, `usua_sapellido`, `usua_doc`, `usua_password`, `usua_email`, `usua_tipo`) VALUES
(1, 'SUPER', '', 'ADMIN', '', 123456, 'e10adc3949ba59abbe56e057f20f883e', 'soportesiac@gmail.com', 'ADMIN'),
(5, 'CAMILO', '', 'BERMUDEZ', '', 93100400608, 'e10adc3949ba59abbe56e057f20f883e', 'c@mail.com', 'EST'),
(6, 'PRUEBA', '', 'INSTRUCTOR', '', 123456780, 'e10adc3949ba59abbe56e057f20f883e', 'prueba@mail.com', 'INST'),
(9, 'ADMIN', '', 'PRUEBA', '', 32321, 'e10adc3949ba59abbe56e057f20f883e', 'admin@mail.com', 'ADMIN'),
(11, 'FULANITO', '', 'DE TAL', '', 6547, 'e10adc3949ba59abbe56e057f20f883e', 'fulano@mail.com', 'EST'),
(12, 'PRUEBA', '', 'ESTUDIANTE', '', 555666, 'e10adc3949ba59abbe56e057f20f883e', 'estu@mail.com', 'EST'),
(15, 'DIRECTIVO', '', 'PRUEBA', '', 654321, 'e10adc3949ba59abbe56e057f20f883e', 'direc@mail.com', 'DIREC'),
(19, 'PROFESOR', '', 'PRUEBA', '', 213231321, 'e10adc3949ba59abbe56e057f20f883e', 'profe@mail.com', 'INST'),
(20, 'JUAN', '', 'DELA CRUZ', '', 56489871, 'e10adc3949ba59abbe56e057f20f883e', 'delacruz@mail.com', 'EST');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anav_administradores`
--
ALTER TABLE `anav_administradores`
  ADD PRIMARY KEY (`admin_id`), ADD KEY `admin_idestado` (`admin_idestado`), ADD KEY `admin_idusua` (`admin_idusua`);

--
-- Indices de la tabla `anav_asignaciones`
--
ALTER TABLE `anav_asignaciones`
  ADD PRIMARY KEY (`asig_id`), ADD KEY `asig_idhora` (`asig_idprog`), ADD KEY `asig_idinst` (`asig_idinst`), ADD KEY `asig_idesta` (`asig_idestado`), ADD KEY `asig_idmate` (`asig_idmate`), ADD KEY `grupo-asignacion` (`asig_idgrupo`);

--
-- Indices de la tabla `anav_calificaciones`
--
ALTER TABLE `anav_calificaciones`
  ADD PRIMARY KEY (`calif_id`), ADD KEY `calif_idestu` (`calif_idestu`), ADD KEY `calif_idmate` (`calif_idmate`), ADD KEY `calif_idestu_2` (`calif_idestu`), ADD KEY `calif_idmate_2` (`calif_idmate`);

--
-- Indices de la tabla `anav_directivos`
--
ALTER TABLE `anav_directivos`
  ADD PRIMARY KEY (`direc_id`), ADD KEY `direc_idestado` (`direc_idestado`), ADD KEY `direc_idusua` (`direc_idusua`);

--
-- Indices de la tabla `anav_estaacad`
--
ALTER TABLE `anav_estaacad`
  ADD PRIMARY KEY (`estaacad_id`);

--
-- Indices de la tabla `anav_estados`
--
ALTER TABLE `anav_estados`
  ADD PRIMARY KEY (`esta_id`);

--
-- Indices de la tabla `anav_estudiantes`
--
ALTER TABLE `anav_estudiantes`
  ADD PRIMARY KEY (`estu_id`), ADD KEY `estu_idestado` (`estu_idestado`), ADD KEY `estu_idestaacad` (`estu_idestaacad`), ADD KEY `estu_idestaacad_2` (`estu_idestaacad`), ADD KEY `estu_idestado_2` (`estu_idestado`), ADD KEY `estu_idusua` (`estu_idusua`), ADD KEY `estudiante-programa` (`estu_idprog`);

--
-- Indices de la tabla `anav_estugrupos`
--
ALTER TABLE `anav_estugrupos`
  ADD PRIMARY KEY (`estugrupos_id`), ADD KEY `estugrupos_idestu` (`estugrupos_idestu`), ADD KEY `estugrupos_idgrupo` (`estugrupos_idgrupo`);

--
-- Indices de la tabla `anav_grupos`
--
ALTER TABLE `anav_grupos`
  ADD PRIMARY KEY (`grupo_id`), ADD KEY `grupo_idesta` (`grupo_idestado`), ADD KEY `grupo_idesta_2` (`grupo_idestado`), ADD KEY `grupo_idestado` (`grupo_idestado`), ADD KEY `programa-grupo` (`grupo_idprog`);

--
-- Indices de la tabla `anav_instructores`
--
ALTER TABLE `anav_instructores`
  ADD PRIMARY KEY (`inst_id`), ADD KEY `inst_idusua` (`inst_idusua`), ADD KEY `inst_idestado` (`inst_idestado`);

--
-- Indices de la tabla `anav_materias`
--
ALTER TABLE `anav_materias`
  ADD PRIMARY KEY (`mate_id`), ADD KEY `mate_idesta` (`mate_idestado`), ADD KEY `materia_programa` (`mate_idprog`);

--
-- Indices de la tabla `anav_programas`
--
ALTER TABLE `anav_programas`
  ADD PRIMARY KEY (`prog_id`), ADD KEY `prog_idestado` (`prog_idestado`);

--
-- Indices de la tabla `anav_usuarios`
--
ALTER TABLE `anav_usuarios`
  ADD PRIMARY KEY (`usua_id`), ADD UNIQUE KEY `usua_doc` (`usua_doc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anav_administradores`
--
ALTER TABLE `anav_administradores`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Administrador(a)',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `anav_asignaciones`
--
ALTER TABLE `anav_asignaciones`
  MODIFY `asig_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `anav_calificaciones`
--
ALTER TABLE `anav_calificaciones`
  MODIFY `calif_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `anav_directivos`
--
ALTER TABLE `anav_directivos`
  MODIFY `direc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Directivo(a)',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `anav_estaacad`
--
ALTER TABLE `anav_estaacad`
  MODIFY `estaacad_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `anav_estados`
--
ALTER TABLE `anav_estados`
  MODIFY `esta_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del estado',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `anav_estudiantes`
--
ALTER TABLE `anav_estudiantes`
  MODIFY `estu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del estudiante',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `anav_estugrupos`
--
ALTER TABLE `anav_estugrupos`
  MODIFY `estugrupos_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `anav_grupos`
--
ALTER TABLE `anav_grupos`
  MODIFY `grupo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `anav_instructores`
--
ALTER TABLE `anav_instructores`
  MODIFY `inst_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Instructor(a)',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `anav_materias`
--
ALTER TABLE `anav_materias`
  MODIFY `mate_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `anav_programas`
--
ALTER TABLE `anav_programas`
  MODIFY `prog_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del programa',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `anav_usuarios`
--
ALTER TABLE `anav_usuarios`
  MODIFY `usua_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Usuario',AUTO_INCREMENT=21;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anav_administradores`
--
ALTER TABLE `anav_administradores`
ADD CONSTRAINT `estado_admin` FOREIGN KEY (`admin_idestado`) REFERENCES `anav_estados` (`esta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `usuario_admin` FOREIGN KEY (`admin_idusua`) REFERENCES `anav_usuarios` (`usua_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `anav_asignaciones`
--
ALTER TABLE `anav_asignaciones`
ADD CONSTRAINT `asignacion_estado` FOREIGN KEY (`asig_idestado`) REFERENCES `anav_estados` (`esta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `asignacion_grupo` FOREIGN KEY (`asig_idgrupo`) REFERENCES `anav_grupos` (`grupo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `asignacion_instructor` FOREIGN KEY (`asig_idinst`) REFERENCES `anav_instructores` (`inst_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `asignacion_materia` FOREIGN KEY (`asig_idmate`) REFERENCES `anav_materias` (`mate_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `asignacion_programas` FOREIGN KEY (`asig_idprog`) REFERENCES `anav_programas` (`prog_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `anav_calificaciones`
--
ALTER TABLE `anav_calificaciones`
ADD CONSTRAINT `calificaciones_estudiantes` FOREIGN KEY (`calif_idestu`) REFERENCES `anav_estudiantes` (`estu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `calificaciones_materias` FOREIGN KEY (`calif_idmate`) REFERENCES `anav_materias` (`mate_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `anav_directivos`
--
ALTER TABLE `anav_directivos`
ADD CONSTRAINT `estado_direc` FOREIGN KEY (`direc_idestado`) REFERENCES `anav_estados` (`esta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `usuario_direc` FOREIGN KEY (`direc_idusua`) REFERENCES `anav_usuarios` (`usua_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `anav_estudiantes`
--
ALTER TABLE `anav_estudiantes`
ADD CONSTRAINT `estaacad_estudiante` FOREIGN KEY (`estu_idestaacad`) REFERENCES `anav_estaacad` (`estaacad_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `estado_estudiante` FOREIGN KEY (`estu_idestado`) REFERENCES `anav_estados` (`esta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `programa-estudiante` FOREIGN KEY (`estu_idprog`) REFERENCES `anav_programas` (`prog_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `usuario_estudiante` FOREIGN KEY (`estu_idusua`) REFERENCES `anav_usuarios` (`usua_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `anav_estugrupos`
--
ALTER TABLE `anav_estugrupos`
ADD CONSTRAINT `estudiante_grupo-estudiante` FOREIGN KEY (`estugrupos_idestu`) REFERENCES `anav_estudiantes` (`estu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `estudiante_grupo-grupo` FOREIGN KEY (`estugrupos_idgrupo`) REFERENCES `anav_grupos` (`grupo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `anav_grupos`
--
ALTER TABLE `anav_grupos`
ADD CONSTRAINT `grupos_estado` FOREIGN KEY (`grupo_idestado`) REFERENCES `anav_estados` (`esta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `grupos_programas` FOREIGN KEY (`grupo_idprog`) REFERENCES `anav_programas` (`prog_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `anav_instructores`
--
ALTER TABLE `anav_instructores`
ADD CONSTRAINT `usuario_instrctor` FOREIGN KEY (`inst_idusua`) REFERENCES `anav_usuarios` (`usua_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `anav_materias`
--
ALTER TABLE `anav_materias`
ADD CONSTRAINT `materia-estado` FOREIGN KEY (`mate_idestado`) REFERENCES `anav_estados` (`esta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `materia-programa` FOREIGN KEY (`mate_idprog`) REFERENCES `anav_programas` (`prog_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `anav_programas`
--
ALTER TABLE `anav_programas`
ADD CONSTRAINT `estado-programa` FOREIGN KEY (`prog_idestado`) REFERENCES `anav_estados` (`esta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
