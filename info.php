<?php require_once('funciones.php') ?>
<?php require_once('header.php') ?>

<?php

  if (!estaLogueado()) {
    header('location: login.php');
    exit;
  }

 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

      <section class="contenedor mas-info">

        <div class="sidebar">
            <div class="portada-sidebar">
                <img src="images/peli.jpg" alt="" class="portada-pelicula">
            </div>

            <div class="botones-sidebar">
                <a href="resultados.php">
                  <div class="boton">
                    Volver a los resultados
                  </div>
                </a>
                <div class="botones-extras">
                  <div class="boton-gris">
                    <img src="images/logo-netflix.png" alt="">
                  </div>

                  <div class="boton-gris trailer">
                    <img src="images/ver-trailer.png" alt="">Trailer
                  </div>
                </div>
            </div>

        </div>

        <div class="info-pelicula">
          <h1>The Shawshank Redemption</h1>

          <div class="boton-info text-azul">
            Acción, Drama
          </div>
          <div class="boton-info">
            1994
          </div>
          <div class="boton-info">
            2h 22min
          </div>

          <div class="resumen-pelicula">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>

          <h2>Actores</h2>
          <div class="boton-info">
            Actor 1
          </div>
          <div class="boton-info">
            Actor 1
          </div>
          <div class="boton-info">
            Actor 1
          </div>

          <h2>Producción</h2>
          <div class="boton-info">
            Productor 1
          </div>
          <div class="boton-info">
            Productor 2
          </div>

        </div>

      </section>

      <?php require_once('footer.php') ?>
    </body>
</html>
