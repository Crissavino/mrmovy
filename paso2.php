<?php require_once('funciones.php') ?>
<?php require_once('header.php') ?>

            <section class="contenedor">

                <h2><span>Paso 2 de 3:</span> Elije tematicas de preferencia</h2>
                <p>¿Qué temas tiene que contener la trama de una buena película? <b>Solo puedes elegir hasta 3 opciones.</b></p>

                <section class="tematica">
                    <form class="" action="paso3.php" method="post">

                        <div class="tematica">
                            <input type="checkbox" name="tematica" value="amor">
                            <label for="">amor</label>
                        </div>
                        <div class="tematica">
                            <input type="checkbox" name="tematica" value="disparos">
                            <label for="">disparos</label>
                        </div>
                        <div class="tematica">
                            <input type="checkbox" name="tematica" value="dinero">
                            <label for="">dinero</label>
                        </div>
                        <div class="tematica">
                            <input type="checkbox" name="tematica" value="musica">
                            <label for="">musica</label>
                        </div>
                        <div class="tematica">
                            <input type="checkbox" name="tematica" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="tematica">
                            <input type="checkbox" name="tematica" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="tematica">
                            <input type="checkbox" name="tematica" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="tematica">
                            <input type="checkbox" name="tematica" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="tematica">
                            <input type="checkbox" name="tematica" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="tematica">
                            <input type="checkbox" name="tematica" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="tematica">
                            <input type="checkbox" name="tematica" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="tematica">
                            <input type="checkbox" name="tematica" value="accion">
                            <label for="">acción</label>
                        </div>

                        <button type="submit" name="button" class="boton" >Siguiente paso</button>
                    </form>
                </section>
            </section>
            <?php require_once('footer.php') ?>
    </body>
</html>