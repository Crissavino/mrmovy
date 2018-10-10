<?php 
    require_once('header.php');

    if (!estaLogueado()) {
      header('location: login.php');
      exit;
    }

    if ($_POST) {
      cambiarEncuesta($_SESSION['id']);
    }

    if (!completoEncuesta($_SESSION['id'])) {
      header('location: paso1.php');
      exit;
    }

    $db = new MySQL_DB();

    $tablaPeliculas = $db->traerTabla('movies');


 ?>


            <section class="contenedor">

                <div class="notificacion">
                    <p>Selecciona tus <a href="#">películas favoritas</a> para aumentar tu nivel de coincidencia</p>
                </div>

                <h2 class="titulo-resultados"><span>¡Felicitaciones!</span> Estas son nuestras recomendaciones según tus gustos, prometemos no defraudarte :)</h2>

                <?php foreach ($tablaPeliculas as $key => $value): ?>
                    <article class="tarjeta-resultados">
                    <img src="<?= $value['cover']; ?>" class="tarjeta-pelicula" alt="">
                    <div class="pelicula">
                        <h2><?= $value['title']; ?></h2>
                        <p class="fecha"><?= $value['year']; ?></p>
                        <p class="generos"><?= $value['genre_id']; ?></p>
                        <p class="actores"><?= $value['actor']; ?></p>
                        <p class="director">Dirigida por <strong><?= $value['producer']; ?></strong></p>
                        <div class="botones">
                            <a href="info.php"><div class="boton-gris">
                              Más info
                            </div></a>
                            <div class="boton-gris boton-netflix">
                              <img src="images/logo-netflix.png" alt="">
                            </div>
                            <div class="boton-gris trailer">
                              <img src="images/ver-trailer.png" alt="">Trailer
                            </div>
                            <div class="lavi boton">
                              La ví
                            </div>
                        </div>
                    </div>
                </article>
                <?php endforeach ?>

            </section>
            <?php require_once('footer.php') ?>
    </body>
</html>
