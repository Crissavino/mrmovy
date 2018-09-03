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

                <div class="">
                    <p><span>¡Bienvenido <?php //nombre guardado en la cookie ?>!</span> Ayúdanos a configurar tus gustos y preferencias, será breve :)</p>
                </div>

                <h2><span>Paso 1 de 3:</span> elije tus géneros preferidos</h2>
                <p>Elije tus géneros de preferencia, <b>solo puedes elegir hasta 3 géneros.</b></p>

                <section class="generos">
                    <form class="" action="paso2.php" method="post">

                        <div class="genero">
                            <input type="checkbox" name="genero" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="genero">
                            <input type="checkbox" name="genero" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="genero">
                            <input type="checkbox" name="genero" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="genero">
                            <input type="checkbox" name="genero" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="genero">
                            <input type="checkbox" name="genero" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="genero">
                            <input type="checkbox" name="genero" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="genero">
                            <input type="checkbox" name="genero" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="genero">
                            <input type="checkbox" name="genero" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="genero">
                            <input type="checkbox" name="genero" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="genero">
                            <input type="checkbox" name="genero" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="genero">
                            <input type="checkbox" name="genero" value="accion">
                            <label for="">acción</label>
                        </div>
                        <div class="genero">
                            <input type="checkbox" name="genero" value="accion">
                            <label for="">acción</label>
                        </div>

                        <button type="submit" name="button" class="boton" >Siguiente paso</button>
                    </form>




                </section>
            </section>
            <?php require_once('footer.php') ?>
    </body>
</html>
