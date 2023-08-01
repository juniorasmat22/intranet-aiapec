DROP TRIGGER IF EXISTS `db_academia_aiapaec`.`tbl_matricula_BEFORE_INSERT`;

DELIMITER $$
USE `db_academia_aiapaec`$$
CREATE DEFINER=`root`@`localhost` TRIGGER `db_academia_aiapaec`.`tbl_matricula_BEFORE_INSERT` BEFORE INSERT ON `tbl_matricula` FOR EACH ROW
BEGIN
 DECLARE precio decimal(10,2);
	IF  NEW.cuotas_matricula = 1 THEN
		Select tpa.precio_cuotas_programa INTO precio from tbl_programas_academia tpa where tpa.id_programas_academia= NEW.id_programas_academia;
	END IF;
	IF NEW.cuotas_matricula > 1 THEN
	Select tpa.precio_programa_academia INTO precio from tbl_programas_academia tpa where tpa.id_programas_academia= NEW.id_programas_academia;
	END IF;
	SET NEW.costo_original_matricula=precio;
	SET NEW.costo_final_matricula=precio;
END$$
DELIMITER ;
