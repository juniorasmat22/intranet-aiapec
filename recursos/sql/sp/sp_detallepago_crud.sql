USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_detallepago_crud $$

CREATE PROCEDURE sp_detallepago_crud(
  idDetallePago int,
  conceptoPago varchar(45),
  montoPago decimal(10,2),
  idPago int,
  idCuota int,
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
		INSERT INTO tbl_detalle_pago (concepto_pago, monto_pago, id_pago, id_cuota) 
        VALUES(conceptoPago, montoPago, idPago, idCuota);


   end if;

  -- editar
  if opcion=2 then
    UPDATE tbl_detalle_pago SET 
        concepto_pago=conceptoPago, 
        monto_pago=montoPago, 
        id_pago=idPago, 
        id_cuota=idCuota 
    WHERE id_detalle_pago=idDetallePago;
  end if;

  -- eliminar
	if opcion=3 then
		DELETE FROM tbl_detalle_pago WHERE id_detalle_pago=idDetallePago;

  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_detalle_pago where
      (concepto_pago like concat('%',conceptoPago,'%') or conceptoPago is null ) and
      (monto_pago like concat('%',montoPago,'%') or montoPago is null)
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_detalle_pago),registrosPagina)>0 then floor(count(id_detalle_pago) / registrosPagina) +1
          else floor(count(id_detalle_pago) / registrosPagina)
            end as paginas
            from tbl_detalle_pago where
            (concepto_pago like concat('%',conceptoPago,'%') or conceptoPago is null ) and
            (monto_pago like concat('%',montoPago,'%') or montoPago is null) ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_detalle_pago  where id_detalle_pago=idDetallePago;
  end if;
 

END $$
DELIMITER ;
