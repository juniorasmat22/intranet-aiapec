DROP TRIGGER IF EXISTS `db_academia_aiapaec`.`tbl_detalle_pago_AFTER_INSERT`;

DELIMITER $$
USE `db_academia_aiapaec`$$

CREATE DEFINER=`root`@`localhost` TRIGGER `db_academia_aiapaec`.`tbl_detalle_pago_AFTER_INSERT` AFTER INSERT ON `tbl_detalle_pago` FOR EACH ROW
BEGIN
    DECLARE montoPagoTotal decimal(10,2);
	update tbl_cuota SET estado_cuota = '4' where id_cuota=NEW.id_cuota;
    select sum(tdp.monto_pago) into montoPagoTotal from tbl_detalle_pago tdp where tdp.id_pago=NEW.id_pago;
    update tbl_pago set total_pago = montoPagoTotal where id_pago=NEW.id_pago;
END$$
DELIMITER ;
