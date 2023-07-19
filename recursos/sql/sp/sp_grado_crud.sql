USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_grado_crud $$

CREATE PROCEDURE sp_grado_crud(
  idGrado int,
  descripcionGrado varchar(45),
  idNivel int,
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
       INSERT INTO tbl_grado (descripcion_grado, id_nivel) 
       VALUES(descripcionGrado, idNivel);
   end if;

  -- editar
  if opcion=2 then
    UPDATE db_academia_aiapaec.tbl_grado SET 
    descripcion_grado=descripcionGrado, 
    id_nivel=idNivel 
    WHERE id_grado=idGrado;

  end if;

  -- eliminar
	if opcion=3 then
	 DELETE FROM tbl_grado WHERE id_grado=idGrado;
  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_grado  where
      (descripcion_grado like concat('%',descripcionGrado,'%') or descripcionGrado is null ) 
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_grado),registrosPagina)>0 then floor(count(id_grado) / registrosPagina) +1
          else floor(count(id_grado) / registrosPagina)
            end as paginas
            from tbl_grado where
            (descripcion_grado like concat('%',descripcionGrado,'%') or descripcionGrado is null ) ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_grado where id_grado=idGrado;
  end if;

      -- get grado por nivel
	if opcion=6 then
		select * from tbl_grado where id_nivel=idNivel;
  end if;
  
END $$
DELIMITER ;
