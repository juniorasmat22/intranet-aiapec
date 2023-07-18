USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_estudiante_crud $$

CREATE PROCEDURE sp_estudiante_crud(
  idEstudiante int,
  tipodocumentoEstudiante varchar(21),
  numerodocumentoEstudiante varchar(12),
  apellidoEstudiante varchar(45),
  nombresEstudiante varchar(45),
  correoEstudiante varchar(45),
  celularEstudiante varchar(45),
  direccionEstudiante varchar(45),
  nombreApoderadoEstudiante varchar(45),
  apellidoApoderadoEstudiante varchar(45),
  correoApoderadoEstudiante varchar(45),
  celularApoderadoEstudiante varchar(45),
  modalidadEstudiante varchar(45),
  estadoEstudiante int,
  idCarrera int,
  idUsuario int,
  fechaRegistroEstudiante datetime,
  dniApoderadoEstudiante varchar(10),
  tipoEstudiante varchar(1),
  fechaNacimientoEstudiante date,
  edadEstudiante int,
  idGrado int,
  colegioEstudiante varchar(100),
  situacionEstudiante varchar(45),
  tycEstudiante varchar(1),
  sexoEstudiante varchar(1),
  datosUpdated varchar(1),
  passEstudiante varchar(100),
  opcion int,
  pagina int
)
BEGIN

  declare idUsuario_db INT DEFAULT 0;
  declare idestudiante_db INT DEFAULT 0;


      if opcion = 1 then
            INSERT INTO tbl_usuario (nombre_usuario, password_usuario, estado_usuario, fecha_registro_usuario) 
                VALUES(numerodocumentoEstudiante, passEstudiante, 1, fechaRegistroEstudiante);
                  SET idUsuario_db = LAST_INSERT_ID();
                  IF idUsuario_db > 0 THEN
                      INSERT INTO tbl_estudiante ( tipodocumento_estudiante,numerodocumento_estudiante, nombres_estudiante, apellidos_estudiante, correo_estudiante, celular_estudiante, direccion_estudiante, estado_estudiante, dni_apoderado,nombre_apoderado, apellido_apoderado, correo_apoderado, celular_apoderado, id_usuario, fecha_registro_estudiante,fecha_nacimiento_estudiante, edad_estudiante,situacion_estudiante,tyc_estudiante,sexo_estudiante,datos_update) 
                      VALUES(tipodocumentoEstudiante,numerodocumentoEstudiante, nombresEstudiante, apellidoEstudiante, correoEstudiante, celularEstudiante, direccionEstudiante, 1,dniApoderadoEstudiante,nombreApoderadoEstudiante, apellidoApoderadoEstudiante, correoApoderadoEstudiante, celularApoderadoEstudiante, idUsuario_db, fechaRegistroEstudiante, fechaNacimientoEstudiante, edadEstudiante,situacionEstudiante,tycEstudiante,sexoEstudiante,datosUpdated);
                      SET idestudiante_db = LAST_INSERT_ID();
                        IF idestudiante_db > 0 THEN
                          IF situacionEstudiante = 'Estudiante Escolar' THEN
                              INSERT INTO tbl_escolar (id_estudiante, id_grado, colegio_escolar) 
                              VALUES(idestudiante_db, idGrado, colegioEstudiante);
                          ELSE
                              INSERT INTO tbl_pre (id_carrera, id_estudiante, modalidad_estudiante) 
                              VALUES(idCarrera, idestudiante_db, modalidadEstudiante);
                          END IF;
                        END IF;
                  END IF; 
      end if;
    if opcion = 5 then
      select e.* from tbl_estudiante e 
      inner join tbl_usuario u on u.nombre_usuario=e.numerodocumento_estudiante 
      where u.nombre_usuario = numerodocumentoEstudiante;
    end if;
    if opcion = 6 then
              INSERT INTO tbl_usuario (nombre_usuario, password_usuario, estado_usuario, fecha_registro_usuario) 
                VALUES(numerodocumentoEstudiante, passEstudiante, 1, CURRENT_TIMESTAMP(1));
                SET idUsuario_db = LAST_INSERT_ID();
                    IF idUsuario_db > 0 THEN
                      INSERT INTO tbl_estudiante ( tipodocumento_estudiante,numerodocumento_estudiante, nombres_estudiante, apellidos_estudiante, correo_estudiante, celular_estudiante, direccion_estudiante, estado_estudiante, dni_apoderado,nombre_apoderado, apellido_apoderado, correo_apoderado, celular_apoderado, id_usuario, fecha_registro_estudiante,fecha_nacimiento_estudiante, edad_estudiante,situacion_estudiante,tyc_estudiante,sexo_estudiante,datos_update) 
                      VALUES(tipodocumentoEstudiante,numerodocumentoEstudiante, nombresEstudiante, apellidoEstudiante, correoEstudiante, celularEstudiante, direccionEstudiante, 1,dniApoderadoEstudiante,nombreApoderadoEstudiante, apellidoApoderadoEstudiante, correoApoderadoEstudiante, celularApoderadoEstudiante, idUsuario_db, CURRENT_TIMESTAMP(1), fechaNacimientoEstudiante, edadEstudiante,situacionEstudiante,tycEstudiante,sexoEstudiante,0);
                    END IF;
    end if;

END $$
DELIMITER ;
