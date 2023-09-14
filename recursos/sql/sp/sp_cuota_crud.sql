USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_cuota_crud $$

CREATE PROCEDURE sp_cuota_crud(
  idCuota int,
  nroCuota int,
  montoCuota decimal(10,2),
  tipoCuota varchar(45),
  descuentoCuota decimal(10,2),
  estadoCuota varchar(1),
  fechaVencimientoCuota date,
  totalCuota decimal(10,2),
  idMatricula int,
  idCosto int,
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
		INSERT INTO tbl_cuota (nro_cuota, monto_cuota, tipo_cuota, descuento_cuota, estado_cuota, fecha_vencimiento_cuota,total_cuota, id_matricula,id_costo) 
        VALUES(nroCuota, montoCuota, tipoCuota, descuentoCuota, 1, fechaVencimientoCuota,totalCuota, idMatricula,idCosto);




   end if;

  -- editar
  if opcion=2 then
    UPDATE tbl_cuota SET 
    nro_cuota=nroCuota, 
    monto_cuota=montoCuota, 
    tipo_cuota=tipoCuota, 
    descuento_cuota=descuentoCuota, 
    estado_cuota=estadoCuota, 
    fecha_vencimiento_cuota=fechaVencimientoCuota, 
    id_matricula=idMatricula ,
    id_costo=idCosto
    WHERE id_cuota=idCuota;

  end if;

  -- eliminar
	if opcion=3 then
		DELETE FROM tbl_cuota WHERE id_cuota=idCuota;

  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_cuota where
      (nro_cuota like concat('%',nroCuota,'%') or nroCuota is null ) and
      (tipo_cuota like concat('%',tipoCuota,'%') or tipoCuota is null)
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_cuota),registrosPagina)>0 then floor(count(id_cuota) / registrosPagina) +1
          else floor(count(id_cuota) / registrosPagina)
            end as paginas
            from tbl_cuota where
            (nro_cuota like concat('%',nroCuota,'%') or nroCuota is null ) and
            (tipo_cuota like concat('%',tipoCuota,'%') or tipoCuota is null) ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_cuota WHERE id_cuota=idCuota;
  end if;
 
   -- GET Cuotas por matricula
	if opcion=6 then
		select * from tbl_cuota WHERE id_matricula=idMatricula and id_costo=idCosto;
  end if;


     -- actualizar el precio para estudiantes aiapaec
	if opcion=7 then
		UPDATE tbl_cuota 
    SET 
    monto_cuota=6, 
    total_cuota=6
    WHERE id_matricula=idMatricula and id_costo=idCosto;
  end if;
END $$
DELIMITER ;
