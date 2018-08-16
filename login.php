<?php require_once('header.php') ?>

            <section class="login">
              <div class="contenedor">
                <div class="texto-formulario">
                    <h2><span>Hola</span>, logueate para continuar</h2>
                    <p>Bienvenido, ingresa para ver tus películas.</p>
                    <a href="#">Olvidé la contraseña</a> / <a href="registro.php">Registrarse</a>
                </div>

                <div class="formulario">
                    <form>
                            <input type="email" class="" id="email" placeholder="Direccion de correo electrónico" name="email" required>

                            <input type="password" class="" id="pass" placeholder="Tu contraseña" name="pass" required>

                            <label class="label-checkbox" for="recordar">Recordarme</label>
                            <input class="checkbox-recordar" type="checkbox" name="" value="" id="recordar">

                            <button type="submit" name="button" class="boton" >Iniciar sesión</button>

                    </form>
                  </div>
                </div>
            </section>

            <footer class="fondo-blanco">
              <div class="contenedor">
                <img class="" src="images/favicon.png" alt="" class="claqueta">
                <nav class="menu-footer">
                    <ul>
                      <li><a href="index.php">Inicio</a></li>
                      <li><a href="index.php#acercade">Acerca de</a></li>
                      <li class="borde-derecho-gris"><a href="index.php#FAQ">Preguntas frecuentes</a></li>
                      <li><a href="login.php" class="enlace-azul">Iniciar sesión</a></li>
                      <li><a href="registro.php" class="enlace-azul">Registrate</a></li>
                    </ul>
                </nav>
                <div class="copyright">©2018 MrMovy. Todos los derechos reservados</div>
              </div>
            </footer>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
