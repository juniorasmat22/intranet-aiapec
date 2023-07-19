USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_nivel_crud $$

CREATE PROCEDURE sp_nivel_crud(
  idNivel int,
  descripcionNivel varchar(45),
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
        INSERT INTO tbl_nivel (nivel_descripcion) 
        VALUES (descripcionNivel);
		
   end if;

  -- editar
  if opcion=2 then
    UPDATE tbl_nivel 
    SET nivel_descripcion=descripcionNivel
     WHERE id_nivel=idNivel;

  end if;

  -- eliminar
	if opcion=3 then
		DELETE FROM tbl_nivel WHERE id_nivel=idNivel;
  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_nivel  where
      (nivel_descripcion like concat('%',descripcionNivel,'%') or descripcionNivel is null ) 
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_nivel),registrosPagina)>0 then floor(count(id_nivel) / registrosPagina) +1
          else floor(count(id_nivel) / registrosPagina)
            end as paginas
            from tbl_nivel where
            (nivel_descripcion like concat('%',descripcionNivel,'%') or descripcionNivel is null )  ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_nivel where id_nivel=idNivel;
  end if;
  
END $$
DELIMITER ;
