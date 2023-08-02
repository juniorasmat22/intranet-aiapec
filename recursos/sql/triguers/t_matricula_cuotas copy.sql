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
    declare fecha_inicio date;
    declare semanas int DEFAULT 1;
     SET cuotas =  NEW.cuotas_matricula;
     set costo_matricula=NEW.costo_final_matricula;
     set costo_cuota = costo_matricula/cuotas;
     SET fecha_inicio = '2023-08-01';

                -- Insertar las cuotas para la matrícula recién creada
                    WHILE contador <= cuotas DO
                    SET fecha_inicio= DATE_ADD(fecha_inicio, INTERVAL 30 DAY);
                        INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota, id_matricula,id_costo) VALUES
                        (contador, costo_cuota, 'Matrícula', 0, '1', fecha_inicio, NEW.id_matricula,1);
                        SET contador = contador + 1;
                        
                    END WHILE;

                    INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota, id_matricula,id_costo) VALUES
                        (1, 10.00, 'Carnet', 0, '1', '0000-00-00', NEW.id_matricula,2);
           
                SET contador = 1;
                CASE
                WHEN  NEW.id_programas_academia IN ('3') THEN set semanas=24;
                WHEN  NEW.id_programas_academia IN ('4','5') THEN set semanas=32;
                ELSE
                set semanas=0;
                END CASE;
                
                -- Insertar las cuotas para la matrícula recién creada
                    WHILE contador <= semanas DO
                        INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota, id_matricula,id_costo) VALUES
                        (contador, 10, 'Simulacro', 0, '1', '0000-00-00', NEW.id_matricula,3);
                        SET contador = contador + 1;
                    END WHILE;
 

 
END $$
DELIMITER ;
