use gerencia;
DELIMITER $$

DROP procedure if exists sp_empleado_crud $$

CREATE PROCEDURE sp_empleado_crud(
  emp_id int,
  emp_nombres varchar(50),
  emp_apellidos varchar(45),
  emp_direccion varchar(45),
  emp_telefono varchar(45),
  estado int,
  opcion int,
  pagina int
)
BEGIN
  declare registrosPagina int;
  declare limiteInferior int;

  -- crear
	if opcion=1 then
		insert empleado (emp_nombres,emp_apellidos,emp_direccion,emp_telefono,emp_estado)
		values (emp_nombres,emp_apellidos,emp_direccion,emp_telefono,estado);
   end if;

  -- editar
  if opcion=2 then
    update empleado e set
      e.emp_nombres=emp_nombres,
      e.emp_apellidos=emp_apellidos,
      e.emp_direccion=emp_direccion,
      e.emp_telefono=emp_telefono,
      e.estado=estado
    where e.emp_id = emp_id;
  end if;

  -- eliminar
	if opcion=3 then
		delete from empleado  where emp_id = emp_id;
  end if;

	-- listar y buscar
	if opcion=4 then
		set registrosPagina=10;
		set limiteInferior=(pagina-1)*registrosPagina;

		select * from empleado where
      (emp_nombres like concat('%',emp_nombres,'%') or emp_nombres is null ) and
      (emp_apellidos like concat('%',emp_apellidos,'%') or emp_apellidos is null)
    limit limiteInferior,registrosPagina;

  -- numero de paginas
    select
       case
		  when mod(count(emp_id),registrosPagina)>0 then floor(count(emp_id) / registrosPagina) +1
          else floor(count(emp_id) / registrosPagina)
            end as paginas
            from empleado where
            (emp_nombres like concat('%',emp_nombres,'%') or emp_nombres is null ) and
            (emp_apellidos like concat('%',emp_apellidos,'%') or emp_apellidos is null) ;

        end if;
  -- get
	if opcion=5 then
		select * from empleado e where e.emp_id = emp_id;
  end if;
  -- listar empleados que no tienen usuario asignado
	if opcion=6 then
		select * from empleado e where e.emp_id not in (SELECT u.emp_id from usuario u );
  end if;

END $$
DELIMITER ;
