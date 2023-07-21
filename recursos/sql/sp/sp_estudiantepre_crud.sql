USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_estudiantepre_crud $$

CREATE PROCEDURE sp_estudiantepre_crud(
  idPre int,
  idCarrera int,
  idEstudiante int,
  modalidadEstudiante varchar(100),
  opcion int,
  pagina int
)
BEGIN

  declare registrosPagina int;
  declare limiteInferior int;

      if opcion = 1 then
           INSERT INTO tbl_pre (id_carrera, id_estudiante, modalidad_estudiante)
            VALUES(idCarrera, idEstudiante, modalidadEstudiante);
      end if;
      if opcion = 2 then
           UPDATE tbl_pre SET
            modalidad_estudiante=modalidadEstudiante,
            id_carrera=idCarrera,
            id_estudiante=idEstudiante
            WHERE id_pre = idPre;
      end if;
      if opcion=3 then
            DELETE FROM tbl_pre WHERE id_pre=idPre;
      end if;
      if opcion =4 then
            set registrosPagina=10;
		    set limiteInferior=(pagina-1)*registrosPagina;

        select * from tbl_pre where
          (modalidad_estudiante like concat('%',modalidadEstudiante,'%') or modalidadEstudiante is null ) and
          (id_carrera like concat('%',idCarrera,'%') or idCarrera is null)
        limit limiteInferior,registrosPagina;

        -- numero de paginas
          select
            case
            when mod(count(id_pre),registrosPagina)>0 then floor(count(id_pre) / registrosPagina) +1
                else floor(count(id_pre) / registrosPagina)
                  end as paginas
                  from tbl_pre where
                  (modalidad_estudiante like concat('%',modalidadEstudiante,'%') or modalidadEstudiante is null ) and
                  (id_carrera like concat('%',idCarrera,'%') or idCarrera is null) ;
      end if;
    if opcion = 5 then
      SELECT * FROM tbl_pre WHERE id_pre=idPre;
    end if;
END $$
DELIMITER ;
