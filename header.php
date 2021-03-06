<?php require_once('funciones.php') ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/media.css">
        <title>Iniciar sesión - Mr Movy</title>
        <link rel="icon" type="image/png" href="images/favicon.png" />
    </head>
    <body>
        <div class="container">
            <header class="fondo-negro">
              <div class="contenedor">
                <a href="https://mrmovy.com"><img src="images/logo.png" alt="" class="logo"></a>
                <div class="menu-movil">
                  <img src="images/menu-movil.png" alt="">
                </div>
                <?php if (!estaLogueado()): ?>
                  <nav class="menu-principal">
                      <ul>
                          <li><a href="index.php">Inicio</a></li>
                          <li><a href="index.php#acercade">Acerca de</a></li>
                          <li class="borde-derecho-blanco"><a href="index.php#FAQ">FAQ's</a></li>
                          <li><a href="login.php" class="enlace-azul">Iniciar sesión</a></li>
                      </ul>
                  </nav>
                  <?php else: ?>
                    <nav class="menu-principal">
                        <ul>
                            <li><a href="resultados.php">Mis resultados</a></li>
                            <li class="borde-derecho-blanco"><a href="#">Mis estadisticas</a></li>
                            <li><a href="logout.php" class="enlace-azul">Cerrar sesión</a></li>
                        </ul>
                    </nav>
                <?php endif; ?>
              </div>
            </header>
