use gerencia;
DELIMITER $$

DROP procedure if exists sp_rol_crud $$

CREATE PROCEDURE sp_rol_crud(
  rol_id int,
  rol_descripcion varchar(45),
  rol_creador varchar(45),
  rol_fecha_creacion datetime,
  rol_usu_actualiza int,
  rol_fecha_actualizacion datetime,
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
		insert rol
      (rol_descripcion,rol_creador,rol_fecha_creacion,rol_usu_actualiza,rol_fecha_actualizacion)
		values (rol_descripcion,rol_creador,rol_fecha_creacion,rol_usu_actualiza,rol_fecha_actualizacion);
   end if;

  -- editar
  if opcion=2 then
    update rol r set
      r.rol_descripcion=rol_descripcion,
      r.rol_usu_actualiza=rol_usu_actualiza,
      r.rol_fecha_actualizacion=rol_fecha_actualizacion
    where r.rol_id = rol_id;
  end if;

  -- eliminar
	if opcion=3 then
		delete from rol  where rol_id = rol_id;
  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from rol where
      (rol_descripcion like concat('%',rol_descripcion,'%') or rol_descripcion is null ) and
      (rol_creador like concat('%',rol_creador,'%') or rol_creador is null)
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(rol_id),registrosPagina)>0 then floor(count(rol_id) / registrosPagina) +1
          else floor(count(rol_id) / registrosPagina)
            end as paginas
            from rol where
            (rol_descripcion like concat('%',rol_descripcion,'%') or rol_descripcion is null ) and
            (rol_creador like concat('%',rol_creador,'%') or rol_creador is null) ;

        end if;
  -- get
	if opcion=5 then
		select * from rol r where r.rol_id = rol_id;
  end if;

END $$
DELIMITER ;
