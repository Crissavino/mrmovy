<?php require_once('funciones.php') ?>
<?php require_once('header.php') ?>

<?php

  if (!estaLogueado()) {
    header('location: login.php');
    exit;
  }
  // inicializo las variables para persistirlas
    $titulo = '';
    $genero = '';
    $anio = '';
    $duracion = '';
    $resumen = '';
    $actores = '';
    $produccion = '';
    $netflix = '';
    $trailer = '';

    $erroresCarga = [];

    if ($_POST) {
        $titulo = $_POST['titulo'];
        $genero = $_POST['genero'];
        $anio = $_POST['anio'];
        $duracion = $_POST['duracion'];
        $resumen = $_POST['resumen'];
        $actores = $_POST['actores'];
        $produccion = $_POST['produccion'];
        $netflix = $_POST['netflix'];
        $trailer = $_POST['trailer'];

        $erroresCarga = validarCarga($_POST, 'portada');

        if (empty($erroresCarga)) {
            //guardo la portada
            guardarPortada('portada');
            //guardo la pelicula
            guardarPelicula($_POST, 'portada');
            header('location: perfil.php');
            exit;
        }
    }
 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <section class="contenedor">
            <form class="" action="carga.php" method="post" enctype="multipart/form-data">
                <label for="name">Cargar la portada de la pélicula</label><br>
                <input type="file" name="portada" value="<?= isset($_FILES['portada']) ? $_FILES['portada']['name'] : null ?>"><br>
                <?= isset($erroresCarga['portada']) ? $erroresCarga['portada'] : '' ;?>


                <label for="">Título: </label><br>
                <input type="text" name="titulo" value="<?= $titulo ?>"><br>
                <?= isset($erroresCarga['titulo']) ? $erroresCarga['titulo'] : '' ?><br>

                <label for="">Géneros: </label><br>
                <input type="text" name="genero" value="<?= $genero ?>"><br>
                <?= isset($erroresCarga['genero']) ? $erroresCarga['genero'] : '' ?><br>

                <label for="">Año: </label><br>
                <input type="text" name="anio" value="<?= $anio ?>"><br>
                <?= isset($erroresCarga['anio']) ? $erroresCarga['anio'] : '' ?><br>

                <label for="">Duración: </label><br>
                <input type="text" name="duracion" value="<?= $duracion ?>"><br>
                <?= isset($erroresCarga['duracion']) ? $erroresCarga['duracion'] : '' ?><br>

                <!-- ver como hacer para persistir el resumen (textarea) -->
                <label for="">Resúmen: </label><br>
                <textarea name="resumen" rows="8" cols="80" value="<?= $resumen ?>"></textarea><br>
                <?= isset($erroresCarga['resumen']) ? $erroresCarga['resumen'] : '' ?><br>

                <label for="">Actores: </label><br>
                <input type="text" name="actores" value="<?= $actores ?>"><br>
                <?= isset($erroresCarga['actores']) ? $erroresCarga['actores'] : '' ?><br>

                <label for="">Producción: </label><br>
                <input type="text" name="produccion" value="<?= $produccion ?>"><br>
                <?= isset($erroresCarga['produccion']) ? $erroresCarga['produccion'] : '' ?><br>

                <label for="">Enlace a Netflix: </label><br>
                <input type="url" name="netflix" value="<?= $netflix ?>"><br>
                <?= isset($erroresCarga['netflix']) ? $erroresCarga['netflix'] : '' ?><br>

                <label for="">Trailer: </label><br>
                <input type="url" name="trailer" value="<?= $trailer ?>"><br>
                <?= isset($erroresCarga['trailer']) ? $erroresCarga['trailer'] : '' ?><br>

                <button type="boton" name="button">Enviar Película</button>
            </form>
        </section>






    <?php require_once('footer.php') ?>
    </body>
</html>
