USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_costo_crud $$

CREATE PROCEDURE sp_costo_crud(
  idCosto int,
  nombreCosto varchar(45),
  tipoCosto varchar(1),
  estadoCosto int,
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
		INSERT INTO tbl_costo (nombre_costo, tipo_costo, estado_costo) 
        VALUES(nombreCosto, tipoCosto, 1);


   end if;

  -- editar
  if opcion=2 then
    UPDATE tbl_costo SET 
    nombre_costo=nombreCosto, 
    tipo_costo=tipoCosto, 
    estado_costo=estadoCosto
    WHERE id_costo=idCosto;


  end if;

  -- eliminar
	if opcion=3 then
		DELETE FROM tbl_costo WHERE id_costo=idCosto;

  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_costo where
      (nombre_costo like concat('%',nombreCosto,'%') or nombreCosto is null ) and
      (tipo_costo like concat('%',tipoCosto,'%') or tipoCosto is null)
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_costo),registrosPagina)>0 then floor(count(id_costo) / registrosPagina) +1
          else floor(count(id_costo) / registrosPagina)
            end as paginas
            from tbl_costo where
            (nombre_costo like concat('%',nombreCosto,'%') or nombreCosto is null ) and
            (tipo_costo like concat('%',tipoCosto,'%') or tipoCosto is null) ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_costo  where id_costo=idCosto;
  end if;
 

END $$
DELIMITER ;
