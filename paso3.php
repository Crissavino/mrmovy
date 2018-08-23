<?php require_once('header.php') ?>


            <section class="contenedor">

                <h2><span>Paso 3 de 3:</span> Cuéntanos un poco acerca de lo que ya has visto</h2>

                <section class="peliclas">
                    <article class="pelicula">
                        <img src="" alt="">
                    </article>
                    <div>
                        <span>1 de 10</span>
                        <p><?php //titulo de la pelicula y año ?></p>

                        <section class="">

                            <form class="" action="index.html" method="post">
                                <div class="opciones">
                                    <input type="checkbox" name="opcion" value="vio-gusto">
                                    <label for="">La ví y me gustó</label>
                                </div>
                                <div class="opciones">
                                    <input type="checkbox" name="opcion" value="vio-igual">
                                    <label for="">La ví y me dá igual</label>
                                </div>
                                <div class="opciones">
                                    <input type="checkbox" name="opcion" value="vio-nogusto">
                                    <label for="">La ví y no me gusto</label>
                                </div>
                                <div class="opciones">
                                    <input type="checkbox" name="opcion" value="no-vio">
                                    <label for="">No la ví</label>
                                </div>
                            </form>

                        </section>

                    </div>
                    <!-- <div class="">
                        <form class="" action="index.html" method="post">

                            <button type="button" class="boton" name="button" value="">La ví y me gustó</button>
                            <button type="button" class="boton" name="button" value="">La ví y me dá igual</button>
                            <button type="button" class="boton" name="button" value="">La ví y no me gusto</button>
                            <button type="button" class="boton" name="button" value="">No la ví</button>

                        </form>
                    </div> -->
                </section>

            </section>
            <?php require_once('footer.php') ?>
    </body>
</html>
