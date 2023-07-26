
USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_programanivel_crud $$

CREATE PROCEDURE sp_programanivel_crud(
  idProgramaNivel int,
  descripcionProgramaNivel varchar(1),
  idProgramasAcademia int,
  idNivelp int,
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
        INSERT INTO tbl_programa_nivel (decripcion_programa_nivel, id_programas_academia, id_nivelp) 
        VALUES(descripcionProgramaNivel, idProgramasAcademia, idNivelp);
   end if;

  -- editar
  if opcion=2 then
   UPDATE tbl_programa_nivel SET 
   decripcion_programa_nivel=descripcionProgramaNivel, 
   id_programas_academia=idProgramasAcademia, 
   id_nivelp=idNivelp
   WHERE id_programa_nivel=idProgramaNivel;
  end if;

  -- eliminar
	if opcion=3 then
		DELETE FROM tbl_programa_nivel WHERE id_programa_nivel=idProgramaNivel;

  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_programa_nivel  where
      (decripcion_programa_nivel like concat('%',descripcionProgramaNivel,'%') or descripcionProgramaNivel is null ) 
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_programa_nivel),registrosPagina)>0 then floor(count(id_programa_nivel) / registrosPagina) +1
          else floor(count(id_programa_nivel) / registrosPagina)
            end as paginas
            from tbl_programa_nivel where
            (decripcion_programa_nivel like concat('%',descripcionProgramaNivel,'%') or descripcionProgramaNivel is null )  ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_programa_nivel where id_programa_nivel=idProgramaNivel;
  end if;

    -- get programas por nivel
	if opcion=6 then
		 select tpn.*,tn.descripcion_nivelp  from tbl_programa_nivel tpn 
      inner  join tbl_nivelp tn on tn.id_nivelp = tpn.id_nivelp
      where tpn.id_programas_academia=idProgramasAcademia;
  end if;
  
END $$
DELIMITER ;
