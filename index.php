<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <title>Mr Movy - Te recomendamos películas en base a tus gustos</title>
        <link rel="icon" type="image/png" href="images/favicon.png" />
    </head>
    <body class="fondo-blanco">
        <div class="container">
            <section class="inicio" id="home">
              <div class="contenedor">
                <header>
                    <a href="#"><img src="images/logo.png" alt="" class="logo"></a>
                    <div class="menu-movil">
                      <img src="images/menu-movil.png" alt="">
                    </div>
                    <nav class="menu-principal">
                        <ul>
                            <li><a href="#home">Inicio</a></li>
                            <li><a href="#acercade">Acerca de</a></li>
                            <li class="borde-derecho-blanco"><a href="#FAQ">FAQ's</a></li>
                            <li class="enlace-azul">
                              <a href="login.php" >Iniciar sesión</a>
                            </li>
                        </ul>
                    </nav>
                </header>

                <div class="texto-inicio">
                    <h2>Te recomendamos <strong>las mejores películas</strong> en base a tus gustos...</h2>
                    <a href="login.php"><div class="boton-comenzar">Comenzar ahora</div></a>
                </div>
              </div>
            </section>

            <section class="pasos" id="acercade">
                <div class="contenedor" >
                <div class="tarjeta-paso">
                    <div class="imagen-paso">
                      <img src="images/paso1.png" alt="">
                    </div>
                    <h2>Te registras en la web</h2>
                    <img src="images/flecha1.png" alt="" class="flecha-paso-1">
                    <img src="images/flecha-movil.png" alt="" class="flecha-movil">
                </div>
                <div class="tarjeta-paso">
                    <img src="images/flecha2.png" alt="" class="flecha-paso-2">
                    <div class="imagen-paso">
                      <img src="images/paso2.png" alt="">
                    </div>
                    <h2>Completas tus preferencias</h2>
                    <img src="images/flecha-movil.png" alt="" class="flecha-movil">
                </div>
                <div class="tarjeta-paso">
                    <div class="imagen-paso">
                      <img src="images/paso3.png" alt="">
                    </div>
                    <h2>Te sugerimos buenas peliculas</h2>
                    <img src="images/tick-azul.png" alt="" class="tick-paso-3">
                </div>
              </div>
            </section>

            <section class="estadisticas">
              <div class="contenedor">
                <div class="tarjeta-estadistica">
                    <h2 class="counter" data-count="250">250</h2>
                    <p>películas para recomendar</p>
                </div>
                <div class="tarjeta-estadistica">
                    <h2 class="counter" data-count="3560">3560</h2>
                    <p>recomendaciones hechas</p>
                </div>
                <div class="tarjeta-estadistica">
                    <h2 class="counter" data-count="50">50</h2>
                    <p>géneros destacados</p>
                </div>
                <div class="tarjeta-estadistica">
                    <h2 class="counter" data-count="135">135</h2>
                    <p>temáticas de tramas</p>
                </div>
              </div>
            </section>

            <section class="faqs" id="FAQ">
              <a name="FAQ"></a>
              <div class="contenedor">
                <h2>Preguntas frecuentes</h2>
                <p class="subtitulo">Algunas preguntas y respuestas que te pueden ayudar a entender el sitio</p>
                <div class="tarjeta-faq">
                    <h3>¿Como funciona la aplicacion?</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div class="tarjeta-faq">
                    <h3>¿Como funciona la aplicacion?</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div class="tarjeta-faq">
                    <h3>¿Como funciona la aplicacion?</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </section>

            <footer>
              <div class="contenedor">
                <img class="" src="images/favicon.png" alt="" class="claqueta">
                <nav class="menu-footer">
                    <ul>
                        <li><a href="#home">Inicio</a></li>
                        <li><a href="#acercade" class="efecto">Acerca de</a></li>
                        <li class="borde-derecho-gris"><a href="#FAQ">Preguntas frecuentes</a></li>
                        <li><a href="login.php" class="enlace-azul">Iniciar sesión</a></li>
                        <li><a href="registro.php" class="enlace-azul">Registrate</a></li>
                    </ul>
                </nav>
                <div class="copyright">©2018 MrMovy. Todos los derechos reservados</div>
              </div>
            </footer>
        </div>
    </body>
  <script src="js/efecto-ancla.js"></script>
  <script src="js/numeros.js"></script>
</html>
