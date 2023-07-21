USE db_academia_aiapaec ;
DELIMITER $$


DROP procedure if exists sp_usuario_crud $$

CREATE PROCEDURE sp_usuario_crud(
  idUsuario int,
  nombreUsuario varchar(10),
  passwordUsuario varchar(10),
  estadoUsuario int,
  fechaRegistroUsuario datetime,
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
		INSERT INTO tbl_usuario (nombre_usuario, password_usuario, estado_usuario, fecha_registro_usuario)
     VALUES(nombreUsuario, passwordUsuario, 1,   fechaRegistroUsuario );

      end if;

  -- editar
  if opcion=2 then
    UPDATE tbl_usuario SET 
    nombre_usuario=nombreUsuario, 
    password_usuario=passwordUsuario, 
    estado_usuario=estadoUsuario  
    WHERE id_usuario=idUsuario;

  end if;

  -- eliminar
	if opcion=3 then
		delete from tbl_usuario where id_usuario = idUsuario;
  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from tbl_usuario where
      (id_usuario like concat('%',idUsuario,'%') or idUsuario is null ) and
      (id_usuario like concat('%',idUsuario,'%') or idUsuario is null)
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(usu_id),registrosPagina)>0 then floor(count(id_usuario) / registrosPagina) +1
          else floor(count(id_usuario) / registrosPagina)
            end as paginas
            from tbl_usuario where
            (id_usuario like concat('%',idUsuario,'%') or idUsuario is null ) and
            (id_usuario like concat('%',idUsuario,'%') or idUsuario is null) ;

        end if;


  -- get
	if opcion=5 then
		select * from tbl_usuario where id_usuario = idUsuario;
  end if;
  -- Consulta login
  if opcion = 6 then
  
    select tu.*,te.id_estudiante,te.nombres_estudiante,te.datos_update from tbl_usuario tu 
    inner join tbl_estudiante te ON te.numerodocumento_estudiante = tu.nombre_usuario 
    where tu.nombre_usuario  = nombreUsuario;
  end if;
END $$
DELIMITER ;
