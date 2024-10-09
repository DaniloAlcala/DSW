<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home-ISFT 225</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
<?php 
    include "variablesPath.php";
    require(rutas::$pathConection);
    $msge = "<h5 style='color: #CA2E2E;'></h5>";
?>
<?php 
    // Obtener el ID del registro a editar
$id_materia = $_GET['id_materia'];

    if ($id_materia === null || !is_numeric($id_materia)) {
        header("Location: tablalistadodematerias.php");
        // Exit para detener la ejecución
        exit();
    }
   
// Obtener los datos del registro actual

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}


$sql = "SELECT id_materia,
cod_num,
cod_alpha,
denominacion_materia,
tipo_aprobacion,
nota_min_aprobacion,
correlatividades,
estado_materia,
campo_formativo,
carga_horaria_materia,
id_carrera,
anio_carrera
FROM materia WHERE id_materia=$id_materia";
        
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Cerrar la conexión
$conn->close();
include rutas::$pathNuevoHeader;
?>

<main>
    <!-- Contenedor principal -->
    <div class="d-flex flex-nowrap sidebar-height"> 
      <!-- Aside/Wardrobe/Sidebar Menu --> 
      <?php
      //include "sidebar.php"; 
        ?>  
      <!-- Fin de sidebar/aside -->
      <!-- Contenedor de ventana de contenido -->
      <div class="container-fluid">
            <div class="table-responsive ">
                <h3 class="card-footer-text mt-2 mb-5 p-2">Materia</h3>
                <div class="m-4">
                    <h2 class="text-dark-subtle title">Ver Materia</h2>
                    <?=$msge?>
                    <!-- <h6 class="text-black-50">
                        *Dar de alta las Materias para la carrera correspondiente
                    </h6> -->
                </div>
                <div>
                    <form class="row g-3 m-4" action="vermateria.php" method="POST">
                        <!-- 
                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="id_carrera">Id de Carrera*:</label>
                            <input class="form-control" type="hidden" name="id_carrera" id="id_carrera" required>
                      </div>  -->

                        <div class="col-md-6 position-relative">
                            <input class="form-control" type="hidden" name="id_materia" value="<?= $row['id_materia'] ?>"readonly>

                            <label class="form-label text-black-50" for="cod_num">Año Materia:</label>
                            <input class="form-control" type="text" name="cod_num" id="cod_num" value="<?= $row['cod_num'] ?>"readonly>
                        </div>

                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="cod_alpha">Código Alfabético</label>
                            <input class="form-control" type="text" name="cod_alpha" id="cod_alpha" value="<?= $row['cod_alpha'] ?>"readonly>
                        </div>

                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="denominacion_materia">Denominación Materia:</label>
                            <input class="form-control" type="text" name="denominacion_materia" id="denominacion_materia" value="<?= $row['denominacion_materia'] ?>"readonly>
                        </div>

                        <div class="col-md-6 position-relative">
                            <label class="form-label text-black-50" for="tipo_aprobacion">Tipo Aprobación</label>
                            <input class="form-control" type="text" name="tipo_aprobacion" id="tipo_aprobacion" value="<?= $row['tipo_aprobacion'] ?>"readonly>
                        </div>


                        <div class="col-md-6 position-relative">
                          <label class="form-label text-black-50" for="nota_min_aprobacion">Mínimo de aprobación para la materia*:</label>
                            <input class="form-control" type="text" name="nota_min_aprobacion" id="nota_min_aprobacion" value="<?= $row['nota_min_aprobacion'] ?>"readonly>
                      
                      </div>


                        <div class="col-md-3 position-relative">
                            <label class="form-label text-black-50" for="correlatividades">Correlativas</label>
                            <input class="form-control" type="text" name="correlatividades" id="correlatividades" value="<?= $row['correlatividades'] ?>"readonly>
                        </div>

                        <div class="col-md-3 position-relative">
                            <label class="form-label text-black-50" for="estado_materia">Estado Materia</label>
                            <input class="form-control" type="text" name="estado_materia" id="estado_materia" value="<?= $row['estado_materia'] ?>"readonly>
                        </div>
                        


                        <div class="col-md-3 position-relative">
                            <label class="form-label text-black-50" for="campo_formativo">Campo Formativo</label>
                            <input class="form-control" type="text" name="campo_formativo" id="campo_formativo" value="<?= $row['campo_formativo'] ?>"readonly>
                        </div>


                        <div class="col-md-3 position-relative">
                            <label class="form-label text-black-50" for="carga_horaria_materia">Carga Horaria</label>
                            <input class="form-control" type="text" name="carga_horaria_materia" id="carga_horaria_materia" value="<?= $row['carga_horaria_materia']." Horas" ?>"readonly>
                        </div>

                      
                    </form>



                    <div class="table-resposive mx-5">
                            <div class="d-flex mb-5 gap-2 justify-content-between align-content-center">
                                <a href="<?=rutas::$pathTablaListadoMaterias?>"><button class='btn btn-primary menu-icon border-0 px-4'>Volver</button></a>
                                <a href=<?=rutas::$pathVerMateriasCorrelativas."?id_materia=".$id_materia?>><button class='btn btn-primary menu-icon border-0 px-4'>Ver Correlativas</button></a>
                            </div>
                    </div>



                </div>
              </div>
        </div>
        <!-- Fin de contenido -->
      </div>
      <!-- Fin de contenedor principal -->
 </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>