    <footer class="fondo-blanco">
      <div class="contenedor">
        <img class="" src="images/favicon.png" alt="" class="claqueta">
        <?php if (estaLogueado()): ?>
          <nav class="menu-footer">
              <ul>
                  <li> <a href="resultados.php">Mis resultados</a> </li>
                  <li> <a href="#">Mis estadísticas</a> </li>
                  <li> <a href="logout.php" class="enlace-azul">Cerrar sesión</a> </li>
              </ul>
          </nav>
          <?php else: ?>
            <nav class="menu-footer">
                <ul>
                  <li><a href="#home">Inicio</a></li>
                  <li><a href="#acercade" class="efecto">Acerca de</a></li>
                  <li class="borde-derecho-gris"><a href="#FAQ">Preguntas frecuentes</a></li>
                  <li><a href="login.php" class="enlace-azul">Iniciar sesión</a></li>
                  <li><a href="registro.php" class="enlace-azul">Registrate</a></li>
                </ul>
            </nav>
        <?php endif; ?>
        <div class="copyright">©2018 MrMovy. Todos los derechos reservados</div>
      </div>
    </footer>
</div>
