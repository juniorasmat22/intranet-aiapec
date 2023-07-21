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
  estadoEstudiante int,
  idUsuario int,
  fechaRegistroEstudiante datetime,
  dniApoderadoEstudiante varchar(10),
  tipoEstudiante varchar(1),
  fechaNacimientoEstudiante date,
  edadEstudiante int,
  situacionEstudiante varchar(45),
  tycEstudiante varchar(1),
  sexoEstudiante varchar(1),
  datosUpdated varchar(1),
  opcion int,
  pagina int
)
BEGIN

  declare registrosPagina int;
  declare limiteInferior int;

      if opcion = 1 then
            INSERT INTO tbl_estudiante (tipodocumento_estudiante, numerodocumento_estudiante, nombres_estudiante, apellidos_estudiante, correo_estudiante, celular_estudiante, direccion_estudiante, estado_estudiante, dni_apoderado, nombre_apoderado, apellido_apoderado, correo_apoderado, celular_apoderado, id_usuario, fecha_registro_estudiante, tipo_estudiante, correo_corporativo_estudiante, password_corporativo_estudiante, fecha_nacimiento_estudiante, edad_estudiante, situacion_estudiante, tyc_estudiante, sexo_estudiante, datos_update) 
            VALUES(tipodocumentoEstudiante, numerodocumentoEstudiante, nombresEstudiante, apellidoEstudiante, correoEstudiante, celularEstudiante, direccionEstudiante, 1, dniApoderadoEstudiante, nombreApoderadoEstudiante, apellidoApoderadoEstudiante, correoApoderadoEstudiante, celularApoderadoEstudiante, idUsuario, CURRENT_TIMESTAMP(1), tipoEstudiante, '', '', fechaNacimientoEstudiante, edadEstudiante,situacionEstudiante, tycEstudiante, sexoEstudiante, datosUpdated);

      end if;
      if opcion = 2 then
           UPDATE tbl_estudiante SET 
            tipodocumento_estudiante=tipodocumentoEstudiante, 
            nombres_estudiante=nombresEstudiante, 
            apellidos_estudiante=apellidoEstudiante, 
            correo_estudiante=correoEstudiante, 
            celular_estudiante=celularEstudiante, 
            direccion_estudiante=direccionEstudiante, 
            estado_estudiante=estadoEstudiante, 
            dni_apoderado=dniApoderadoEstudiante, 
            nombre_apoderado=nombreApoderadoEstudiante, 
            apellido_apoderado=apellidoApoderadoEstudiante, 
            correo_apoderado=correoApoderadoEstudiante, 
            celular_apoderado=celularApoderadoEstudiante, 
            id_usuario=idUsuario, 
            tipo_estudiante=tipoEstudiante,  
            fecha_nacimiento_estudiante=fechaNacimientoEstudiante, 
            edad_estudiante=edadEstudiante, 
            situacion_estudiante=situacionEstudiante, 
            tyc_estudiante=tycEstudiante, 
            sexo_estudiante=sexoEstudiante, 
            datos_update=datosUpdated 
          WHERE numerodocumento_estudiante=numerodocumentoEstudiante;

      end if;
      if opcion=3 then
       DELETE FROM db_academia_aiapaec.tbl_estudiante WHERE numerodocumento_estudiante=numerodocumentoEstudiante;
      end if;
      if opcion =4 then
        set registrosPagina=10;
		    set limiteInferior=(pagina-1)*registrosPagina;

        select * from tbl_estudiante where
          (apellidos_estudiante like concat('%',apellidoEstudiante,'%') or apellidoEstudiante is null ) and
          (nombres_estudiante like concat('%',nombresEstudiante,'%') or nombresEstudiante is null)
        limit limiteInferior,registrosPagina;

        -- numero de paginas
          select
            case
            when mod(count(id_estudiante),registrosPagina)>0 then floor(count(id_estudiante) / registrosPagina) +1
                else floor(count(id_estudiante) / registrosPagina)
                  end as paginas
                  from tbl_estudiante where
                  (apellidos_estudiante like concat('%',apellidoEstudiante,'%') or apellidoEstudiante is null ) and
                  (nombres_estudiante like concat('%',nombresEstudiante,'%') or nombresEstudiante is null) ;
      end if;
    if opcion = 5 then
      select e.* from tbl_estudiante e 
      where e.numerodocumento_estudiante=numerodocumentoEstudiante;
    end if;
   

END $$
DELIMITER ;
