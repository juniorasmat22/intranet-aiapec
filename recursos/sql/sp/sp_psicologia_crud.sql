-- SP para CRUD en la tabla tbl_psicologia
DELIMITER $$

DROP PROCEDURE IF EXISTS sp_psicologia_crud $$

CREATE PROCEDURE sp_psicologia_crud(
    idPsicologia INT,
    idEstudiante INT,
    tipoInforme VARCHAR(1),
    urlinforme VARCHAR(500),
    estadoInforme VARCHAR(1),
    fechaVisto DATETIME,
    opcion INT,
    pagina INT
)
BEGIN
    DECLARE registrosPagina INT;
    DECLARE limiteInferior INT;

    -- INSERTAR (CREATE)
    IF opcion = 1 THEN
        INSERT INTO tbl_psicologia (id_estudiante, tipo_informe, url_informe, estado_informe, fecha_visto)
        VALUES (idEstudiante, tipoInforme, urlinforme, estadoInforme, fechaVisto);
    END IF;

    -- EDITAR (UPDATE)
    IF opcion = 2 THEN
        UPDATE tbl_psicologia
        SET
            id_estudiante = idEstudiante,
            tipo_informe = tipoInforme,
            url_informe = urlinforme,
            estado_informe = estadoInforme,
            fecha_visto = fechaVisto
        WHERE id_psicologia = idPsicologia;
    END IF;

    -- ELIMINAR (DELETE)
    IF opcion = 3 THEN
        DELETE FROM tbl_psicologia WHERE id_psicologia = idPsicologia;
    END IF;

    -- LISTAR Y BUSCAR
    IF opcion = 4 THEN
        
        SELECT *
        FROM tbl_psicologia
        WHERE
            (tipo_informe LIKE CONCAT('%', tipoInforme, '%') OR tipoInforme IS NULL);
    END IF;

    -- OBTENER (READ)
    IF opcion = 5 THEN
        SELECT *
        FROM tbl_psicologia
        WHERE id_psicologia = idPsicologia;
    END IF;

    -- OBTENER PSICOLOGIA POR ESTUDIANTE
    IF opcion = 6 THEN
        SELECT *
        FROM tbl_psicologia
        WHERE id_estudiante = idEstudiante;
    END IF;
END $$

DELIMITER ;
