USE db_academia_aiapaec ;
DELIMITER $$

DROP procedure if exists sp_estudianteescolar_crud $$

CREATE PROCEDURE sp_estudianteescolar_crud(
  idEscolar int,
  idEstudiante int,
  idGrado int,
  colegioEscolar varchar(100),
  sedeColegio varchar(45),
  seccionColegio varchar(1),
  opcion int,
  pagina int
)
BEGIN

  declare registrosPagina int;
  declare limiteInferior int;

      if opcion = 1 then
            INSERT INTO tbl_escolar (id_estudiante, id_grado, colegio_escolar, sede_colegio, seccion_colegio) 
            VALUES(idEstudiante, idGrado, colegioEscolar, sedeColegio, seccionColegio);

      end if;
      if opcion = 2 then
           UPDATE tbl_escolar SET 
           colegio_escolar=colegioEscolar, 
           sede_colegio=sedeColegio, 
           seccion_colegio=seccionColegio ,
           id_grado=idGrado,
           id_estudiante=idEstudiante
           WHERE id_escolar=idEscolar  ;


      end if;
      if opcion=3 then
       DELETE FROM tbl_escolar WHERE id_escolar=idEscolar ;

      end if;
      if opcion =4 then
        set registrosPagina=10;
		    set limiteInferior=(pagina-1)*registrosPagina;

        select * from tbl_escolar where
          (colegio_escolar like concat('%',colegioEscolar,'%') or colegioEscolar is null ) and
          (sede_colegio like concat('%',sedeColegio,'%') or sedeColegio is null)
        limit limiteInferior,registrosPagina;

        -- numero de paginas
          select
            case
            when mod(count(id_escolar),registrosPagina)>0 then floor(count(id_escolar) / registrosPagina) +1
                else floor(count(id_escolar) / registrosPagina)
                  end as paginas
                  from tbl_estudiante where
                  (colegio_escolar like concat('%',colegioEscolar,'%') or colegioEscolar is null ) and
                  (sede_colegio like concat('%',sedeColegio,'%') or sedeColegio is null) ;
      end if;
    if opcion = 5 then
      SELECT  id_estudiante, id_grado, colegio_escolar, sede_colegio, seccion_colegio 
      FROM tbl_escolar
      WHERE id_escolar= idEscolar;
    end if;
END $$
DELIMITER ;
