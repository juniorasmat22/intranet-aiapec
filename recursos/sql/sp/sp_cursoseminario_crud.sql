USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_cursoseminario_crud $$

CREATE PROCEDURE sp_cursoseminario_crud(
  idCursoSeminario int,
  fechaCursoSeminario datetime,
  idSeminario int,
  idCurso int,
  horaInicioCursoSeminario datetime,
  horaFinCursoSeminario datetime,
  docenteCursoSeminario varchar(45),
  fotoDocenteCursoSeminario varchar(45),
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
		INSERT INTO tbl_curso_seminario (fecha_curso_seminario, id_seminario, id_curso, hora_inicio_curso_seminario, hora_fin_curso_seminario, docente_curso_seminario, foto_docente_curso_seminario)
         VALUES(CURRENT_TIMESTAMP(1), idSeminario, idCurso, horaInicioCursoSeminario, horaFinCursoSeminario, docenteCursoSeminario,fotoDocenteCursoSeminario);
   end if;

  -- editar
  if opcion=2 then
        UPDATE tbl_curso_seminario SET 
        id_seminario=idSeminario, 
        id_curso=idCurso, 
        hora_inicio_curso_seminario=horaInicioCursoSeminario, 
        hora_fin_curso_seminario=horaFinCursoSeminario, 
        docente_curso_seminario=docenteCursoSeminario, 
        foto_docente_curso_seminario=fotoDocenteCursoSeminario 
    WHERE id_curso_seminario=idCursoSeminario;

  end if;

  -- eliminar
	if opcion=3 then
		DELETE FROM tbl_curso_seminario WHERE id_curso_seminario=idCursoSeminario;
  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_curso_seminario where
      (docente_curso_seminario like concat('%',docenteCursoSeminario,'%') or docenteCursoSeminario is null ) 
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_curso_seminario),registrosPagina)>0 then floor(count(id_curso_seminario) / registrosPagina) +1
          else floor(count(id_curso_seminario) / registrosPagina)
            end as paginas
            from tbl_curso_seminario where
            (docente_curso_seminario like concat('%',docenteCursoSeminario,'%') or docenteCursoSeminario is null ) ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_curso_seminario  where id_curso_seminario=idCursoSeminario;
  end if;
-- get curso x seminarios
  	if opcion=6 then
		select * from tbl_curso_seminario  where  id_seminario=idSeminario;
  end if;
 

END $$
DELIMITER ;
