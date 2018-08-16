<?php

function validar($dato) {
  $email = trim($dato['email']);
  $pass = trim($dato['pass']);
  $rpass = trim($dato['rpass']);
  $fotoperfil = $_FILES['avatar'];
  $errores = [];


  if ($dato['email'] == '') {
    $errores['email'] = 'Ingresa un email';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = 'Ingresa un email en formato válido';
  }


  if ($pass == '' && $rpass == '') {
    $errores['pass'] = 'Por favor completá tu contraseña';
  } elseif ($pass != $rpass) {
    $errores['pass'] = 'Tus contraseñas no coinciden';
  }

  if ($fotoperfil['error'] != 'UPLOAD_ERROR_OK') {
    $errores['avatar'] = 'Por favor subí una foto';
  }

  return $errores;

}

function guardarUsuario($dato) {
  $usuario = [];
  $usuario['email'] = $dato['email'];
  $usuario['pass'] = password_hash($dato['pass'], PASSWORD_DEFAULT);

  $usuarioJSON = json_encode($usuario);

  file_put_contents('usuarios.json', $usuarioJSON . PHP_EOL, FILE_APPEND);
  

}
