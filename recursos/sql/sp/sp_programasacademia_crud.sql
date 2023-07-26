
USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_programasacademia_crud $$

CREATE PROCEDURE sp_programasacademia_crud(
  idProgramasAcademia int,
  nombreProgramasAcademia varchar(45),
  tipoProgramasAcademia varchar(1),
  precioProgramasAcademia decimal(10,2),
  idSemestre int,
  estadoProgramasAcademia int,
  portadaPrograma varchar(45),
  descripcionPrograma varchar(45),
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
        INSERT INTO tbl_programas_academia (nombre_programa_academia, tipo_programa_academia, precio_programa_academia, id_semestre, estado_programas_academia,portada_programa,descripcion_programa) 
        VALUES(nombreProgramasAcademia, tipoProgramasAcademia, precioProgramasAcademia, idSemestre,estadoProgramasAcademia,portadaPrograma,descripcionPrograma);

   end if;

  -- editar
  if opcion=2 then
    UPDATE tbl_programas_academia SET 
    nombre_programa_academia=nombreProgramasAcademia, 
    tipo_programa_academia=tipoProgramasAcademia, 
    precio_programa_academia=precioProgramasAcademia, 
    id_semestre=idSemestre, 
    estado_programas_academia=estadoProgramasAcademia,
    portada_programa=portadaPrograma,
    descripcion_programa=descripcionPrograma
    WHERE id_programas_academia=idProgramasAcademia;

  end if;

  -- eliminar
	if opcion=3 then
		DELETE FROM tbl_programas_academia WHERE id_programas_academia=idProgramasAcademia;

  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_programas_academia  where
      (nombre_programa_academia like concat('%',nombreProgramasAcademia,'%') or nombreProgramasAcademia is null ) 
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_programas_academia),registrosPagina)>0 then floor(count(id_programas_academia) / registrosPagina) +1
          else floor(count(id_programas_academia) / registrosPagina)
            end as paginas
            from tbl_programas_academia where
            (nombre_programa_academia like concat('%',nombreProgramasAcademia,'%') or nombreProgramasAcademia is null )  ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_programas_academia where id_programas_academia=idProgramasAcademia;
  end if;

    -- get programas por semestre
	if opcion=6 then
		select * from tbl_programas_academia where id_semestre=idSemestre;
  end if;

     -- get programas por tipo y semestre activos
	if opcion=7 then
		select * from tbl_programas_academia where id_semestre=idSemestre and tipo_programa_academia=tipoProgramasAcademia and  estado_programas_academia='1';
  end if;  
END $$
DELIMITER ;
