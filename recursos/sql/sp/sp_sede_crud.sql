USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_sede_crud $$

CREATE PROCEDURE sp_sede_crud(
  idSede int,
  nombreSede varchar(45),
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
        INSERT INTO tbl_sede (sede_nombre) 
        VALUES(nombreSede);
   end if;

  -- editar
  if opcion=2 then
    UPDATE tbl_sede SET 
    sede_nombre=nombreSede
    WHERE id_sede=idSede;
  end if;

  -- eliminar
	if opcion=3 then
		DELETE FROM tbl_sede WHERE id_sede=idSede;
  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_sede  where
      (sede_nombre like concat('%',nombreSede,'%') or nombreSede is null ) 
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_sede),registrosPagina)>0 then floor(count(id_sede) / registrosPagina) +1
          else floor(count(id_sede) / registrosPagina)
            end as paginas
            from tbl_sede where
            (sede_nombre like concat('%',nombreSede,'%') or nombreSede is null )  ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_sede WHERE id_sede=idSede;
  end if;
  
END $$
DELIMITER ;
