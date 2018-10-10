<?php
    require_once('loader.php'); 

// FUNCIONES DE SESION

session_start();

//me fijo si la cookie del usuario que recibo por post no esta en sesion
if (isset($_COOKIE['id'])) {
    $_SESSION['id'] = $_COOKIE['id'];
}

function estaLogueado(){
    return isset($_SESSION['id']);
}


// FUNCIÓN PARA GUARDAR PORTADA

function guardarPortada($dato) {
  $ext = strtolower(pathinfo($_FILES[$dato]['name'], PATHINFO_EXTENSION));
  $erroresCarga = [];

    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' ) {
    $desde = $_FILES[$dato]['tmp_name'];
    $hasta = dirname(__FILE__) . '/images' . '/portadas/' . $_POST['title'] .'.'.$ext;
    move_uploaded_file($desde, $hasta);
    return $erroresCarga;
  }

  $erroresCarga['cover'] = 'Solo se puede subir imágenes en formato png o jpg';

  return $erroresCarga;
}

// FUNCIONES DE ENCUESTA

function cambiarEncuesta($email){

      $db2 = new MySQL_DB();
      $usuario = $db2->traerPorEmail($email);
      $usuario->setAttr('survey', 1);
      $usuario->save();
  }


function completoEncuesta($email) {
    $db2 = new MySQL_DB();
    $usuario = $db2->traerPorEmail($email);

    if ($usuario->completoEncuesta()) {
      return true;
    } else {
      return false;
    }

  }


