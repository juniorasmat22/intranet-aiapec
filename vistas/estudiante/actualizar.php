<?php

namespace controladores;

$area = new AreaControlador();
$lista_areas = $area->modelo->listar();

$nivel = new NivelControlador();
$lista_niveles = $nivel->modelo->listar();

?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Perfil</a></li>
                    <li class="breadcrumb-item active">Actualizar</li>
                </ol>
            </div>
            <h4 class="page-title">Actualizar tu Perfil</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3"> Hola <?php echo $_SESSION['name']; ?>, actualiza tus datos antes de empezar </h4>

                <form>
                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i> Datos del Estudiante</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tipodocumentoEstudiante" class="form-label">Documento</label>
                                <select class="form-control select2" disabled name="tipodocumentoEstudiante" id="tipodocumentoEstudiante" data-toggle="select2">
                                    <option value="DNI">D.N.I</option>
                                    <option value="Carnet de extranjería">Carnet de extranjería</option>
                                    <option value="Pasaporte">Pasaporte</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="numerodocumentoEstudiante" class="form-label">Nro. Documento</label>
                                <input type="number" value="<?php echo $estudiante->resultado->numerodocumentoEstudiante; ?>" class="form-control" name="numerodocumentoEstudiante" id="numerodocumentoEstudiante" disabled placeholder="Ingrese su número de documento">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="apellidoEstudiante" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" value="<?php echo $estudiante->resultado->apellidoEstudiante; ?>" id="apellidoEstudiante" name="apellidoEstudiante" placeholder="Ingrese sus Apellidos">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nombresEstudiante" class="form-label">Nombres</label>
                                <input type="text" class="form-control" name="nombresEstudiante" id="nombresEstudiante" value="<?php echo $estudiante->resultado->nombresEstudiante; ?>" placeholder="Ingrese sus Nombres">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="correoEstudiante" class="form-label">Celular</label>
                                <input type="text" class="form-control" id="correoEstudiante" name="correoEstudiante" value="<?php echo $estudiante->resultado->celularEstudiante; ?>" placeholder="Ingrese su número de celular">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="celularEstudiante" class="form-label">Correo</label>
                                <input type="text" class="form-control" id="celularEstudiante" value="<?php echo $estudiante->resultado->correoEstudiante; ?>" name="celularEstudiante" placeholder="Ingrese su correo electrónico">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fechaNacimientoEstudiante" class="form-label">Fecha de Nacimiento</label>
                                <div class="mb-3 position-relative" id="datepicker1">
                                    <input type="text" class="form-control" data-provide="datepicker" data-date-container="#datepicker1" name="fechaNacimientoEstudiante" id="fechaNacimientoEstudiante">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sexoEstudiante" class="form-label">Sexo</label>
                                <select class="form-control select2" name="sexoEstudiante" id="sexoEstudiante" data-toggle="select2">
                                    <option value="0" disabled selected>Seleccione un opción</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="direccionEstudiante" class="form-label">Dirección</label>
                                <textarea class="form-control" id="direccionEstudiante" name="direccionEstudiante" rows="2" placeholder="Indique su dirección: ..."></textarea>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i>Datos del Apoderado</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="dniApoderadoEstudiante" class="form-label">D.N.I</label>
                                <input type="number" class="form-control" id="dniApoderadoEstudiante" name="dniApoderadoEstudiante" placeholder="Ingrese su número de documento">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="apellidoApoderadoEstudiante" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidoApoderadoEstudiante" id="apellidoApoderadoEstudiante" placeholder="Ingrese sus Apellidos">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nombreApoderadoEstudiante" class="form-label">Nombres</label>
                                <input type="text" class="form-control" name="nombreApoderadoEstudiante" id="nombreApoderadoEstudiante" placeholder="Ingrese sus Nombres">
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="celularApoderadoEstudiante" class="form-label">Celular</label>
                                <input type="text" class="form-control" id="celularApoderadoEstudiante" name="celularApoderadoEstudiante" placeholder="Ingrese su número de celular">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="correoApoderadoEstudiante" class="form-label">Correo</label>
                                <input type="email" class="form-control" name="correoApoderadoEstudiante" id="correoApoderadoEstudiante" placeholder="Ingrese su correo electrónico">
                            </div>
                        </div>
                    </div> <!-- end row -->

                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Datos Académicos</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="situacionEstudiante" class="form-label">Situación del Estudiante</label>
                                <select required class="form-control select2" onchange="mostrar_campos();" name="situacionEstudiante" id="situacionEstudiante" data-toggle="select2">
                                    <option selected disabled>Seleccione una opción</option>
                                    <option value="Estudiante Escolar">Estudiante Escolar</option>
                                    <option value="Egresado de Secundaria">Egresado de Secundaria</option>
                                </select>
                            </div>
                        </div>
                    </div> <!-- end row -->
                    

                    <div class="row"  id="seccion_academia" style="display:none;">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="modalidadEstudiante" class="form-label">Modalidad de Postulación</label>
                                <select required class="form-control select2" name="modalidadEstudiante" id="modalidadEstudiante" data-toggle="select2">
                                    <option selected disabled>Seleccione una opción</option>
                                    <option value="Ordinario">Ordinario</option>
                                    <option value="Cepunt">Cepunt</option>
                                    <option value="Excelencia">Excelencia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="idArea" class="form-label">Área</label>
                                <select required class="form-control select2" onchange="llenar_carreras()" name="idArea" id="idArea" data-toggle="select2">
                                    <option selected disabled>Seleccione una opción</option>
                                    <?php
                                    if ($lista_areas->respuesta) {
                                        $filas_areas = $lista_areas->resultado->objetos;

                                        foreach ($filas_areas as $area) {

                                    ?>

                                            <option value="<?php echo $area->idArea; ?>"><?php echo $area->nombreArea; ?></option>

                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <option disabled>No existen Áreas Registradas</option>


                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="idCarrera" class="form-label">Carrera</label>
                                <select required class="form-control select2" name="idCarrera" id="idCarrera" data-toggle="select2">
                                    <option selected disabled>Seleccione una opción</option>
                                   
                                </select>
                            </div>
                        </div>
                    </div> <!-- end row -->

                    <div class="row" id="seccion_colegio" style="display:none;">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="idNivel" class="form-label">Nivel</label>
                                <select required class="form-control select2" onchange="llenar_grados()" name="idNivel" id="idNivel" data-toggle="select2">
                                    <option selected disabled>Seleccione una opción</option>
                                    <?php
                                    if ($lista_niveles->respuesta) {
                                        $filas_niveles = $lista_niveles->resultado->objetos;

                                        foreach ($filas_niveles as $nivel) {

                                    ?>

                                            <option value="<?php echo $nivel->idNivel; ?>"><?php echo $nivel->descripcionNivel; ?></option>

                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <option disabled>No existen Niveles Registrados</option>


                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="idGrado" class="form-label">Grado</label>
                                <select required class="form-control select2" name="idGrado" id="idGrado" data-toggle="select2">
                                    <option selected disabled>Grado</option>
                                    
                                </select>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="colegioEstudiante" class="form-label">Colegio de procedencia</label>
                                <select required onchange="mostrar_solo_colegio()" class="form-control select2" name="colegioEstudiante" id="colegioEstudiante" data-toggle="select2">
                                    <option selected disabled>Seleccione una opción</option>
                                    <option value="1568 NIÑO JESUS DE PRAGA">1568 NIÑO JESUS DE PRAGA</option>
                                    <option value="1591 LA CASA DEL NIÑO">1591 LA CASA DEL NIÑO</option>
                                    <option value="1593 DIVINO JESUS">1593 DIVINO JESUS</option>
                                    <option value="1602 NUEVO PERU">1602 NUEVO PERU</option>
                                    <option value="1638 PASITOS DE JESUS">1638 PASITOS DE JESUS</option>
                                    <option value="1678 JOSEFINA PINILLOS DE LARCO">1678 JOSEFINA PINILLOS DE LARCO</option>
                                    <option value="1679 SAN JUAN BAUTISTA">1679 SAN JUAN BAUTISTA</option>
                                    <option value="1681 HOSPITAL REGIONAL DOCENTE">1681 HOSPITAL REGIONAL DOCENTE</option>
                                    <option value="1685 MARIA INMACULADA">1685 MARIA INMACULADA</option>
                                    <option value="1700 DIVINO SALVADOR">1700 DIVINO SALVADOR</option>
                                    <option value="1712 SANTA ROSA">1712 SANTA ROSA</option>
                                    <option value="1733 MI MUNDO MARAVILLOSO">1733 MI MUNDO MARAVILLOSO</option>
                                    <option value="1777 DIVINO REDENTOR">1777 DIVINO REDENTOR</option>
                                    <option value="206 SABER Y FANTASIA CON MARIA">206 SABER Y FANTASIA CON MARIA</option>
                                    <option value="207 ALFREDO PINILLOS GOICOCHEA">207 ALFREDO PINILLOS GOICOCHEA</option>
                                    <option value="208 MARIA INMACULADA">208 MARIA INMACULADA</option>
                                    <option value="209 SANTA ANA">209 SANTA ANA</option>
                                    <option value="252 NIÑO JESUS">252 NIÑO JESUS</option>
                                    <option value="80002 ANTONIO TORRES ARAUJO">80002 ANTONIO TORRES ARAUJO</option>
                                    <option value="80003 ANDRES AVELINO CACERES">80003 ANDRES AVELINO CACERES</option>
                                    <option value="80005 ABRAHAM VALDELOMAR">80005 ABRAHAM VALDELOMAR</option>
                                    <option value="80006 NUEVO PERU">80006 NUEVO PERU</option>
                                    <option value="80008 REPUBLICA DE ARGENTINA">80008 REPUBLICA DE ARGENTINA</option>
                                    <option value="80010 RICARDO PALMA">80010 RICARDO PALMA</option>
                                    <option value="80014 JUAN PABLO II">80014 JUAN PABLO II</option>
                                    <option value="80015 JUAN VELASCO ALVARADO">80015 JUAN VELASCO ALVARADO</option>
                                    <option value="80017 ALFREDO TELLO SALAVARRIA">80017 ALFREDO TELLO SALAVARRIA</option>
                                    <option value="80018 REPUBLICA DE MEXICO">80018 REPUBLICA DE MEXICO</option>
                                    <option value="80019 CIRO ALEGRIA BAZAN">80019 CIRO ALEGRIA BAZAN</option>
                                    <option value="80077 ALCIDES CARREÑO BLAS">80077 ALCIDES CARREÑO BLAS</option>
                                    <option value="80626 NTRA SEÑORA DE LAS MERCEDES">80626 NTRA SEÑORA DE LAS MERCEDES</option>
                                    <option value="80626 NUESTRA SEÑORA DE LAS MERCEDES">80626 NUESTRA SEÑORA DE LAS MERCEDES</option>
                                    <option value="80865 DANIEL HOYLE">80865 DANIEL HOYLE</option>
                                    <option value="80882 JORGE CHAVEZ">80882 JORGE CHAVEZ</option>
                                    <option value="80892 LOS PINOS">80892 LOS PINOS</option>
                                    <option value="80914 TOMAS GAMARRA LEON">80914 TOMAS GAMARRA LEON</option>
                                    <option value="81001 REPUBLICA DE PANAMA">81001 REPUBLICA DE PANAMA</option>
                                    <option value="81002 JAVIER HERAUD">81002 JAVIER HERAUD</option>
                                    <option value="81003 CESAR ABRAHAM VALLEJO MENDOZA">81003 CESAR ABRAHAM VALLEJO MENDOZA</option>
                                    <option value="81004 LA UNION">81004 LA UNION</option>
                                    <option value="81005 JOSE CARLOS MARIATEGUI LA CHIRA">81005 JOSE CARLOS MARIATEGUI LA CHIRA</option>
                                    <option value="81006 AMAUTA">81006 AMAUTA</option>
                                    <option value="81007 MODELO">81007 MODELO</option>
                                    <option value="81008 MUNICIPAL">81008 MUNICIPAL</option>
                                    <option value="81010 VIRGEN DE LA PUERTA">81010 VIRGEN DE LA PUERTA</option>
                                    <option value="81011 ANTONIO RAYMONDI">81011 ANTONIO RAYMONDI</option>
                                    <option value="81014 PEDRO MERCEDES UREÑA">81014 PEDRO MERCEDES UREÑA</option>
                                    <option value="81015 CARLOS E. UCEDA MEZA">81015 CARLOS E. UCEDA MEZA</option>
                                    <option value="81584 EVERARDO ZAPATA SANTILLANA">81584 EVERARDO ZAPATA SANTILLANA</option>
                                    <option value="81637 FRANCISCO TUDELA">81637 FRANCISCO TUDELA</option>
                                    <option value="81653 NUESTRA SEÑORA DE MONSERRAT">81653 NUESTRA SEÑORA DE MONSERRAT</option>
                                    <option value="81746 ALMIRANTE MIGUEL GRAU SEMINARIO">81746 ALMIRANTE MIGUEL GRAU SEMINARIO</option>
                                    <option value="81755 MEDALLA MILAGROSA">81755 MEDALLA MILAGROSA</option>
                                    <option value="82050 HUERTA BELLA">82050 HUERTA BELLA</option>
                                    <option value="ABELARDO GAMARRA">ABELARDO GAMARRA</option>
                                    <option value="ABRAHAM LINCOLN">ABRAHAM LINCOLN</option>
                                    <option value="ABRAHAM VALDELOMAR">ABRAHAM VALDELOMAR</option>
                                    <option value="ADUNI">ADUNI</option>
                                    <option value="ADVENTISTA JOSE DE SAN MARTIN">ADVENTISTA JOSE DE SAN MARTIN</option>
                                    <option value="AGUA VIVA">AGUA VIVA</option>
                                    <option value="AIAPAEC">AIAPAEC</option>
                                    <option value="ALEJANDRO DEUSTUA">ALEJANDRO DEUSTUA</option>
                                    <option value="ALEXANDER FLEMING">ALEXANDER FLEMING</option>
                                    <option value="ALEXANDER GRHAM BELL">ALEXANDER GRHAM BELL</option>
                                    <option value="ALEXANDER VON HUMBOLDT">ALEXANDER VON HUMBOLDT</option>
                                    <option value="AMERICA">AMERICA</option>
                                    <option value="AMERICA 3000">AMERICA 3000</option>
                                    <option value="AMERICANA DE TURISMO">AMERICANA DE TURISMO</option>
                                    <option value="ANDRES AVELINO CACERES">ANDRES AVELINO CACERES</option>
                                    <option value="ANDRES BELLO">ANDRES BELLO</option>
                                    <option value="ANGELES">ANGELES</option>
                                    <option value="ANGELES DE MARIA">ANGELES DE MARIA</option>
                                    <option value="ANGELITOS DE LA PAZ">ANGELITOS DE LA PAZ</option>
                                    <option value="ANITA DE LOS ANGELES">ANITA DE LOS ANGELES</option>
                                    <option value="ANTONIO RAYMONDI">ANTONIO RAYMONDI</option>
                                    <option value="APRENDO JUGANDO">APRENDO JUGANDO</option>
                                    <option value="AR - FER">AR - FER</option>
                                    <option value="ARCO IRIS KIMDER GARDEN">ARCO IRIS KIMDER GARDEN</option>
                                    <option value="ARNOLD GESELL">ARNOLD GESELL</option>
                                    <option value="AUGUSTO SALAZAR BONDY">AUGUSTO SALAZAR BONDY</option>
                                    <option value="AYRTON SENNA">AYRTON SENNA</option>
                                    <option value="BELLAS ARTES MACEDONIO DE LA TORRE">BELLAS ARTES MACEDONIO DE LA TORRE</option>
                                    <option value="BERTOLT BRECHT COLLEGE">BERTOLT BRECHT COLLEGE</option>
                                    <option value="BILINGUE LOS ANDES">BILINGUE LOS ANDES</option>
                                    <option value="CAMINO BRENT">CAMINO BRENT</option>
                                    <option value="CARITAS FELICES">CARITAS FELICES</option>
                                    <option value="CARLOS A MANUCCI">CARLOS A MANUCCI</option>
                                    <option value="CARLOS VALDERRAMA">CARLOS VALDERRAMA</option>
                                    <option value="CARMELITAS">CARMELITAS</option>
                                    <option value="CARRUSEL">CARRUSEL</option>
                                    <option value="CASITA DE CHOCOLATE">CASITA DE CHOCOLATE</option>
                                    <option value="CENTRO TECNICO PRODUCTIVO EMAUS - TRUJILLO">CENTRO TECNICO PRODUCTIVO EMAUS - TRUJILLO</option>
                                    <option value="CEPAE">CEPAE</option>
                                    <option value="CEPAS">CEPAS</option>
                                    <option value="CEVATUR LA LIBERTAD">CEVATUR LA LIBERTAD</option>
                                    <option value="CEVATUR TRUJILLO">CEVATUR TRUJILLO</option>
                                    <option value="CHISPITAS DE LUZ">CHISPITAS DE LUZ</option>
                                    <option value="CHRISTA MC AULIFFE">CHRISTA MC AULIFFE</option>
                                    <option value="CIENCIA Y ARTE">CIENCIA Y ARTE</option>
                                    <option value="CIENTEC">CIENTEC</option>
                                    <option value="CLARETIANO">CLARETIANO</option>
                                    <option value="CORAZON DE JESUS">CORAZON DE JESUS</option>
                                    <option value="CORAZON DEL NIÑO JESUS">CORAZON DEL NIÑO JESUS</option>
                                    <option value="CRAEI CARMEN RITA CORBERA VILCARROMERO">CRAEI CARMEN RITA CORBERA VILCARROMERO</option>
                                    <option value="CREATIVOS GARDEN">CREATIVOS GARDEN</option>
                                    <option value="CREBE">CREBE</option>
                                    <option value="CRECIENDO">CRECIENDO</option>
                                    <option value="CRISTIANO ELLIOT">CRISTIANO ELLIOT</option>
                                    <option value="CRISTO JESUS">CRISTO JESUS</option>
                                    <option value="DANTE ALIGHIERI">DANTE ALIGHIERI</option>
                                    <option value="DE COLORES">DE COLORES</option>
                                    <option value="DECROLY">DECROLY</option>
                                    <option value="DEL NORTE S.A.C.">DEL NORTE S.A.C.</option>
                                    <option value="DESPERTAR">DESPERTAR</option>
                                    <option value="DIFERENCIAL">DIFERENCIAL</option>
                                    <option value="DIVINA TRINIDAD">DIVINA TRINIDAD</option>
                                    <option value="DIVINO JESUS">DIVINO JESUS</option>
                                    <option value="DIVINO SEMBRADOR">DIVINO SEMBRADOR</option>
                                    <option value="EDUCARES">EDUCARES</option>
                                    <option value="EDUCARES - TRUJILLO">EDUCARES - TRUJILLO</option>
                                    <option value="EDUKIDS">EDUKIDS</option>
                                    <option value="EDUTECH">EDUTECH</option>
                                    <option value="EGAP ESCUELA DE GASTRONOMIA Y ARTE CULINARIO PERUANO">EGAP ESCUELA DE GASTRONOMIA Y ARTE CULINARIO PERUANO</option>
                                    <option value="EGO'S KIDS GARDEN">EGO'S KIDS GARDEN</option>
                                    <option value="EIFFEL SCHOOLS">EIFFEL SCHOOLS</option>
                                    <option value="EL CULTURAL AMERICAN SCHOOL">EL CULTURAL AMERICAN SCHOOL</option>
                                    <option value="EL PACIFICO">EL PACIFICO</option>
                                    <option value="EL RECREO">EL RECREO</option>
                                    <option value="ELLEN WHITE">ELLEN WHITE</option>
                                    <option value="ENRIQUE LOPEZ ALBUJAR">ENRIQUE LOPEZ ALBUJAR</option>
                                    <option value="ERASMO DE ROTTERDAM">ERASMO DE ROTTERDAM</option>
                                    <option value="ESCUELA DE GASTRONOMIA BLUE RIBBON INTERNATIONAL">ESCUELA DE GASTRONOMIA BLUE RIBBON INTERNATIONAL</option>
                                    <option value="ESCUELA DE NEGOCIOS Y DESARROLLO GERENCIAL">ESCUELA DE NEGOCIOS Y DESARROLLO GERENCIAL</option>
                                    <option value="ESCUELA INTEGRAL DE ESTETICA Y COSMIATRIA - BELLNOR">ESCUELA INTEGRAL DE ESTETICA Y COSMIATRIA - BELLNOR</option>
                                    <option value="ESCUELA INTERNACIONAL DE GERENCIA - EIGER">ESCUELA INTERNACIONAL DE GERENCIA - EIGER</option>
                                    <option value="ESSUMIN">ESSUMIN</option>
                                    <option value="ESTRELLITA BRILLANTE">ESTRELLITA BRILLANTE</option>
                                    <option value="ESTRELLITAS">ESTRELLITAS</option>
                                    <option value="ESTRELLITAS DEL MAÑANA">ESTRELLITAS DEL MAÑANA</option>
                                    <option value="EUCARISTICO MARIANO">EUCARISTICO MARIANO</option>
                                    <option value="EVANGELICA MONTE DE SION">EVANGELICA MONTE DE SION</option>
                                    <option value="FASHION SCHOOL ROSIE DESING">FASHION SCHOOL ROSIE DESING</option>
                                    <option value="FLORCITAS DEL SABER">FLORCITAS DEL SABER</option>
                                    <option value="FORMATUR">FORMATUR</option>
                                    <option value="FRANKLIN ROOSEVELT">FRANKLIN ROOSEVELT</option>
                                    <option value="FRAY MARTIN DE PORRES">FRAY MARTIN DE PORRES</option>
                                    <option value="FRIEDRICH GAUSS">FRIEDRICH GAUSS</option>
                                    <option value="GABRIELA MISTRAL">GABRIELA MISTRAL</option>
                                    <option value="GASTRONORT ESCUELA DE ALTA GASTRONOMIA, HOSTELERIA Y TURISMO">GASTRONORT ESCUELA DE ALTA GASTRONOMIA, HOSTELERIA Y TURISMO</option>
                                    <option value="GENIOS">GENIOS</option>
                                    <option value="GODOFREDO GARCIA">GODOFREDO GARCIA</option>
                                    <option value="GRAN BOLIVAR">GRAN BOLIVAR</option>
                                    <option value="GRAN CHIMU">GRAN CHIMU</option>
                                    <option value="GUILLERMO MILLER">GUILLERMO MILLER</option>
                                    <option value="GUSTAVO PONS MUZZO">GUSTAVO PONS MUZZO</option>
                                    <option value="GUSTAVO RIES">GUSTAVO RIES</option>
                                    <option value="HANS HEINRICH BRUNING">HANS HEINRICH BRUNING</option>
                                    <option value="HAPPY KIDS">HAPPY KIDS</option>
                                    <option value="HARVAR">HARVAR</option>
                                    <option value="HERMANOS BLANCO">HERMANOS BLANCO</option>
                                    <option value="HUELLITAS">HUELLITAS</option>
                                    <option value="INDOAMERICA">INDOAMERICA</option>
                                    <option value="INGENIERIA">INGENIERIA</option>
                                    <option value="INMACULADA VIRGEN DE LA PUERTA">INMACULADA VIRGEN DE LA PUERTA</option>
                                    <option value="INMACULADA VIRGEN DE LA PUERTA S.A.C">INMACULADA VIRGEN DE LA PUERTA S.A.C</option>
                                    <option value="INNOVA">INNOVA</option>
                                    <option value="INSTITUTO SUPERIOR DE GASTRONOMIA Y TURISMO - PERU S.A.C">INSTITUTO SUPERIOR DE GASTRONOMIA Y TURISMO - PERU S.A.C</option>
                                    <option value="INTEGRAL CLASS">INTEGRAL CLASS</option>
                                    <option value="INTEPUC">INTEPUC</option>
                                    <option value="INTERAMERICANO">INTERAMERICANO</option>
                                    <option value="INTERNATIONAL HIGH SCHOOL OF COMPETER ENTERPRISE IICER">INTERNATIONAL HIGH SCHOOL OF COMPETER ENTERPRISE IICER</option>
                                    <option value="ISAAC NEWTON">ISAAC NEWTON</option>
                                    <option value="IVAN PETROVICH PAVLOV">IVAN PETROVICH PAVLOV</option>
                                    <option value="JAN KOMENSKY">JAN KOMENSKY</option>
                                    <option value="JARDIN FELICIDAD">JARDIN FELICIDAD</option>
                                    <option value="JATUNYACHIY - TE HACEMOS CRECER">JATUNYACHIY - TE HACEMOS CRECER</option>
                                    <option value="JAVIER PEREZ DE CUELLAR">JAVIER PEREZ DE CUELLAR</option>
                                    <option value="JESUS DE BELEN">JESUS DE BELEN</option>
                                    <option value="JESUS DE MARIA">JESUS DE MARIA</option>
                                    <option value="JESUS DE PRAGA">JESUS DE PRAGA</option>
                                    <option value="JESUS DE PRAGA II">JESUS DE PRAGA II</option>
                                    <option value="JESUS Y MARIA">JESUS Y MARIA</option>
                                    <option value="JHON D' ALAMBERT">JHON D'ALAMBERT</option>
                                    <option value="JHON FRANCISCO REGGIS">JHON FRANCISCO REGGIS</option>
                                    <option value="JOAQUINA PIZURI DAVILA">JOAQUINA PIZURI DAVILA</option>
                                    <option value="JOHANNES KEPLER">JOHANNES KEPLER</option>
                                    <option value="JOHN NASH">JOHN NASH</option>
                                    <option value="JOHN NEPER">JOHN NEPER</option>
                                    <option value="JOSE FAUSTINO SANCHEZ CARRION">JOSE FAUSTINO SANCHEZ CARRION</option>
                                    <option value="JUAN AMOS COMENIO">JUAN AMOS COMENIO</option>
                                    <option value="JUAN PABLO II">JUAN PABLO II</option>
                                    <option value="JUAN XXIII">JUAN XXIII</option>
                                    <option value="JUANA ALARCO DE DAMMERT">JUANA ALARCO DE DAMMERT</option>
                                    <option value="KEPLER">KEPLER</option>
                                    <option value="KIDS IN ACTION">KIDS IN ACTION</option>
                                    <option value="KINDERLAND">KINDERLAND</option>
                                    <option value="KREAR">KREAR</option>
                                    <option value="LA ASUNCION">LA ASUNCION</option>
                                    <option value="LA CASA DE MUÑECOS">LA CASA DE MUÑECOS</option>
                                    <option value="LA CASITA DE CHOCOLATE">LA CASITA DE CHOCOLATE</option>
                                    <option value="LA CASITA DEL BOSQUE">LA CASITA DEL BOSQUE</option>
                                    <option value="LA COCINA DE LOS CHEFF">LA COCINA DE LOS CHEFF</option>
                                    <option value="LAS AMERICAS">LAS AMERICAS</option>
                                    <option value="LAS CAPULLANAS">LAS CAPULLANAS</option>
                                    <option value="LAS CRAYOLAS">LAS CRAYOLAS</option>
                                    <option value="LEONARDO DA VINCI-COMPUMATIC-TRUJILLO">LEONARDO DA VINCI-COMPUMATIC-TRUJILLO</option>
                                    <option value="LIBERTAD">LIBERTAD</option>
                                    <option value="LIBERTAD SCHOOL">LIBERTAD SCHOOL</option>
                                    <option value="LICEO CRISTO REY">LICEO CRISTO REY</option>
                                    <option value="LICEO TRUJILLO">LICEO TRUJILLO</option>
                                    <option value="LILIA CORTIJO DE SALAZAR">LILIA CORTIJO DE SALAZAR</option>
                                    <option value="LITLE STARS">LITLE STARS</option>
                                    <option value="LITTLE KIDS">LITTLE KIDS</option>
                                    <option value="LITTLE SMILES">LITTLE SMILES</option>
                                    <option value="LORD KELVIN">LORD KELVIN</option>
                                    <option value="LOS AMIGOS DE JESUS">LOS AMIGOS DE JESUS</option>
                                    <option value="LOS ANDES">LOS ANDES</option>
                                    <option value="LOS ANGELES">LOS ANGELES</option>
                                    <option value="LOS ANGELITOS">LOS ANGELITOS</option>
                                    <option value="LOS CARIÑOSITOS">LOS CARIÑOSITOS</option>
                                    <option value="LOS DUENDECILLOS FELICES">LOS DUENDECILLOS FELICES</option>
                                    <option value="LOS GENIECITOS">LOS GENIECITOS</option>
                                    <option value="LOS JAZMINES">LOS JAZMINES</option>
                                    <option value="LOS LIBERTADORES">LOS LIBERTADORES</option>
                                    <option value="LOS NIÑOS DE JESUS">LOS NIÑOS DE JESUS</option>
                                    <option value="LOS QUERUBINES EN FLOR">LOS QUERUBINES EN FLOR</option>
                                    <option value="LOS RETOÑITOS DEL SABER">LOS RETOÑITOS DEL SABER</option>
                                    <option value="LOUIS PASTEUR">LOUIS PASTEUR</option>
                                    <option value="LUCERITO">LUCERITO</option>
                                    <option value="MADRE DE DIOS">MADRE DE DIOS</option>
                                    <option value="MAGIC KINGDOM">MAGIC KINGDOM</option>
                                    <option value="MAGISTER CIENCIAS">MAGISTER CIENCIAS</option>
                                    <option value="MAGISTER DE LA LIBERTAD">MAGISTER DE LA LIBERTAD</option>
                                    <option value="MARCELINO CHAMPAGNAT">MARCELINO CHAMPAGNAT</option>
                                    <option value="MARCIAL ACHARAN Y SMITH">MARCIAL ACHARAN Y SMITH</option>
                                    <option value="MARIA AUXILIADORA">MARIA AUXILIADORA</option>
                                    <option value="MARIA INMACULADA">MARIA INMACULADA</option>
                                    <option value="MARIA MADRE">MARIA MADRE</option>
                                    <option value="MARIA NEGRON UGARTE">MARIA NEGRON UGARTE</option>
                                    <option value="MARIA REYNA DE LA PAZ">MARIA REYNA DE LA PAZ</option>
                                    <option value="MARIA REYNA DE LOS ANGELES">MARIA REYNA DE LOS ANGELES</option>
                                    <option value="MARIANO MELGAR">MARIANO MELGAR</option>
                                    <option value="MARIANO SANTOS MATEO">MARIANO SANTOS MATEO</option>
                                    <option value="MARISTA SIGLO XXI">MARISTA SIGLO XXI</option>
                                    <option value="MARKAN KIDS">MARKAN KIDS</option>
                                    <option value="MATEMATICO LOBACHEVSKY">MATEMATICO LOBACHEVSKY</option>
                                    <option value="MATER CHRISTI">MATER CHRISTI</option>
                                    <option value="MAYOR DE SAN MARCOS">MAYOR DE SAN MARCOS</option>
                                    <option value="MENTES BRILLANTES">MENTES BRILLANTES</option>
                                    <option value="MENTES BRILLANTES - SAN ISIDRO">MENTES BRILLANTES - SAN ISIDRO</option>
                                    <option value="MI CASITA">MI CASITA</option>
                                    <option value="MI CIELITO">MI CIELITO</option>
                                    <option value="MI FELICIDAD">MI FELICIDAD</option>
                                    <option value="MI MEDALLA MILAGROSA">MI MEDALLA MILAGROSA</option>
                                    <option value="MI MUNDO FELIZ">MI MUNDO FELIZ</option>
                                    <option value="MICAELA BASTIDAS">MICAELA BASTIDAS</option>
                                    <option value="MICROCHIP">MICROCHIP</option>
                                    <option value="MIGUEL ANGEL BUONARROTI">MIGUEL ANGEL BUONARROTI</option>
                                    <option value="MIGUEL DE CERVANTES SAAVEDRA">MIGUEL DE CERVANTES SAAVEDRA</option>
                                    <option value="MIGUEL GRAU">MIGUEL GRAU</option>
                                    <option value="MIS ABEJITAS">MIS ABEJITAS</option>
                                    <option value="MIS BURBUJITAS">MIS BURBUJITAS</option>
                                    <option value="MIS GARABATOS">MIS GARABATOS</option>
                                    <option value="MIS KAPULLOS">MIS KAPULLOS</option>
                                    <option value="MIS PASITOS">MIS PASITOS</option>
                                    <option value="MIS PEQUEÑAS ESTRELLITAS">MIS PEQUEÑAS ESTRELLITAS</option>
                                    <option value="MONTEAZUL COLEGIO">MONTEAZUL COLEGIO</option>
                                    <option value="MONTEVERDE">MONTEVERDE</option>
                                    <option value="MUNDO DE COLORES">MUNDO DE COLORES</option>
                                    <option value="NAZARENO">NAZARENO</option>
                                    <option value="NEWTON KIDS MMX">NEWTON KIDS MMX</option>
                                    <option value="NIKOLA TESLA">NIKOLA TESLA</option>
                                    <option value="NIÑO JESUS DE PRAGA">NIÑO JESUS DE PRAGA</option>
                                    <option value="NOBEL">NOBEL</option>
                                    <option value="NOR PERU">NOR PERU</option>
                                    <option value="NORBERT WIENER">NORBERT WIENER</option>
                                    <option value="NUESTRA SEÑORA DE ALTA GRACIA">NUESTRA SEÑORA DE ALTA GRACIA</option>
                                    <option value="NUESTRA SEÑORA DE GUADALUPE">NUESTRA SEÑORA DE GUADALUPE</option>
                                    <option value="NUESTRA SEÑORA DE SCHOENSTATT">NUESTRA SEÑORA DE SCHOENSTATT</option>
                                    <option value="NUESTRA SEÑORA DEL CARMEN">NUESTRA SEÑORA DEL CARMEN</option>
                                    <option value="NUESTRA SEÑORA DEL PERPETUO SOCORRO">NUESTRA SEÑORA DEL PERPETUO SOCORRO</option>
                                    <option value="NUESTRA.SEÑORA DEL PERPETUO SOCORRO">NUESTRA.SEÑORA DEL PERPETUO SOCORRO</option>
                                    <option value="NUEVA ERA">NUEVA ERA</option>
                                    <option value="NUEVA VIDA">NUEVA VIDA</option>
                                    <option value="NUEVO AMANECER">NUEVO AMANECER</option>
                                    <option value="NUEVO PERU">NUEVO PERU</option>
                                    <option value="ORION">ORION</option>
                                    <option value="OXFORD">OXFORD</option>
                                    <option value="PABLO CASALS">PABLO CASALS</option>
                                    <option value="PAIAN - LA CASA DEL SABER">PAIAN - LA CASA DEL SABER</option>
                                    <option value="PAUL SABATIER">PAUL SABATIER</option>
                                    <option value="PERUANO AMERICANO ABRAHAM LINCOLN">PERUANO AMERICANO ABRAHAM LINCOLN</option>
                                    <option value="PERUANO BRITANICO DEL NORTE">PERUANO BRITANICO DEL NORTE</option>
                                    <option value="PESTALOZZI">PESTALOZZI</option>
                                    <option value="PIONEER'S COLLEGE">PIONEER'S COLLEGE</option>
                                    <option value="PLANETA AZUL">PLANETA AZUL</option>
                                    <option value="PONTIFICIO SALESIANO SAN JORGE">PONTIFICIO SALESIANO SAN JORGE</option>
                                    <option value="PORTAL DE BELEN">PORTAL DE BELEN</option>
                                    <option value="PRIMAVERA">PRIMAVERA</option>
                                    <option value="PRITE TRUJILLO">PRITE TRUJILLO</option>
                                    <option value="RAFAEL NARVAEZ CADENILLAS">RAFAEL NARVAEZ CADENILLAS</option>
                                    <option value="RAMON ZAVALA">RAMON ZAVALA</option>
                                    <option value="RAYITOS DE SOL">RAYITOS DE SOL</option>
                                    <option value="RENACER">RENACER</option>
                                    <option value="RENACIMIENTO">RENACIMIENTO</option>
                                    <option value="RETOS">RETOS</option>
                                    <option value="ROSA MERINO CENTER">ROSA MERINO CENTER</option>
                                    <option value="ROSE ANGELIC">ROSE ANGELIC</option>
                                    <option value="SAGRADO CORAZON">SAGRADO CORAZON</option>
                                    <option value="SAGRADO CORAZON DE JESUS">SAGRADO CORAZON DE JESUS</option>
                                    <option value="SAINT JOSEPH">SAINT JOSEPH</option>
                                    <option value="SALDAÑA">SALDAÑA</option>
                                    <option value="SALESIANO SAN JOSE">SALESIANO SAN JOSE</option>
                                    <option value="SAMI THE CAR DOCTOR">SAMI THE CAR DOCTOR</option>
                                    <option value="SAN AGUSTIN">SAN AGUSTIN</option>
                                    <option value="SAN AGUSTIN DE HIPONA">SAN AGUSTIN DE HIPONA</option>
                                    <option value="SAN ANDRES">SAN ANDRES</option>
                                    <option value="SAN ANTONIO">SAN ANTONIO</option>
                                    <option value="SAN ANTONIO DE ABAD">SAN ANTONIO DE ABAD</option>
                                    <option value="SAN ANTONIO DE PADUA">SAN ANTONIO DE PADUA</option>
                                    <option value="SAN CARLOS Y SAN MARCELO">SAN CARLOS Y SAN MARCELO</option>
                                    <option value="SAN EDUARDO">SAN EDUARDO</option>
                                    <option value="SAN ESTEBAN">SAN ESTEBAN</option>
                                    <option value="SAN FELIPE">SAN FELIPE</option>
                                    <option value="SAN FRANCISCO DE ASIS">SAN FRANCISCO DE ASIS</option>
                                    <option value="SAN FRANCISCO DE SALES">SAN FRANCISCO DE SALES</option>
                                    <option value="SAN GABRIEL">SAN GABRIEL</option>
                                    <option value="SAN GABRIEL PEQUEÑAS ESTRELLAS">SAN GABRIEL PEQUEÑAS ESTRELLAS</option>
                                    <option value="SAN GERARDO">SAN GERARDO</option>
                                    <option value="SAN IGNACIO DE LOYOLA">SAN IGNACIO DE LOYOLA</option>
                                    <option value="SAN JACINTO">SAN JACINTO</option>
                                    <option value="SAN JOSE DE CLUNNY">SAN JOSE DE CLUNNY</option>
                                    <option value="SAN JUAN">SAN JUAN</option>
                                    <option value="SAN JUAN DE DIOS">SAN JUAN DE DIOS</option>
                                    <option value="SAN LUIS">SAN LUIS</option>
                                    <option value="SAN MARCELO">SAN MARCELO</option>
                                    <option value="SAN MARCOS">SAN MARCOS</option>
                                    <option value="SAN MARTIN DE PORRES">SAN MARTIN DE PORRES</option>
                                    <option value="SAN NICOLAS">SAN NICOLAS</option>
                                    <option value="SAN PABLO">SAN PABLO</option>
                                    <option value="SAN PEDRO">SAN PEDRO</option>
                                    <option value="SAN RAFAEL">SAN RAFAEL</option>
                                    <option value="SAN SEBASTIAN">SAN SEBASTIAN</option>
                                    <option value="SAN SILVESTRE">SAN SILVESTRE</option>
                                    <option value="SAN VICENTE DE PAUL">SAN VICENTE DE PAUL</option>
                                    <option value="SANTA CLARA">SANTA CLARA</option>
                                    <option value="SANTA INES">SANTA INES</option>
                                    <option value="SANTA LEONOR">SANTA LEONOR</option>
                                    <option value="SANTA MAGDALENA SOFIA">SANTA MAGDALENA SOFIA</option>
                                    <option value="SANTA MARIA">SANTA MARIA</option>
                                    <option value="SANTA MARIA DE CANA">SANTA MARIA DE CANA</option>
                                    <option value="SANTA MARIA DE GUADALUPE">SANTA MARIA DE GUADALUPE</option>
                                    <option value="SANTA MARIA REYNA">SANTA MARIA REYNA</option>
                                    <option value="SANTA MARIA REYNA DE LA PAZ">SANTA MARIA REYNA DE LA PAZ</option>
                                    <option value="SANTA MARIA Y JOSE">SANTA MARIA Y JOSE</option>
                                    <option value="SANTA RITA DE CASIA">SANTA RITA DE CASIA</option>
                                    <option value="SANTA ROSA">SANTA ROSA</option>
                                    <option value="SANTA SOFIA">SANTA SOFIA</option>
                                    <option value="SANTA TERESITA">SANTA TERESITA</option>
                                    <option value="SANTA TERESITA DE JESUS">SANTA TERESITA DE JESUS</option>
                                    <option value="SANTA URSULA">SANTA URSULA</option>
                                    <option value="SCHOOL MAI">SCHOOL MAI</option>
                                    <option value="SEBASTIAN SALAZAR BONDY">SEBASTIAN SALAZAR BONDY</option>
                                    <option value="SEMILLERO DE LIDERES">SEMILLERO DE LIDERES</option>
                                    <option value="SEMILLITAS DE LA SALETTE">SEMILLITAS DE LA SALETTE</option>
                                    <option value="SEMILLITAS DEL VALLE">SEMILLITAS DEL VALLE</option>
                                    <option value="SENCICO TRUJILLO">SENCICO TRUJILLO</option>
                                    <option value="SEÑOR CAUTIVO">SEÑOR CAUTIVO</option>
                                    <option value="SIGLO XXI">SIGLO XXI</option>
                                    <option value="SIGNOS DE FE LA SALLE">SIGNOS DE FE LA SALLE</option>
                                    <option value="SIMON BOLIVAR">SIMON BOLIVAR</option>
                                    <option value="SIR ALEXANDER FLEMING">SIR ALEXANDER FLEMING</option>
                                    <option value="SISE - TRUJILLO">SISE - TRUJILLO</option>
                                    <option value="SUPERNOVA">SUPERNOVA</option>
                                    <option value="TALENTOS">TALENTOS</option>
                                    <option value="TESORITOS DE JESUS">TESORITOS DE JESUS</option>
                                    <option value="TOMAS ALVA EDISON">TOMAS ALVA EDISON</option>
                                    <option value="TORIBIO RODRIGUEZ DE MENDOZA">TORIBIO RODRIGUEZ DE MENDOZA</option>
                                    <option value="TRILCE">TRILCE</option>
                                    <option value="TRILCE DE SANTA MARIA">TRILCE DE SANTA MARIA</option>
                                    <option value="TRUJILLO">TRUJILLO</option>
                                    <option value="TULIO HERRERA LEON">TULIO HERRERA LEON</option>
                                    <option value="UN MUNDO PARA CREAR">UN MUNDO PARA CREAR</option>
                                    <option value="VALORES">VALORES</option>
                                    <option value="VICTOR ANDRES BELAUNDE">VICTOR ANDRES BELAUNDE</option>
                                    <option value="VICTOR RAUL HAYA DE LA TORRE">VICTOR RAUL HAYA DE LA TORRE</option>
                                    <option value="VICTORIA MARIA REICHE">VICTORIA MARIA REICHE</option>
                                    <option value="VILLA FONTANA">VILLA FONTANA</option>
                                    <option value="VILLASOL">VILLASOL</option>
                                    <option value="VIRGEN DE COPACABANA">VIRGEN DE COPACABANA</option>
                                    <option value="VIRGEN DE GUADALUPE">VIRGEN DE GUADALUPE</option>
                                    <option value="VIRGEN DE LA PUERTA">VIRGEN DE LA PUERTA</option>
                                    <option value="VIRGEN DE LA PUERTA DORI-FER">VIRGEN DE LA PUERTA DORI-FER</option>
                                    <option value="VIRGEN DE SCHOENSTATT">VIRGEN DE SCHOENSTATT</option>
                                    <option value="VIRGEN DEL CARMEN">VIRGEN DEL CARMEN</option>
                                    <option value="VIRGEN DEL PERPETUO SOCORRO">VIRGEN DEL PERPETUO SOCORRO</option>
                                    <option value="VIRGEN DEL ROSARIO">VIRGEN DEL ROSARIO</option>
                                    <option value="VIRGILIO RODRIGUEZ NACHE">VIRGILIO RODRIGUEZ NACHE</option>
                                    <option value="VON HUMBOLDT">VON HUMBOLDT</option>
                                    <option value="WILLIAM HARVEY">WILLIAM HARVEY</option>
                                    <option value="WILLIAM HARVEY JUNIOR SCHOOL">WILLIAM HARVEY JUNIOR SCHOOL</option>
                                    <option value="WORLD KID'S">WORLD KID'S</option>
                                </select>
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <div class="row" id="solo_colegio_aiapaec" style="display: none;">
                            <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">Sede</label>
                                        <select required class="form-control select2" name="s" id="s" data-toggle="select2" >
                                            <option selected disabled>Seleccione una opción</option>
                                            <option value="1">El Bosque</option>
                                            <option value="2">Moche</option>
                                            <option value="3">San Andrés</option>
                                            <option value="4">Molino</option>
                                        </select>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">Sección</label>
                                        <select required class="form-control select2" name="e" id="e" data-toggle="select2">
                                            <option selected disabled>Seleccione una opción</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                        </select>
                                    </div>
                                </div> <!-- end col -->
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                    </div>
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->