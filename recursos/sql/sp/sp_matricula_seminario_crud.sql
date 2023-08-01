USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_matricula_seminario_crud $$

CREATE PROCEDURE sp_matricula_seminario_crud(
  idMatSeminario int,
  idEstudiante int,
  idSeminario int,
  fechaMatSeminario datetime,
  montoSeminario decimal(10,2),
  tipoPago varchar(45),
  operacion varchar(45),
  recibo varchar(45),
  estado int,
  opcion int,
  pagina int
)
BEGIN

  declare registrosPagina int;
  declare limiteInferior int;

 -- crear
	if opcion=1 then
       INSERT INTO tbl_mat_seminario (id_estudiante, id_seminario, fecha_mat_seminario, monto_mat_seminario, tipo_pago_mat_seminario, operacion, recibo, estado) 
       VALUES(idEstudiante, idSeminario, CURRENT_TIMESTAMP(1),montoSeminario, tipoPago, operacion, recibo, estado);

   end if;

  -- editar
  if opcion=2 then
   UPDATE tbl_mat_seminario SET 
    id_estudiante=idEstudiante, 
    id_seminario=idSeminario,
    monto_mat_seminario=montoSeminario,
    tipo_pago_mat_seminario=tipoPago,
    operacion=operacion, 
    recibo=recibo, 
    estado=estado
    WHERE id_mat_seminario=idMatSeminario;
  end if;

  -- eliminar
	if opcion=3 then
	 DELETE FROM tbl_mat_seminario WHERE id_mat_seminario=idMatSeminario;
  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_mat_seminario  where
      (tipo_pago_mat_seminario like concat('%',tipoPago,'%') or tipoPago is null ) 
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_mat_seminario),registrosPagina)>0 then floor(count(id_mat_seminario) / registrosPagina) +1
          else floor(count(id_mat_seminario) / registrosPagina)
            end as paginas
            from tbl_mat_seminario where
            (tipo_pago_mat_seminario like concat('%',tipoPago,'%') or tipoPago is null ) ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_mat_seminario where id_mat_seminario=idMatSeminario;
  end if;

      -- get matriculas seminarios por estudiante 
	if opcion=6 then
		select * from tbl_mat_seminario where  id_estudiante=idEstudiante;
  end if;


END $$
DELIMITER ;
