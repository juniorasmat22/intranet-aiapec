DROP TRIGGER IF EXISTS `db_academia_aiapaec`.`tbl_matricula_AFTER_INSERT`;
DELIMITER $$
USE `db_academia_aiapaec`$$
CREATE DEFINER=`root`@`localhost` TRIGGER `db_academia_aiapaec`.`tbl_matricula_AFTER_INSERT` AFTER INSERT ON `tbl_matricula` FOR EACH ROW
BEGIN
    declare cuotas int ;
    declare costo_cuota decimal(10,2);
    declare contador int DEFAULT 1;
    declare id_costo int;
    declare costo_matricula decimal(10,2);
    DECLARE costos_cursor CURSOR FOR
            select tc.id_costo  from tbl_tarifa tt
            inner join tbl_tarifa_costo ttc on ttc.id_tarifa =tt.id_tarifa 
            inner join tbl_costo tc on tc.id_costo =ttc.id_costo 
            where tt.id_programas_academia = NEW.id_programas_academia;

        -- Handler para manejar el final del cursor

  DECLARE CONTINUE HANDLER FOR NOT FOUND SET id_costo = NULL;
  -- Abrir el cursor
     OPEN costos_cursor;
     SET cuotas =  NEW.cuotas_matricula;
     set costo_matricula=NEW.costo_final_matricula;
     set costo_cuota= costo_matricula/cuotas;
    -- Recorrer el cursor y generar las cuotas de matriculas , carnet y simulacros
     -- Recorrer el cursor y calcular el monto total de los pagos
        read_loop: LOOP
            FETCH costos_cursor INTO id_costo;
            -- matricula
            IF id_costo = 1 THEN
                    SET contador = 1;
                -- Insertar las cuotas para la matrícula recién creada
                    WHILE contador <= cuotas DO
                        INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota, id_matricula) VALUES
                        (contador, costo_cuota, '1', 0, '1', '0000-00-00', NEW.id_matricula);
                        SET contador = contador + 1;
                    END WHILE;
            END IF;
            -- carnet
            IF id_costo = 2 THEN
                INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota, id_matricula) VALUES
                        (1, 10.00, '1', 0, '1', '0000-00-00', NEW.id_matricula);
            END IF;
            -- simulacros
            IF id_costo = 3 THEN
                SET contador = 1;
                
                -- Insertar las cuotas para la matrícula recién creada
                    WHILE contador <= 24 DO
                        INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota, id_matricula) VALUES
                        (contador, 10, '2', 0, '1', '0000-00-00', NEW.id_matricula);
                        SET contador = contador + 1;
                    END WHILE;
            END IF;
        END LOOP;
    
    -- Cerrar el cursor
    CLOSE costos_cursor;
 
END $$
DELIMITER ;
