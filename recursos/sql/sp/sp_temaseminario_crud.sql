USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_temaseminario_crud $$

CREATE PROCEDURE sp_temaseminario_crud(
  idTemaSeminario int,
  nroTemaSeminario varchar(03),
  nombreTemaSeminario varchar(45),
  idCursoSeminario int,
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
		INSERT INTO tbl_tema_seminario (nro_tema_seminario, nombre_tema_seminario, id_curso_seminario) 
        VALUES(nroTemaSeminario, nombreTemaSeminario, idCursoSeminario);

   end if;

  -- editar
  if opcion=2 then
    UPDATE tbl_tema_seminario SET 
    nro_tema_seminario=nroTemaSeminario, 
    nombre_tema_seminario=nombreTemaSeminario, 
    id_curso_seminario=idCursoSeminario 
    WHERE id_tema_seminario=idTemaSeminario;


  end if;

  -- eliminar
	if opcion=3 then
		DELETE FROM tbl_tema_seminario WHERE id_tema_seminario=idTemaSeminario;

  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_tema_seminario where
      (nro_tema_seminario like concat('%',nroTemaSeminario,'%') or nroTemaSeminario is null ) and
      (nombre_tema_seminario like concat('%',nombreTemaSeminario,'%') or nombreTemaSeminario is null)
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(id_tema_seminario),registrosPagina)>0 then floor(count(id_tema_seminario) / registrosPagina) +1
          else floor(count(id_tema_seminario) / registrosPagina)
            end as paginas
            from tbl_tema_seminario where
            (nro_tema_seminario like concat('%',nroTemaSeminario,'%') or nroTemaSeminario is null ) and
            (nombre_tema_seminario like concat('%',nombreTemaSeminario,'%') or nombreTemaSeminario is null) ;
        end if;
  -- get
	if opcion=5 then
		select * from tbl_tema_seminario where id_curso_seminario=idCursoSeminario ;
  end if;

  	if opcion=6 then
		select * from tbl_tema_seminario where  id_curso_seminario=idCursoSeminario order by nro_tema_seminario asc;
  end if;
  

END $$
DELIMITER ;
