<?php require_once('header.php') ?>

<?php

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

 ?>


            <section class="contenedor">

                <div class="notificacion">
                    <p>Selecciona tus <a href="#">películas favoritas</a> para aumentar tu nivel de coincidencia</p>
                </div>

                <h2 class="titulo-resultados"><span>¡Felicitaciones!</span> Estas son nuestras recomendaciones según tus gustos, prometemos no defraudarte :)</h2>

                <article class="tarjeta-resultados">
                    <img src="images/peli.jpg" class="tarjeta-pelicula" alt="">
                    <div class="pelicula">
                        <h2>The Shawshank Redemption</h2>
                        <p class="fecha">2011</p>
                        <p class="generos">Acción, Drama</p>
                        <p class="actores">Actor 1, Actor2</p>
                        <p class="director">Dirigida por <strong>Director</strong></p>
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

                <article class="tarjeta-resultados">
                    <img src="images/peli.jpg" class="tarjeta-pelicula" alt="">
                    <div class="pelicula">
                        <h2>The Shawshank Redemption</h2>
                        <p class="fecha">2011</p>
                        <p class="generos">Acción, Drama</p>
                        <p class="actores">Actor 1, Actor2</p>
                        <p class="director">Dirigida por <strong>Director</strong></p>
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

                <article class="tarjeta-resultados">
                    <img src="images/peli.jpg" class="tarjeta-pelicula" alt="">
                    <div class="pelicula">
                        <h2>The Shawshank Redemption</h2>
                        <p class="fecha">2011</p>
                        <p class="generos">Acción, Drama</p>
                        <p class="actores">Actor 1, Actor2</p>
                        <p class="director">Dirigida por <strong>Director</strong></p>
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

            </section>
            <?php require_once('footer.php') ?>
    </body>
</html>
