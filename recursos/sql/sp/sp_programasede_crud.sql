
USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_programasede_crud $$

CREATE PROCEDURE sp_programasede_crud(
  idProgramaSede int,
  idProgramasAcademia int,
  idSede int,
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
        INSERT INTO tbl_programa_sede (id_programas_academia, id_sede) 
        VALUES(idProgramasAcademia, idSede);
   end if;

  -- editar
  if opcion=2 then
    UPDATE tbl_programa_sede SET 
    id_programas_academia=idProgramasAcademia, 
    id_sede=idSede
    WHERE id_programa_sede=idProgramaSede;


  end if;

  -- eliminar
	if opcion=3 then
		DELETE FROM tbl_programa_sede WHERE id_programa_sede=idProgramaSede;
  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_programa_sede  where
      (id_sede like concat('%',idSede,'%') or idSede is null ) 
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_programa_sede),registrosPagina)>0 then floor(count(id_programa_sede) / registrosPagina) +1
          else floor(count(id_programa_sede) / registrosPagina)
            end as paginas
            from tbl_programa_sede where
            (id_sede like concat('%',idSede,'%') or idSede is null )  ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_programa_sede  WHERE id_programa_sede=idProgramaSede;
  end if;

    -- get programas por sede
	if opcion=6 then
		select * from tbl_programas_academia where id_sede=idSede;
  end if;
  
END $$
DELIMITER ;
