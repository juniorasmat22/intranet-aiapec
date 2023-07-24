USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_curso_crud $$

CREATE PROCEDURE sp_curso_crud(
  idCurso int,
  nombreCurso varchar(45),
  descripcionCurso varchar(45),
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
		INSERT INTO tbl_curso (nombre_curso, descripcion_curso) VALUES
        (nombreCurso, descripcionCurso);

   end if;

  -- editar
  if opcion=2 then
    UPDATE tbl_curso SET 
    nombre_curso=nombreCurso, 
    descripcion_curso=descripcionCurso 
    WHERE id_curso=idCurso;

  end if;

  -- eliminar
	if opcion=3 then
		DELETE FROM tbl_curso WHERE id_curso=idCurso;

  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_curso where
      (nombre_curso like concat('%',nombreCurso,'%') or nombreCurso is null ) and
      (descripcion_curso like concat('%',descripcionCurso,'%') or descripcionCurso is null)
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_curso),registrosPagina)>0 then floor(count(id_curso) / registrosPagina) +1
          else floor(count(id_curso) / registrosPagina)
            end as paginas
            from tbl_curso where
            (nombre_curso like concat('%',nombreCurso,'%') or nombreCurso is null ) and
            (descripcion_curso like concat('%',descripcionCurso,'%') or descripcionCurso is null) ;

        end if;
  -- get
	if opcion=5 then
		select * from tbl_curso  where id_curso=idCurso;
  end if;
 

END $$
DELIMITER ;
