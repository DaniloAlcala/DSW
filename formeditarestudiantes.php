<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./styles/estudiantes.css" type="text/css">
  <title>Editar estudiante</title>
</head>
<body>
    <?php
        include("nuevo-header.php");

        // Función para obtener los datos del estudiante
        function get_student_data($id) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "c1602068_isft225";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM estudiantes WHERE id_estudiante='$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return null;
            }
        }

        // Actualizar los datos del estudiante
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_estudiante = $_POST['id_estudiante'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $tipo_documento = $_POST['tipo_documento'];
        $dni_estudiante = $_POST['dni_estudiante'];
        $nro_legajo = $_POST['nro_legajo'];
        $genero = $_POST['genero'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $pais_nacimiento = $_POST['pais_nacimiento'];
        $lugar_nacimiento = $_POST['lugar_nacimiento'];
        $familia_a_cargo = isset($_POST['familia_a_cargo']) ? 'Sí' : 'No';
        $hijos = $_POST['hijos'];
        $trabaja = isset($_POST['trabaja']) ? 'Sí' : 'No';
        $pais_dom = $_POST['pais_dom'];
        $provincia = $_POST['provincia'];
        $partido = $_POST['partido'];
        $localidad = $_POST['localidad'];
        $calle = $_POST['calle'];
        $numero = $_POST['numero'];
        $piso = $_POST['piso'];
        $departamento = $_POST['departamento'];
        $edificio = $_POST['edificio'];
        $codigo_postal = $_POST['codigo_postal'];
        $nombre_escuela = $_POST['nombre_escuela'];
        $titulo_secundario = $_POST['titulo_secundario'];
        $anio_de_egreso = $_POST['anio_de_egreso'];
        $titulo_certificado = $_POST['titulo_certificado'];
        $titulo_tecnico = isset($_POST['titulo_tecnico']) ? 'Sí' : 'No';
        $titulo_hab = isset($_POST['titulo_hab']) ? 'Sí' : 'No';
        $doc_dni = isset($_POST['doc_dni']) ? 'Sí' : 'No';
        $doc_medico = isset($_POST['doc_medico']) ? 'Sí' : 'No';
        $analitico = isset($_POST['analitico']) ? 'Sí' : 'No';
        $doc_nacimiento = isset($_POST['doc_nacimiento']) ? 'Sí' : 'No';
        $documentacion_completa = isset($_POST['documentacion_completa']) ? 'Sí' : 'No';
        $repositorio_documentacion = $_POST['repositorio_documentacion'];
        $plan_carrera = $_POST['plan_carrera'];
        $estado_inscripcion = $_POST['estado_inscripcion'];
        $estado_estudiante = $_POST['estado_estudiante'];
        $observaciones = $_POST['observaciones'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "c1602068_isft225";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "UPDATE estudiantes SET nro_legajo='$nro_legajo', tipo_documento='$tipo_documento', dni_estudiante='$dni_estudiante', nombre='$nombre', apellido='$apellido', email='$email', telefono='$telefono', genero='$genero', fecha_nacimiento='$fecha_nacimiento', pais_nacimiento='$pais_nacimiento', lugar_nacimiento='$lugar_nacimiento', familiares_a_cargo='$familia_a_cargo', hijos='$hijos', trabaja='$trabaja', pais_dom='$pais_dom', provincia='$provincia', calle='$calle', numero='$numero', piso='$piso', departamento='$departamento', edificio='$edificio', localidad='$localidad', partido='$partido', codigo_postal='$codigo_postal', nombre_escuela='$nombre_escuela', titulo_secundario='$titulo_secundario', anio_de_egreso='$anio_de_egreso', titulo_certificado='$titulo_certificado', titulo_tecnico='$titulo_tecnico', titulo_hab='$titulo_hab', doc_dni='$doc_dni', doc_medico='$doc_medico', analitico='$analitico', doc_nacimiento='$doc_nacimiento', documentacion_completa='$documentacion_completa', repositorio_documentacion='$repositorio_documentacion', plan_carrera='$plan_carrera', estado_inscripcion='$estado_inscripcion', estado_estudiante='$estado_estudiante', observaciones='$observaciones' WHERE id_estudiante='$id_estudiante'";

        if ($conn->query($sql) === TRUE) {
            echo "
            <div class='container mt-4 style= 'Margin: 0 auto';'>
                <div class='alert alert-success text-center' style='max-width: 95%;'>
                    <h4 class='alert-heading'>¡Datos actualizados correctamente!</h4>
                    <p>El registro se ha actualizado exitosamente en la base de datos.</p>
                    <hr>
                    <a href='tablaestudiantes.php' class='btn btn-primary'>Ver lista de estudiantes</a>
                </div>
            </div>";
        } else {
            echo "
            <div class='container mt-4 d-flex justify-content-center'>
                <div class='alert alert-danger text-center' style='max-width: 95%;'>
                    <h4 class='alert-heading'>Error al actualizar el registro</h4>
                    <p>Hubo un problema al guardar los datos: " . $conn->error . "</p>
                </div>
            </div>";
        }

        $conn->close();
        }

        // Obtener datos del estudiante para precargar en el formulario
        $id_estudiante = $_GET['id_estudiante'] ?? '';
        $student_data = get_student_data($id_estudiante);
    ?>

    <form class="d-block p-3 m-4 h-100" class="formulario" name="formulario" method="POST" action="<?=$_SERVER ['PHP_SELF'] ?>" enctype="multipart/form-data" autocomplete="on" onsubmit="showAlert()">

        <div class="filas">
            <div class="titulo">
                <h5>Datos Personales</h5>
            </div>

            <!-- Campo oculto para el ID del estudiante, sirve solo para que el sistema identifique el id del estudiante a editar y traiga y actualice sus datos -->
            <input type="hidden" id="id_estudiante" name="id_estudiante" value="<?php echo htmlspecialchars($student_data['id_estudiante'] ?? ''); ?>" />

            <div class="fila">
                <div class="columna">
                    <label class="form-label text-black-50" for="nombre">Nombre completo *</label>
                    <input type="text" class="form-control upLetra" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($student_data['nombre'] ?? ''); ?>" required pattern="^[a-zA-Z\s]{3,}$" />
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="apellido">Apellido completo *</label>
                    <input type="text" class="form-control upLetra" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo htmlspecialchars($student_data['apellido'] ?? ''); ?>" required pattern="^[a-zA-Z\s]{3,}$" />
                </div>
            </div>
            <div class="fila">
                <div class="columna">
                    <label class="form-label text-black-50" for="email">Email electrónico *</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="juan@ejemplo.com" value="<?php echo htmlspecialchars($student_data['email'] ?? ''); ?>" required />
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="telefono">Número de teléfono *</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo htmlspecialchars($student_data['telefono'] ?? ''); ?>" required />
                </div>
            </div>
            <div class="fila">
                <div class="columna">
                    <label class="form-label text-black-50" for="tipo_documento">Tipo documento *</label>
                    <select class="form-control select" id="tipo_documento" name="tipo_documento" value="<?php echo htmlspecialchars($student_data['tipo_documento'] ?? ''); ?>" required>
                        <option value="DNI">DNI</option>
                    </select>
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="dni_estudiante">Número de documento *</label>
                    <input type="number" class="form-control" id="dni_estudiante" name="dni_estudiante" placeholder="12345678" value="<?php echo htmlspecialchars($student_data['dni_estudiante'] ?? ''); ?>" required />
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="nro_legajo">Número de legajo *</label>
                    <input type="text" class="form-control" id="nro_legajo" name="nro_legajo" value="<?php echo htmlspecialchars($student_data['nro_legajo'] ?? ''); ?>" required />
                </div>
            </div>
            <div class="fila">
                <div class="columna">
                    <label class="form-label text-black-50" for="genero">Género *</label>
                    <select class="form-control select" id="genero" name="genero" value="<?php echo htmlspecialchars($student_data['genero'] ?? ''); ?>" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="fecha_nacimiento">Fecha Nacimiento *</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars($student_data['fecha_nacimiento'] ?? ''); ?>" required />
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="pais_nacimiento">País de nacimiento *</label>
                    <input type="text" class="form-control upLetra" id="pais_nacimiento" name="pais_nacimiento" placeholder="País de nacimiento" value="<?php echo htmlspecialchars($student_data['pais_nacimiento'] ?? ''); ?>" required />
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="lugar_nacimiento">Lugar de nacimiento *</label>
                    <input type="text" class="form-control upLetra" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="Lugar de nacimiento" value="<?php echo htmlspecialchars($student_data['lugar_nacimiento'] ?? ''); ?>" required />
                </div>
            </div>
        </div>
        <div class="fila">
            <div class="columna">
                <label class="form-label text-black-50" for="familia_a_cargo">Familia a cargo *</label>
                <select class="form-control select" id="familia_a_cargo" name="familia_a_cargo" value="<?php echo htmlspecialchars($student_data['familia_a_cargo'] ?? ''); ?>" required>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="columna">
                <label class="form-label text-black-50" for="hijos">Hijos *</label>
                <select class="form-control select" id="hijos" name="hijos" value="<?php echo htmlspecialchars($student_data['hijos'] ?? ''); ?>" required>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4 o mas</option>
                </select>
            </div>
            <div class="columna">
                <label class="form-label text-black-50" for="trabaja">Trabaja *</label>
                <select class="form-control select" id="trabaja" name="trabaja" value="<?php echo htmlspecialchars($student_data['trabaja'] ?? ''); ?>" required>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
        </div>

        <div class="filas">
            <div class="titulo">
                <h5>Domicilio</h5>
            </div>
        
            <div class="fila">
                <div class="columna">
                    <label class="form-label text-black-50" for="pais_dom">País de domicilio *</label>
                    <input type="text" class="form-control upLetra" id="pais_dom" name="pais_dom" placeholder="País de domicilio" value="<?php echo htmlspecialchars($student_data['pais_dom'] ?? ''); ?>" required/>
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="provincia">Provincia *</label>
                    <input type="text" class="form-control upLetra" id="provincia" name="provincia" placeholder="Provincia" value="<?php echo htmlspecialchars($student_data['provincia'] ?? ''); ?>" required/>
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="partido">Partido *</label>
                    <input type="text" class="form-control upLetra" id="partido" name="partido" placeholder="Partido" value="<?php echo htmlspecialchars($student_data['partido'] ?? ''); ?>" required/>
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="localidad">Localidad *</label>
                    <input type="text" class="form-control upLetra" id="localidad" name="localidad" placeholder="Localidad" value="<?php echo htmlspecialchars($student_data['localidad'] ?? ''); ?>" required>
                </div>
            </div>
            <div class="fila">
                <div class="columna">
                    <label class="form-label text-black-50" for="calle">Calle *</label>
                    <input type="text" class="form-control upLetra" id="calle" name="calle" placeholder="Calle" value="<?php echo htmlspecialchars($student_data['calle'] ?? ''); ?>" required>
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="numero">Número *</label>
                    <input type="number" class="form-control" id="numero" name="numero" placeholder="Número" value="<?php echo htmlspecialchars($student_data['numero'] ?? ''); ?>" required pattern="\d{1,6}$" />
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="piso">Piso</label>
                    <input type="text" class="form-control" id="piso" name="piso" placeholder="Piso" value="<?php echo htmlspecialchars($student_data['piso'] ?? ''); ?>">
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="departamento">Departamento</label>
                    <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Departamento" value="<?php echo htmlspecialchars($student_data['departamento'] ?? ''); ?>"/>
                </div>
            </div>
            <div class="fila">
                <div class="columna">
                    <label class="form-label text-black-50" for="edificio">Edificio</label>
                    <input type="text" class="form-control upLetra" id="edificio" name="edificio" placeholder="Edificio" value="<?php echo htmlspecialchars($student_data['edificio'] ?? ''); ?>">
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="codigo_postal">Código Postal *</label>
                    <input type="number" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Código Postal" value="<?php echo htmlspecialchars($student_data['codigo_postal'] ?? ''); ?>" required pattern="\d{2,8}$"/>
                </div>
            </div>
        </div>

        <div class="filas">
            <div class="titulo">
                <h5>Estudios Secundarios</h5>
            </div>

            <div class="fila">
                <div class="columna">
                    <label class="form-label text-black-50" for="nombre_escuela">Nombre de la Escuela *</label>
                    <input type="text" class="form-control upLetra" id="nombre_escuela" name="nombre_escuela" placeholder="Nombre de la Escuela" value="<?php echo htmlspecialchars($student_data['nombre_escuela'] ?? ''); ?>" required/>
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="titulo_secundario">Título Secundario *</label>
                    <input type="text" class="form-control" id="titulo_secundario" name="titulo_secundario" placeholder="Título Secundario" value="<?php echo htmlspecialchars($student_data['titulo_secundario'] ?? ''); ?>" required/>
                </div>
            </div>
            <div class="fila">
                <div class="columna">
                    <label class="form-label text-black-50" for="anio_de_egreso">Año de Egreso *</label>
                    <input type="number" class="form-control" id="anio_de_egreso" name="anio_de_egreso" value="<?php echo htmlspecialchars($student_data['anio_de_egreso'] ?? ''); ?>" required/>
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="titulo_certificado">Título Certificado *</label>
                    <select class="form-control select" id="titulo_certificado" name="titulo_certificado" placeholder="Título Certificado" value="<?php echo htmlspecialchars($student_data['titulo_certificado'] ?? ''); ?>" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="titulo_tecnico">Título Técnico *</label>
                    <select class="form-control select" id="titulo_tecnico" name="titulo_tecnico" placeholder="Título Técnico" value="<?php echo htmlspecialchars($student_data['titulo_tecnico'] ?? ''); ?>" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="columna">
                    <label class="form-label text-black-50" for="titulo_hab">Título Habilitante *</label>
                    <select class="form-control select" id="titulo_hab" name="titulo_hab" placeholder="Título Habilitante" value="<?php echo htmlspecialchars($student_data['titulo_hab'] ?? ''); ?>" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="fila">
            <div class="titulo">
                <h5>Documentacion</h5>
            </div>
        </div>

        <div class="fila">
            <div class="columna">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="doc_dni" name="doc_dni" <?php if (isset($student_data['doc_dni']) && $student_data['doc_dni'] == 'Sí') echo 'checked'; ?>>
                    <label class="form-check-label" for="defaultCheck1">DNI (frente y dorso)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="doc_medico" name="doc_medico" <?php if (isset($student_data['doc_medico']) && $student_data['doc_medico'] == 'Sí') echo 'checked'; ?> />
                    <label class="form-check-label" for="defaultCheck1">Certificado medico</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="analitico" name="analitico" <?php if (isset($student_data['analitico']) && $student_data['analitico'] == 'Sí') echo 'checked'; ?> />
                    <label class="form-check-label" for="defaultCheck1">Analitico</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="doc_nacimiento" name="doc_nacimiento" <?php if (isset($student_data['doc_nacimiento']) && $student_data['doc_nacimiento'] == 'Sí') echo 'checked'; ?> />
                    <label class="form-check-label" for="defaultCheck1">Partida Nacimiento</label>
                </div>
            </div>
            <div class="columna">
                <label class="form-label text-black-50" for="documentacion_completa">Documentación Completa *</label>
                <select class="form-control select" id="documentacion_completa" name="documentacion_completa" value="<?php echo htmlspecialchars($student_data['documentacion_completa'] ?? ''); ?>" required>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="columna">
                <label class="form-label text-black-50" for="repositorio_documentacion">Repositorio de Documentación *</label>
                <input type="text" class="form-control" id="repositorio_documentacion" name="repositorio_documentacion" placeholder="Repositorio de Documentación" value="<?php echo htmlspecialchars($student_data['repositorio_documentacion'] ?? ''); ?>" required />
            </div>
        </div>

        <div class="filas">
            <div class="titulo">
                <h5>Otros Datos</h5>
            </div>
            
            <div class="filas">
                <div class="fila">
                    <div class="columna">
                        <label class="form-label text-black-50" for="plan_carrera">Plan de Carrera *</label>
                        <select class="form-control select" id="plan_carrera" name="plan_carrera" placeholder="Plan de Carrera" value="<?php echo htmlspecialchars($student_data['plan_carrera'] ?? ''); ?>" required>
                            <option value="Tecnicatura superior en desarrollo de software">Tecnicatura superior en desarrollo de software</option>
                        </select>  
                    </div>
                    <div class="columna">
                        <label class="form-label text-black-50" for="estado_inscripcion">Estado de Inscripción *</label>
                        <select class="form-control select" id="estado_inscripcion" name="estado_inscripcion" value="<?php echo htmlspecialchars($student_data['estado_inscripcion'] ?? ''); ?>" required>
                            <option value="Completo">Completo</option>
                            <option value="Incompleto">Incompleto</option>
                        </select>
                    </div>
                    <div class="columna">
                        <label class="form-label text-black-50" for="estado_estudiante">Estado del Estudiante *</label>
                        <select class="form-control select" id="estado_estudiante" name="estado_estudiante" value="<?php echo htmlspecialchars($student_data['estado_estudiante'] ?? ''); ?>" required>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="columna">
                <label class="form-label text-black-50" for="observaciones">Observaciones</label>
                <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones" rows="3"><?php echo htmlspecialchars($student_data['observaciones'] ?? ''); ?></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Datos</button>
    </form>
    <script>document.getElementById('repositorio_documentacion').addEventListener('input', function () {
        const input = this;
        const pattern = /^https:\/\/drive\.google\.com\/.*$/;

        if (!pattern.test(input.value)) {
            input.setCustomValidity('Por favor, ingrese un enlace válido de Google Drive (debe comenzar con "https://drive.google.com/").');
        } else {
            input.setCustomValidity('');
        }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9iIA5g08fN1uMzKjRsjYAmk/JEd1a2T2OXFik7kA9B43a8b2AT" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-QUT2k+S5b0EXG1g9U5B2rNwM8D0myO1yRzXp5zqFvKeMTff3S5uDDUqFMRh06jJr" crossorigin="anonymous"></script>
</body>
</html>
