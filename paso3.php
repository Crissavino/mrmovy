<?php require_once('funciones.php') ?>
<?php require_once('header.php') ?>

<?php


  // Si no está logueado, mando al usuario al login
  if (!estaLogueado()) {
    header('location: login.php');
    exit;
  }


 ?>

            <section class="contenedor">

                <h2><span>Paso 3 de 3:</span> Cuéntanos un poco acerca de lo que ya has visto</h2>

                <section class="peliclas">
                    <article class="tarjeta">
                        <img src="" alt="">
                        <div>
                            <span>1 de 10</span>
                            <p><?php //titulo de la pelicula y año ?></p>

                            <div class="">
                                <form class="" action="resultados.php" method="post">

                                    <button type="button" class="boton" name="button" value="">La ví y me gustó</button>
                                    <button type="button" class="boton" name="button" value="">La ví y me dá igual</button>
                                    <button type="button" class="boton" name="button" value="">La ví y no me gusto</button>
                                    <button type="button" class="boton" name="button" value="">No la ví</button>


                                </form>
                            </div>

                        </div>
                    </article>

                </section>

            </section>
            <?php require_once('footer.php') ?>
    </body>
</html>
