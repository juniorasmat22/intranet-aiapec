USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_pago_crud $$

CREATE PROCEDURE sp_pago_crud(
    idPago int,
    tipoPago varchar(45),
    operacionPago varchar(45),
    totalPago decimal(10,2),
    reciboPago LONGBLOB,
    estadoPago varchar(45),
    fechaPago date,
    idEstudiante int,
    opcion int,
    pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
		INSERT INTO tbl_pago (tipo_pago, operacion_pago, total_pago, recibo_pago, estado_pago, fecha_pago, id_estudiante) VALUES
        (tipoPago, operacionPago, totalPago, reciboPago, estadoPago, CURRENT_TIMESTAMP(1), idEstudiante);
        select last_insert_id() as ID; 

   end if;

  -- editar
  if opcion=2 then
    UPDATE tbl_pago SET 
        tipo_pago=tipoPago, 
        operacion_pago=operacionPago, 
        total_pago=totalPago, 
        recibo_pago=reciboPago, 
        estado_pago=estadoPago, 
        fecha_pago=fechaPago, 
        id_estudiante=idEstudiante 
    WHERE id_pago=idPago;

  end if;

  -- eliminar
	if opcion=3 then
		DELETE FROM tbl_pago WHERE id_pago=idPago;

  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_pago where
      (tipo_pago like concat('%',tipoPago,'%') or tipoPago is null ) and
      (operacion_pago like concat('%',operacionPago,'%') or operacionPago is null)
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_detalle_pago),registrosPagina)>0 then floor(count(id_detalle_pago) / registrosPagina) +1
          else floor(count(id_detalle_pago) / registrosPagina)
            end as paginas
            from tbl_pago where
            (tipo_pago like concat('%',tipoPago,'%') or tipoPago is null ) and
            (operacion_pago like concat('%',operacionPago,'%') or operacionPago is null) ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_pago  WHERE id_pago=idPago;
  end if;
 

END $$
DELIMITER ;
