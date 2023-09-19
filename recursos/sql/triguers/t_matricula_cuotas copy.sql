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
    declare fecha_2_cuota date;
    declare fecha_3_cuota date;
    declare fecha_4_cuota date;
    declare semanas int DEFAULT 1;
     SET cuotas =  NEW.cuotas_matricula;
     set costo_matricula=NEW.costo_final_matricula;
     set costo_cuota = costo_matricula/cuotas;
     SET fecha_inicio = '2023-10-31';
     SET fecha_2_cuota = '2023-11-30';
     SET fecha_3_cuota = '2023-12-29';
     SET fecha_4_cuota = '2024-01-31';
                -- Inicio Insertar las cuotas para la matrícula recién creada
                    CASE cuotas
                        WHEN 1 THEN 
                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                            (1, costo_cuota, 'Matrícula', 0, '1', fecha_inicio, costo_cuota,NEW.id_matricula,1);
                        WHEN 2 THEN 
                                CASE costo_matricula
                                    WHEN 800 THEN
                                         INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 500, 'Matrícula', 0, '1', fecha_inicio, 500,NEW.id_matricula,1);
                                         INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 300, 'Matrícula', 0, '1', fecha_2_cuota, 300,NEW.id_matricula,1);
                                    WHEN 1000 THEN
                                         INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 600, 'Matrícula', 0, '1', fecha_inicio, 600,NEW.id_matricula,1);
                                         INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 400, 'Matrícula', 0, '1', fecha_2_cuota, 400,NEW.id_matricula,1);
                                    WHEN 1200 THEN
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 700, 'Matrícula', 0, '1', fecha_inicio, 700,NEW.id_matricula,1);
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 500, 'Matrícula', 0, '1', fecha_2_cuota, 500,NEW.id_matricula,1);
                                    WHEN 1400 THEN
                                        INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 800, 'Matrícula', 0, '1', fecha_inicio, 800,NEW.id_matricula,1);
                                         INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 600, 'Matrícula', 0, '1', fecha_2_cuota, 600,NEW.id_matricula,1);
                                    WHEN 1600 THEN
                                        INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 900, 'Matrícula', 0, '1', fecha_inicio, 900,NEW.id_matricula,1);
                                         INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 700, 'Matrícula', 0, '1', fecha_2_cuota, 700,NEW.id_matricula,1);
                                    WHEN 2200 THEN
                                       INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 1200, 'Matrícula', 0, '1', fecha_inicio, 1200,NEW.id_matricula,1);
                                         INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 1000, 'Matrícula', 0, '1', fecha_2_cuota, 1000,NEW.id_matricula,1);
                                    WHEN 2400 THEN
                                       INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 1400, 'Matrícula', 0, '1', fecha_inicio, 1400,NEW.id_matricula,1);
                                         INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 1000, 'Matrícula', 0, '1', fecha_2_cuota, 1000,NEW.id_matricula,1);
                                END CASE;
                        WHEN 3 THEN 
                                CASE costo_matricula
                                    WHEN 1000 THEN
                                         INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 400, 'Matrícula', 0, '1', fecha_inicio, 400,NEW.id_matricula,1);
                                         INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 300, 'Matrícula', 0, '1', fecha_2_cuota, 300,NEW.id_matricula,1);
                                        INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (3, 300, 'Matrícula', 0, '1', fecha_3_cuota, 300,NEW.id_matricula,1);
                                        
                                    WHEN 1400 THEN
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 500, 'Matrícula', 0, '1', fecha_inicio, 500,NEW.id_matricula,1);
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 450, 'Matrícula', 0, '1', fecha_2_cuota, 450,NEW.id_matricula,1);
                                             INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (3, 450, 'Matrícula', 0, '1', fecha_3_cuota, 450,NEW.id_matricula,1);

                                    WHEN 1600 THEN
                                        INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 600, 'Matrícula', 0, '1', fecha_inicio, 600,NEW.id_matricula,1);
                                         INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 500, 'Matrícula', 0, '1', fecha_2_cuota, 500,NEW.id_matricula,1);
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (3, 500, 'Matrícula', 0, '1', fecha_3_cuota, 500,NEW.id_matricula,1);
                                        
                                    WHEN 2400 THEN
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 850, 'Matrícula', 0, '1', fecha_inicio, 850,NEW.id_matricula,1);
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 800, 'Matrícula', 0, '1', fecha_2_cuota, 800,NEW.id_matricula,1);
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (3, 750, 'Matrícula', 0, '1', fecha_3_cuota, 750,NEW.id_matricula,1);
                                END CASE;
                        WHEN 4 THEN 
                                CASE costo_matricula
                                    WHEN 1000 THEN
                                         INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 400, 'Matrícula', 0, '1', fecha_inicio, 400,NEW.id_matricula,1);
                                         INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 200, 'Matrícula', 0, '1', fecha_2_cuota, 200,NEW.id_matricula,1);
                                        INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (3, 200, 'Matrícula', 0, '1', fecha_3_cuota, 200,NEW.id_matricula,1);
                                        INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (4, 200, 'Matrícula', 0, '1', fecha_4_cuota, 200,NEW.id_matricula,1);
                                    WHEN 1400 THEN
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 500, 'Matrícula', 0, '1', fecha_inicio, 500,NEW.id_matricula,1);
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 300, 'Matrícula', 0, '1', fecha_2_cuota, 300,NEW.id_matricula,1);
                                             INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (3, 300, 'Matrícula', 0, '1', fecha_3_cuota, 300,NEW.id_matricula,1);
                                        INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (4, 300, 'Matrícula', 0, '1', fecha_4_cuota, 300,NEW.id_matricula,1);
                                    WHEN 1600 THEN
                                        INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 550, 'Matrícula', 0, '1', fecha_inicio, 550,NEW.id_matricula,1);
                                         INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 350, 'Matrícula', 0, '1', fecha_2_cuota, 350,NEW.id_matricula,1);
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (3, 350, 'Matrícula', 0, '1', fecha_3_cuota, 350,NEW.id_matricula,1);
                                        INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (4, 350, 'Matrícula', 0, '1', fecha_4_cuota, 350,NEW.id_matricula,1);
                                    WHEN 2400 THEN
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (1, 750, 'Matrícula', 0, '1', fecha_inicio, 750,NEW.id_matricula,1);
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (2, 550, 'Matrícula', 0, '1', fecha_2_cuota, 550,NEW.id_matricula,1);
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (3, 550, 'Matrícula', 0, '1', fecha_3_cuota, 550,NEW.id_matricula,1);
                                            INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                                            (4, 550, 'Matrícula', 0, '1', fecha_4_cuota, 550,NEW.id_matricula,1);
                                END CASE;
                    END CASE;

                 -- Fin Insertar las cuotas para la matrícula recién creada 
                    INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) VALUES
                        (1, 10.00, 'Carnet', 0, '1', '0000-00-00',10.00, NEW.id_matricula,2);
           
                SET contador = 1;
                CASE
                WHEN  NEW.id_programas_academia IN ('6','7','8','9','10') THEN set semanas=24;
                WHEN  NEW.id_programas_academia IN ('10') THEN set semanas=46;
                WHEN  NEW.id_programas_academia IN ('11') THEN set semanas=16;
                ELSE
                set semanas=0;
                END CASE;
                
                -- Insertar las cuotas para la matrícula recién creada
                    WHILE contador <= semanas DO
                        INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota, total_cuota ,id_matricula,id_costo) VALUES
                        (contador, 10.00, 'Simulacro', 0, '1', '0000-00-00',10.00, NEW.id_matricula,3);
                        SET contador = contador + 1;
                    END WHILE;
 

 
END $$
DELIMITER ;
