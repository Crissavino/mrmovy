<?php 
    require_once('header.php');
    require ('classes/Validador.php');
    require ('classes/Auth.php'); 
    require_once ('classes/Pelicula.php');


  $validador = new Validador();
  $auth = new Auth();

  if (!estaLogueado()) {
    header('location: index.php');
    exit;
  }
 
  // inicializo las variables para persistirlas
    $title = '';
    $genre_id = '';
    $tag_id = '';
    $year = '';
    $length = '';
    $resume = '';
    $actor = '';
    $producer = '';
    $netflix = '';
    $trailer = '';

    $erroresCarga = [];

    if ($_POST) {
        $title = $_POST['title'];
        $genre_id = $_POST['genre_id'];
        $tag_id = $_POST['tag_id'];
        $year = $_POST['year'];
        $length = $_POST['length'];
        $resume = $_POST['resume'];
        $actor = $_POST['actor'];
        $producer = $_POST['producer'];
        $netflix = $_POST['netflix'];
        $trailer = $_POST['trailer'];

        $erroresCarga = $validador->Pelicula($_POST, 'cover');

        if (empty($erroresCarga)) {
            //guardo la portada usando las funciones no objetos
            $cover = guardarPortada('cover');

        //     //guardo la pelicula
            $model = new Pelicula([ 'cover' => 'NADA',
                                    'title' => $title,
                                    'genre_id' => $genre_id,
                                    'tag_id' => $tag_id,
                                    'year' => $year,
                                    'length' => $length,
                                    'resume' => $resume,
                                    'actor' => $actor,
                                    'producer' => $producer,
                                    'netflix' => $netflix,
                                    'trailer' => $trailer
                                ]);
            $urlCover = $model->urlPortada('cover');
            $model->setAttr('cover', $urlCover);
            $model->save();
            header('location: carga.php?success=true');
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

           <?php if (isset($_GET['success'])): ?>
               <p>La película cargó correctamente</p>
           <?php endif ?>

            <h1 class="titulo-carga">Cargar una película</h1>
            <form class="formulario-carga" action="carga.php" method="post" enctype="multipart/form-data">
                <label for="name">Portada de la pélicula</label><br>
                <input type="file" name="cover" value="<?= isset($_FILES['cover']) ? $_FILES['cover']['name'] : null ?>"><br>
                <?= isset($erroresCarga['cover']) ? $erroresCarga['cover'] : '' ;?>

                <label for="">Título: </label><br>
                <input type="text" name="title" value="<?= $title ?>"><br>
                <?= isset($erroresCarga['title']) ? $erroresCarga['title'] : '' ?><br>

                <label for="">Géneros: </label><br>
                <input type="text" name="genre_id" value="<?= $genre_id ?>"><br>
                <?= isset($erroresCarga['genre_id']) ? $erroresCarga['genre_id'] : '' ?><br>

                <label for="">Tags: </label><br>
                <input type="text" name="tag_id" value="<?= $tag_id ?>"><br>
                <?= isset($erroresCarga['tag_id']) ? $erroresCarga['tag_id'] : '' ?><br>

                <label for="">Año: </label><br>
                <input type="text" name="year" value="<?= $year ?>"><br>
                <?= isset($erroresCarga['year']) ? $erroresCarga['year'] : '' ?><br>

                <label for="">Duración: </label><br>
                <input type="text" name="length" value="<?= $length ?>"><br>
                <?= isset($erroresCarga['length']) ? $erroresCarga['length'] : '' ?><br>

                <!-- ver como hacer para persistir el resumen (textarea) -->
                <label for="">Resúmen: </label><br>
                <textarea name="resume" rows="8" cols="80" value="<?= $resume ?>"></textarea><br>
                <?= isset($erroresCarga['resume']) ? $erroresCarga['resume'] : '' ?><br>

                <label for="">Actores: </label><br>
                <input type="text" name="actor" value="<?= $actor ?>"><br>
                <?= isset($erroresCarga['actor']) ? $erroresCarga['actor'] : '' ?><br>

                <label for="">Producción: </label><br>
                <input type="text" name="producer" value="<?= $producer ?>"><br>
                <?= isset($erroresCarga['producer']) ? $erroresCarga['producer'] : '' ?><br>

                <label for="">Enlace a Netflix: </label><br>
                <input type="url" name="netflix" value="<?= $netflix ?>"><br>
                <?= isset($erroresCarga['netflix']) ? $erroresCarga['netflix'] : '' ?><br>

                <label for="">Trailer: </label><br>
                <input type="url" name="trailer" value="<?= $trailer ?>"><br>
                <?= isset($erroresCarga['trailer']) ? $erroresCarga['trailer'] : '' ?><br>

                <button type="boton" class="boton" name="button">Enviar Película</button>
            </form>
        </section>






    <?php require_once('footer.php') ?>
    </body>
</html>
