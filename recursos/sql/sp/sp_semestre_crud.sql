
USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_semestre_crud $$

CREATE PROCEDURE sp_semestre_crud(
  idSemestre int,
  nombreSemestre varchar(45),
  duracionSemestre varchar(45),
  fechaInicioSemestre datetime,
  fechaFinSemestre datetime,
  estadoSemestre int,
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
		INSERT INTO tbl_semestre (nombre_semestre, duracion_semestre, fecha_inicio_semestre, fecha_fin_semestre, estado_semestre) 
        VALUES(nombreSemestre, duracionSemestre, fechaInicioSemestre, fechaFinSemestre, estadoSemestre);
   end if;

  -- editar
  if opcion=2 then
    UPDATE tbl_semestre SET 
    nombre_semestre=nombreSemestre, 
    duracion_semestre=duracionSemestre, 
    fecha_inicio_semestre=fechaInicioSemestre, 
    fecha_fin_semestre=fechaFinSemestre, 
    estado_semestre=estadoSemestre
    WHERE id_semestre=idSemestre;

  end if;

  -- eliminar
	if opcion=3 then
		DELETE FROM tbl_semestre WHERE id_semestre=idSemestre;

  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_semestre where
      (nombre_semestre like concat('%',nombreSemestre,'%') or nombreSemestre is null ) and
      (duracion_semestre like concat('%',duracionSemestre,'%') or duracionSemestre is null)
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(rol_id),registrosPagina)>0 then floor(count(rol_id) / registrosPagina) +1
          else floor(count(rol_id) / registrosPagina)
            end as paginas
            from tbl_semestre where
            (nombre_semestre like concat('%',nombreSemestre,'%') or nombreSemestre is null ) and
            (duracion_semestre like concat('%',duracionSemestre,'%') or rol_creador is null) ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_semestre where id_semestre=idSemestre;
  end if;
-- get semestre activo
  	if opcion=6 then
		select * from tbl_semestre where estado_semestre='1';
  end if;

END $$
DELIMITER ;
