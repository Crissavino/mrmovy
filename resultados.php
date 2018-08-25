<?php require_once('funciones.php') ?>
<?php require_once('header.php') ?>

<?php

  if (!estaLogueado()) {
    header('location: login.php');
    exit;
  }


 ?>


            <section class="contenedor">

                <div class="">
                    <p>Selecciona <span>tus peliculas favoritas</span> para aumentar tu nivel de coincidencia</p>
                </div>

                <h2><p><span>¡Felicitaciones!</span> Estas son nuestras recomendaciones según tus gustos, prometemos no desfraudarte :)</p></h2>

                <article class="tarjeta">
                    <img src="" class="tarjeta-pelicula" alt="">
                    <div class="">
                        <h2>The Shawshank Redemption</h2>
                        <p class="fecha">2011</p>
                        <span>Acción, Drama</span>
                        <p>Actor 1, Actor2</p>
                        <p>Dirigida por Director</p>
                        <div class="info"><a href="info.php">Más información</a></div>
                        <div class="netflix">

                        </div>
                        <div class="trailer">
                          Ver trailer
                        </div>
                        <div class="lavi boton">
                          La ví
                        </div>
                    </div>
                </article>

                <article class="tarjeta">
                    <img src="" class="tarjeta-pelicula" alt="">
                    <div class="">
                        <h2>The Shawshank Redemption</h2>
                        <p class="fecha">2011</p>
                        <span>Acción, Drama</span>
                        <p>Actor 1, Actor2</p>
                        <p>Dirigida por Director</p>
                        <div class="info"><a href="info.php">Más información</a></div>
                        <div class="netflix">

                        </div>
                        <div class="trailer">
                          Ver trailer
                        </div>
                        <div class="lavi boton">
                          La ví
                        </div>
                    </div>
                </article>

                <article class="tarjeta">
                    <img src="" class="tarjeta-pelicula" alt="">
                    <div class="">
                        <h2>The Shawshank Redemption</h2>
                        <p class="fecha">2011</p>
                        <span>Acción, Drama</span>
                        <p>Actor 1, Actor2</p>
                        <p>Dirigida por Director</p>
                        <div class="info"><a href="info.php">Más información</a></div>
                        <div class="netflix">

                        </div>
                        <div class="trailer">
                          Ver trailer
                        </div>
                        <div class="lavi boton">
                          La ví
                        </div>
                    </div>
                </article>

            </section>
            <?php require_once('footer.php') ?>
    </body>
</html>
