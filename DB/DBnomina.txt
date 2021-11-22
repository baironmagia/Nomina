SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema nomina
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema nomina
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `nomina` DEFAULT CHARACTER SET utf8 ;
USE `nomina` ;

-- -----------------------------------------------------
-- Table `nomina`.`cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nomina`.`cargo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `nomina`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nomina`.`rol` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NULL DEFAULT NULL,
  `descripcion` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `nomina`.`cuenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nomina`.`cuenta` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idrol` INT(11) NOT NULL,
  `usuario` VARCHAR(200) NOT NULL,
  `clave` VARCHAR(200) NOT NULL,
  `estado` TINYINT(1) NOT NULL DEFAULT '1',
  `email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cuenta_rol_idx` (`idrol` ASC),
  CONSTRAINT `fk_cuenta_rol`
    FOREIGN KEY (`idrol`)
    REFERENCES `nomina`.`rol` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `nomina`.`departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nomina`.`departamento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 18
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `nomina`.`empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nomina`.`empleado` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cedula` VARCHAR(15) NULL DEFAULT NULL,
  `nombres` VARCHAR(45) NULL DEFAULT NULL,
  `apellidos` VARCHAR(45) NULL DEFAULT NULL,
  `salario` INT(6) NULL DEFAULT NULL,
  `telefono` VARCHAR(15) NULL DEFAULT NULL,
  `direccion` VARCHAR(200) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `iddepartamento` INT(11) NOT NULL,
  `idcargo` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_empleado_departamento_idx` (`iddepartamento` ASC),
  INDEX `fk_empleado_cargo1_idx` (`idcargo` ASC),
  CONSTRAINT `fk_empleado_cargo1`
    FOREIGN KEY (`idcargo`)
    REFERENCES `nomina`.`cargo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empleado_departamento`
    FOREIGN KEY (`iddepartamento`)
    REFERENCES `nomina`.`departamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `nomina`.`cuentaempleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nomina`.`cuentaempleado` (
  `idempleado` INT(11) NOT NULL,
  `idcuenta` INT(11) NOT NULL,
  INDEX `fk_cuentaEmpleado_empleado1_idx` (`idempleado` ASC),
  INDEX `fk_cuentaempleado_cuenta1_idx` (`idcuenta` ASC),
  CONSTRAINT `fk_cuentaEmpleado_empleado1`
    FOREIGN KEY (`idempleado`)
    REFERENCES `nomina`.`empleado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuentaempleado_cuenta1`
    FOREIGN KEY (`idcuenta`)
    REFERENCES `nomina`.`cuenta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `nomina`.`descuento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nomina`.`descuento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `arl` FLOAT NOT NULL DEFAULT '4',
  `salud` FLOAT NULL DEFAULT '4',
  `pension` FLOAT NULL DEFAULT '4',
  `parafiscal` FLOAT NULL DEFAULT '4',
  `fecha` DATE NULL DEFAULT '2021-01-01',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `nomina`.`devengado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nomina`.`devengado` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `alimentacion` FLOAT NULL DEFAULT '4',
  `vivienda` FLOAT NULL DEFAULT '4',
  `transporte` FLOAT NULL DEFAULT '4',
  `hextra` FLOAT NULL DEFAULT '4',
  `fecha` DATE NULL DEFAULT '2021-01-01',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `nomina`.`sueldo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nomina`.`sueldo` (
  `id` INT(11) NOT NULL,
  `horasMes` INT(3) NULL DEFAULT '0',
  `horasExtra` INT(1) NULL DEFAULT '0',
  `vhora` FLOAT NULL DEFAULT '0',
  `bono` FLOAT NULL DEFAULT '0',
  `idempleado` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_sueldo_empleado1_idx` (`idempleado` ASC),
  CONSTRAINT `fk_sueldo_empleado1`
    FOREIGN KEY (`idempleado`)
    REFERENCES `nomina`.`empleado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `nomina` ;

-- -----------------------------------------------------
-- Placeholder table for view `nomina`.`nominaempleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nomina`.`nominaempleado` (`idsueldo` INT, `id` INT, `cedula` INT, `nombres` INT, `telefono` INT, `neto` INT);

-- -----------------------------------------------------
-- Placeholder table for view `nomina`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nomina`.`perfil` (`eid` INT, `eced` INT, `enom` INT, `eape` INT, `etel` INT, `edir` INT, `eema` INT, `canom` INT, `dnom` INT, `usu` INT, `clv` INT);

-- -----------------------------------------------------
-- Placeholder table for view `nomina`.`reporte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nomina`.`reporte` (`id` INT, `nombres` INT, `cedula` INT, `nombre` INT, `basico` INT, `bono` INT, `alimentacion` INT, `vivienda` INT, `transporte` INT, `horasExtras` INT, `parl` INT, `psal` INT, `ppen` INT, `ppar` INT, `arl` INT, `salud` INT, `pension` INT, `parafiscal` INT, `descuento` INT, `neto` INT);

-- -----------------------------------------------------
-- Placeholder table for view `nomina`.`sesion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nomina`.`sesion` (`id` INT, `cedula` INT, `nombres` INT, `idRol` INT, `rol` INT, `usuario` INT, `clave` INT);

-- -----------------------------------------------------
-- View `nomina`.`nominaempleado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nomina`.`nominaempleado`;
USE `nomina`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomina`.`nominaempleado` AS select `s`.`id` AS `idsueldo`,`e`.`id` AS `id`,`e`.`cedula` AS `cedula`,concat(`e`.`nombres`,' ',`e`.`apellidos`) AS `nombres`,`e`.`telefono` AS `telefono`,replace(format(truncate((((((((`s`.`horasMes` * `s`.`vhora`) + `s`.`bono`) + (((select `nomina`.`devengado`.`alimentacion` from `nomina`.`devengado`) * `e`.`salario`) / 100)) + (((select `nomina`.`devengado`.`vivienda` from `nomina`.`devengado`) * `e`.`salario`) / 100)) + (((select `nomina`.`devengado`.`transporte` from `nomina`.`devengado`) * `e`.`salario`) / 100)) + ((((select `nomina`.`devengado`.`hextra` from `nomina`.`devengado`) * `e`.`salario`) / 100) * `s`.`horasExtra`)) - ((((((select `nomina`.`descuento`.`arl` from `nomina`.`descuento`) * `e`.`salario`) / 100) + (((select `nomina`.`descuento`.`salud` from `nomina`.`descuento`) * `e`.`salario`) / 100)) + (((select `nomina`.`descuento`.`pension` from `nomina`.`descuento`) * `e`.`salario`) / 100)) + (((select `nomina`.`descuento`.`parafiscal` from `nomina`.`descuento`) * `e`.`salario`) / 100))),0),'de_DE'),',','.') AS `neto` from (`nomina`.`empleado` `e` join `nomina`.`sueldo` `s` on((`e`.`id` = `s`.`idempleado`)));

-- -----------------------------------------------------
-- View `nomina`.`perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nomina`.`perfil`;
USE `nomina`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomina`.`perfil` AS select `e`.`id` AS `eid`,`e`.`cedula` AS `eced`,`e`.`nombres` AS `enom`,`e`.`apellidos` AS `eape`,`e`.`telefono` AS `etel`,`e`.`direccion` AS `edir`,`e`.`email` AS `eema`,`ca`.`nombre` AS `canom`,`d`.`nombre` AS `dnom`,`c`.`usuario` AS `usu`,`c`.`clave` AS `clv` from (((((`nomina`.`rol` `r` join `nomina`.`cuenta` `c` on((`c`.`idrol` = `r`.`id`))) join `nomina`.`cuentaempleado` `ce` on((`ce`.`idcuenta` = `c`.`id`))) join `nomina`.`empleado` `e` on((`ce`.`idempleado` = `e`.`id`))) join `nomina`.`cargo` `ca` on((`ca`.`id` = `e`.`idcargo`))) join `nomina`.`departamento` `d` on((`d`.`id` = `e`.`iddepartamento`)));

-- -----------------------------------------------------
-- View `nomina`.`reporte`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nomina`.`reporte`;
USE `nomina`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomina`.`reporte` AS select `e`.`id` AS `id`,concat(`e`.`nombres`,' ',`e`.`apellidos`) AS `nombres`,`e`.`cedula` AS `cedula`,`c`.`nombre` AS `nombre`,concat('$',replace(format(truncate(`e`.`salario`,0),'de_DE'),',','.')) AS `basico`,concat('$',replace(format(truncate(`s`.`bono`,0),'de_DE'),',','.')) AS `bono`,concat('$',replace(format(truncate((((select `nomina`.`devengado`.`alimentacion` from `nomina`.`devengado`) * `e`.`salario`) / 100),0),'de_DE'),',','.')) AS `alimentacion`,concat('$',replace(format(truncate((((select `nomina`.`devengado`.`vivienda` from `nomina`.`devengado`) * `e`.`salario`) / 100),0),'de_DE'),',','.')) AS `vivienda`,concat('$',replace(format(truncate((((select `nomina`.`devengado`.`transporte` from `nomina`.`devengado`) * `e`.`salario`) / 100),0),'de_DE'),',','.')) AS `transporte`,concat('$',replace(format(truncate(((((select `nomina`.`devengado`.`hextra` from `nomina`.`devengado`) * `e`.`salario`) / 100) * `s`.`horasExtra`),0),'de_DE'),',','.')) AS `horasExtras`,(select `nomina`.`descuento`.`arl` from `nomina`.`descuento`) AS `parl`,(select `nomina`.`descuento`.`salud` from `nomina`.`descuento`) AS `psal`,(select `nomina`.`descuento`.`pension` from `nomina`.`descuento`) AS `ppen`,(select `nomina`.`descuento`.`parafiscal` from `nomina`.`descuento`) AS `ppar`,concat('$',replace(format(truncate((((select `nomina`.`descuento`.`arl` from `nomina`.`descuento`) * `e`.`salario`) / 100),0),'de_DE'),',','.')) AS `arl`,concat('$',replace(format(truncate((((select `nomina`.`descuento`.`salud` from `nomina`.`descuento`) * `e`.`salario`) / 100),0),'de_DE'),',','.')) AS `salud`,concat('$',replace(format(truncate((((select `nomina`.`descuento`.`pension` from `nomina`.`descuento`) * `e`.`salario`) / 100),0),'de_DE'),',','.')) AS `pension`,concat('$',replace(format(truncate((((select `nomina`.`descuento`.`parafiscal` from `nomina`.`descuento`) * `e`.`salario`) / 100),0),'de_DE'),',','.')) AS `parafiscal`,concat('$',replace(format(truncate(((((((select `nomina`.`descuento`.`arl` from `nomina`.`descuento`) * `e`.`salario`) / 100) + (((select `nomina`.`descuento`.`salud` from `nomina`.`descuento`) * `e`.`salario`) / 100)) + (((select `nomina`.`descuento`.`pension` from `nomina`.`descuento`) * `e`.`salario`) / 100)) + (((select `nomina`.`descuento`.`parafiscal` from `nomina`.`descuento`) * `e`.`salario`) / 100)),0),'de_DE'),',','.')) AS `descuento`,concat('$',replace(format(truncate((((((((`s`.`horasMes` * `s`.`vhora`) + `s`.`bono`) + (((select `nomina`.`devengado`.`alimentacion` from `nomina`.`devengado`) * `e`.`salario`) / 100)) + (((select `nomina`.`devengado`.`vivienda` from `nomina`.`devengado`) * `e`.`salario`) / 100)) + (((select `nomina`.`devengado`.`transporte` from `nomina`.`devengado`) * `e`.`salario`) / 100)) + ((((select `nomina`.`devengado`.`hextra` from `nomina`.`devengado`) * `e`.`salario`) / 100) * `s`.`horasExtra`)) - ((((((select `nomina`.`descuento`.`arl` from `nomina`.`descuento`) * `e`.`salario`) / 100) + (((select `nomina`.`descuento`.`salud` from `nomina`.`descuento`) * `e`.`salario`) / 100)) + (((select `nomina`.`descuento`.`pension` from `nomina`.`descuento`) * `e`.`salario`) / 100)) + (((select `nomina`.`descuento`.`parafiscal` from `nomina`.`descuento`) * `e`.`salario`) / 100))),0),'de_DE'),',','.')) AS `neto` from ((`nomina`.`empleado` `e` join `nomina`.`sueldo` `s` on((`e`.`id` = `s`.`idempleado`))) join `nomina`.`cargo` `c` on((`e`.`idcargo` = `c`.`id`)));

-- -----------------------------------------------------
-- View `nomina`.`sesion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nomina`.`sesion`;
USE `nomina`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomina`.`sesion` AS select `e`.`id` AS `id`,`e`.`cedula` AS `cedula`,concat(`e`.`nombres`,' ',`e`.`apellidos`) AS `nombres`,`r`.`id` AS `idRol`,`r`.`nombre` AS `rol`,`c`.`usuario` AS `usuario`,`c`.`clave` AS `clave` from (((`nomina`.`rol` `r` join `nomina`.`cuenta` `c` on((`c`.`idrol` = `r`.`id`))) join `nomina`.`cuentaempleado` `ce` on((`ce`.`idcuenta` = `c`.`id`))) join `nomina`.`empleado` `e` on((`ce`.`idempleado` = `e`.`id`)));

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
