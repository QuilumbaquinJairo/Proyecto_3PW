-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "catalogo" -------------------------------------
CREATE TABLE `catalogo`( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`codigoOrden` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`producto` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`cantidad` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------


-- CREATE TABLE "ficha" ----------------------------------------
CREATE TABLE `ficha`( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`nombre` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`unidad` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
	`cantidad` Int( 11 ) NULL DEFAULT NULL,
	`precio` Decimal( 10, 0 ) NULL DEFAULT NULL,
	`tipo` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`fechain` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 14;
-- -------------------------------------------------------------


-- CREATE TABLE "ordenes" --------------------------------------
CREATE TABLE `ordenes`( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`producto` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`cantidad` BigInt( 20 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 17;
-- -------------------------------------------------------------


-- CREATE TABLE "productos" ------------------------------------
CREATE TABLE `productos`( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`nombre` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`cantidad` Int( 11 ) NOT NULL,
	`descripcion` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
	`proveedor` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`fecha_elaboracion` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`unidad` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 19;
-- -------------------------------------------------------------


-- CREATE TABLE "productos1" -----------------------------------
CREATE TABLE `productos1`( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`nombre` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`cantidad` Int( 11 ) NOT NULL,
	`descripcion` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
	`fabricante` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`fecha_elaboracion` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`unidad` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 8;
-- -------------------------------------------------------------


-- CREATE TABLE "proveedores" ----------------------------------
CREATE TABLE `proveedores`( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`empresa` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`nombre` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`direccion` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`telefono` BigInt( 20 ) NOT NULL,
	`correo` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	`ruc` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 15;
-- -------------------------------------------------------------


-- CREATE TABLE "usuarios" -------------------------------------
CREATE TABLE `usuarios`( 
	`id` Int( 11 ) NOT NULL,
	`usuario` VarChar( 25 ) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	`password` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- Dump data of "catalogo" ---------------------------------
-- ---------------------------------------------------------


-- Dump data of "ficha" ------------------------------------
BEGIN;

INSERT INTO `ficha`(`id`,`nombre`,`unidad`,`cantidad`,`precio`,`tipo`,`fechain`) VALUES 
( '1', 'undefined', NULL, '3333', NULL, 'Modelo 2 Noga', NULL ),
( '2', 'undefined', NULL, '4', NULL, 'Modelo 4 Abedu', '2023-08-11' ),
( '3', 'undefined', NULL, '7686', NULL, 'Modelo 2 Noga', '2023-08-23' ),
( '4', 'undefined', NULL, '21212', NULL, 'Modelo 2 Pino', '2023-09-01' ),
( '5', 'undefined', NULL, '87978', NULL, 'Modelo 2 Noga', '2023-08-24' ),
( '6', 'undefined', NULL, '7867', NULL, 'Modelo 2 Noga', '2023-08-17' ),
( '7', 'undefined', NULL, '87', NULL, 'Modelo 2 Noga', '2023-08-17' ),
( '8', 'undefined', NULL, '2212', NULL, 'Modelo 2 Noga', '2023-08-16' ),
( '9', 'undefined', NULL, '2121', NULL, 'Modelo 4 Abedu', '2023-08-18' ),
( '10', 'undefined', NULL, '6', NULL, 'Modelo 2 Noga', '2023-08-19' ),
( '11', 'undefined', NULL, '2222', NULL, 'Modelo 5 Cerezo', '2023-08-08' ),
( '12', 'undefined', NULL, '2322332', NULL, 'Modelo 2 Noga', '2023-08-22' ),
( '13', 'undefined', NULL, '89770879', NULL, 'Modelo 4 Abedu', '2023-08-15' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "ordenes" ----------------------------------
BEGIN;

INSERT INTO `ordenes`(`id`,`producto`,`cantidad`) VALUES 
( '11', 'Armario Platsa de cinco puertas', '4' ),
( '12', 'Armario Platsa de dos puertas', '4' ),
( '13', 'Armario Platsa de dos puertas', '12' ),
( '14', 'Armario Platsa de dos puertas', '15' ),
( '15', 'Armario Platsa de dos puertas', '1234567890987654' ),
( '16', 'Armario Platsa de dos puertas', '2222' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "productos" --------------------------------
BEGIN;

INSERT INTO `productos`(`id`,`nombre`,`cantidad`,`descripcion`,`proveedor`,`fecha_elaboracion`,`unidad`) VALUES 
( '16', 'Metal', '500', 'Tubos de acero', 'Importparts', '2023-08-30', 'Kilogramos' ),
( '17', 'Tela', '50', 'Tela resistente', 'VISOALSA', '2023-08-30', 'metros' ),
( '18', 'Tornillos', '300', 'Tornillos para ensamblaje', 'Importparts', '2023-08-30', 'gr' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "productos1" -------------------------------
BEGIN;

INSERT INTO `productos1`(`id`,`nombre`,`cantidad`,`descripcion`,`fabricante`,`fecha_elaboracion`,`unidad`) VALUES 
( '1', 'Revestimiento de poliéster en polvo', '15', 'Acabado resistente', 'MadereraMDFECU', '2023-08-26', 'm²' ),
( '2', 'Tablero de fibras', '8', 'Material de construcción', 'MadereraMDFECU', '2023-08-26', 'm²' ),
( '3', 'Lámina de papel', '12', 'Material de embalaje', 'MadereraMDFECU', '2023-08-26', 'm' ),
( '4', 'Tablero de partículas', '7', 'Material de construcción', 'MadereraMDFECU', '2023-08-26', 'm²' ),
( '5', 'Cartón de panel de abeja', '19', 'Material de embalaje', 'MadereraMDFECU', '2023-08-26', 'm' ),
( '6', 'TRIPLEX', '123', 'madera', 'mueblesMDF', '2000-12-01', 'm²' ),
( '7', 'clavos', '123', 'clavos de acero', 'maderaMDF', '2000-12-12', '12 Octubre' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "proveedores" ------------------------------
BEGIN;

INSERT INTO `proveedores`(`id`,`empresa`,`nombre`,`direccion`,`telefono`,`correo`,`ruc`) VALUES 
( '1', 'Importparts', 'Fernando Suquillo', 'Sangolqui', '984008483', 'efsuquillo@espe.edu.ec', '1716871965001' ),
( '3', 'VISOALSA', 'Andres', 'Nela Martinez', '9832419', 'victorcamacho8762@gmail.com', '1217612675' ),
( '4', 'MADERERA', 'JUAN GUERRA', 'Simon Bolivar', '99380993', 'jairoquilumbaquin1@gmail.com', '12312435245' ),
( '9', 'ADELCA', 'JUAN', 'ELOY ALFARO', '9994564564', 'juan@gmail.com', '1234564' ),
( '10', 'jairo', 'jairo', 'jairo', '123123', 'jaioj', '123123' ),
( '11', 'jairo', 'jairo', 'jairo', '1233234', 'jaiaro', '12312' ),
( '12', 'simon', 'jairo', 'simon bolivar', '99283012', 'jair', '12312' ),
( '13', 'Lavoro', 'Eduardo Sanin', 'Comite del pueeblo', '123322', 'lavoro@edu.com', '23213232222' ),
( '14', 'asda', 'asd', 'sda', '1231312', 'jairoquilumbaquin1@gmail.com', '12312321123' );
COMMIT;
-- ---------------------------------------------------------


-- Dump data of "usuarios" ---------------------------------
BEGIN;

INSERT INTO `usuarios`(`id`,`usuario`,`password`) VALUES 
( '1', 'admin', '827ccb0eea8a706c4c34a16891f84e7b' ),
( '2', 'fernando', '21232f297a57a5a743894a0e4a801fc3' ),
( '3', 'nataly', '21232f297a57a5a743894a0e4a801fc3' );
COMMIT;
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


