<?php

function validar($dato) {
  $email = trim($dato['email']);
  $pass = trim($dato['pass']);
  $rpass = trim($dato['rpass']);
  $errores = [];


  if ($dato['email'] == '') {
    $errores['email'] = 'Ingresa un email';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = 'Ingresa un email en formato válido';
  } elseif (traerPorEmail($email) == true) {
    $errores['email'] = 'El email ya está registrado';
  }


  if ($pass == '' && $rpass == '') {
    $errores['pass'] = 'Por favor completá tu contraseña';
  } elseif ($pass != $rpass) {
    $errores['pass'] = 'Tus contraseñas no coinciden';
  }

  return $errores;

}

function guardarUsuario($dato) {
  // $ext = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));

  $usuario = [];
  $usuario['email'] = $dato['email'];
  $usuario['pass'] = password_hash($dato['pass'], PASSWORD_DEFAULT);
  $usuario['id'] = asignarID();
  // $usuario['avatar'] = dirname(__FILE__) . '/images' . '/avatares/' . $dato['email'] .'.'. $ext;
  // $usuario['encuesta'] = 0;

  $usuarioJSON = json_encode($usuario);

  file_put_contents('usuarios.json', $usuarioJSON . PHP_EOL, FILE_APPEND);


}

function validarLogin($dato) {
  $email = trim($dato['email']);
  $pass = trim($dato['pass']);
  $errores = [];

  if ($email == '') {
    $errores['email'] = 'Por favor, completa un email';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = 'Formato de email incorrecto';
  } elseif (!$usuario = traerPorEmail($email)) {
    $errores['email'] = 'El email no coincide con un usuario';
  } elseif (!password_verify($pass, $usuario['pass'])) {
    $errores['pass'] = 'La contraseña es incorrecta';
  }

  return $errores;
}

// function guardarFoto($dato) {
//   $ext = strtolower(pathinfo($_FILES[$dato]['name'], PATHINFO_EXTENSION));
//   $errores = [];
//   if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' ) {
//     $desde = $_FILES[$dato]['tmp_name'];
//     $hasta = dirname(__FILE__) . '/images' . '/avatares/' . $_POST['email'] .'.'. $ext;
//     move_uploaded_file($desde, $hasta);
//
//     return $errores;
//   }
//
//   $errores['avatar'] = 'Solo se puede subir imágenes en formato png o jpg';
//   return $errores;
//
// }

function traerPorEmail($email) {

  $usuarios = traerTodos();
  $noexiste = [];

  foreach ($usuarios as $usuario) {
    if ($usuario['email'] == $email) {
      return $usuario;
    }
  }

  return false;

}

function traerTodos() {

  $usuariosJSON = file_get_contents('usuarios.json');

  $usuarios = explode(PHP_EOL, $usuariosJSON);

  array_pop($usuarios);

  foreach ($usuarios as $usuario) {
    $usuariosPHP[] = json_decode($usuario,true);
  }

  return $usuariosPHP;



}

function asignarID() {

  $usuarios = traerTodos();

  if (count($usuarios) == 0) {
    return 1;
  }

  $ultimoUsuario = array_pop($usuarios);

  $id = $ultimoUsuario['id'];

  return $id + 1;

}
