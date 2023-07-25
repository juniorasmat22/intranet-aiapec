USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_nivelp_crud $$

CREATE PROCEDURE sp_nivelp_crud(
  idNivelp int,
  descripcionNivelp varchar(45),
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
        INSERT INTO tbl_nivelp (descripcion_nivelp) 
        VALUES (descripcionNivelp);
		
   end if;

  -- editar
  if opcion=2 then
    UPDATE tbl_nivelp 
    SET descripcion_nivelp=descripcionNivelp
     WHERE id_nivelp=idNivelp;

  end if;

  -- eliminar
	if opcion=3 then
		DELETE FROM tbl_nivelp WHERE id_nivelp=idNivelp;
  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_nivelp  where
      (descripcion_nivelp like concat('%',descripcionNivelp,'%') or descripcionNivelp is null ) 
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_nivelp),registrosPagina)>0 then floor(count(id_nivelp) / registrosPagina) +1
          else floor(count(id_nivelp) / registrosPagina)
            end as paginas
            from tbl_nivelp where
            (descripcion_nivelp like concat('%',descripcionNivelp,'%') or descripcionNivelp is null )  ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_nivelp where id_nivelp=idNivelp;
  end if;
  
END $$
DELIMITER ;
