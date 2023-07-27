USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_matricula_crud $$

CREATE PROCEDURE sp_matricula_crud(
  idMatricula int,
  idProgramaAcademia int,
  programaNivel int,
  programaSede int,
  cuotasMatricula int,
  costoOriginalMatricula decimal(10,2),
  descuentoMatricula decimal(10,2),
  promocionMatricula varchar(50),
  costoFinalMatricula decimal(10,2),
  fechaMatricula datetime,
  deudaMatricula decimal(10,2),
  estadoMatricula int,
  idEstudiante int,
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
       INSERT INTO tbl_matricula (id_programas_academia, programa_nivel, programa_sede, cuotas_matricula, costo_original_matricula, descuento_matricula, promocion_matricula, costo_final_matricula, fecha_matricula, deuda_matricula, estado_matricula,id_estudiante) 
       VALUES(idProgramaAcademia, programaNivel, programaSede, cuotasMatricula, costoOriginalMatricula,descuentoMatricula, promocionMatricula,costoFinalMatricula, CURRENT_TIMESTAMP(1), deudaMatricula, 1,idEstudiante);
   end if;

  -- editar
  if opcion=2 then
    UPDATE tbl_matricula SET 
    id_programas_academia=idProgramaAcademia, 
    programa_nivel=programaNivel, 
    programa_sede=programaSede, 
    cuotas_matricula=cuotasMatricula, 
    costo_original_matricula=costoOriginalMatricula, 
    descuento_matricula=descuentoMatricula, 
    promocion_matricula=promocionMatricula, 
    costo_final_matricula=costoFinalMatricula,
    deuda_matricula=deudaMatricula, 
    estado_matricula=estadoMatricula,
    id_estudiante=idEstudiante
    WHERE id_matricula=idMatricula;
  end if;

  -- eliminar
	if opcion=3 then
	 DELETE FROM tbl_matricula WHERE id_matricula=idMatricula;
  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_matricula  where
      (promocion_matricula like concat('%',promocionMatricula,'%') or promocionMatricula is null ) 
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_matricula),registrosPagina)>0 then floor(count(id_matricula) / registrosPagina) +1
          else floor(count(id_matricula) / registrosPagina)
            end as paginas
            from tbl_matricula where
            (promocion_matricula like concat('%',promocionMatricula,'%') or promocionMatricula is null ) ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_matricula where id_matricula=idMatricula;
  end if;

      -- get matricula por programa , sede y nivel
	if opcion=6 then
		select * from tbl_matricula  where id_programas_academia=idProgramaAcademia;
  end if;
  -- GET MATRICULA POR ESTUDIANTE
  if opcion=7 then
		select * from tbl_matricula  where id_estudiante=idEstudiante;
  end if;
  
END $$
DELIMITER ;
