<?php

session_start();

//me fijo si la cookie del usuario que recibo por post no esta en sesion
if (isset($_COOKIE['id'])) {
    $_SESSION['id'] = $_COOKIE['id'];
}

function validar($dato) {
    // recibo a post por parametro y lo asigno a cada posicion
  $email = trim($dato['email']);
  $pass = trim($dato['pass']);
  $rpass = trim($dato['rpass']);
  //con la funcion trim le saco todos los espacios
  //inicializo errores vacio
  $errores = [];
  //valido el email
  //si no escribe nada
  if ($dato['email'] == '') {
      //guardo el error para despues mostrarlo
    $errores['email'] = 'Ingresa un email';
    //si escribe algo, comprebo q tenga formato email
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      //guardo el error para despues mostrarlo
    $errores['email'] = 'Ingresa un email en formato válido';
    //compruebo que no este registrado, si el mail q traigo existe, me trae un mail, si no un false
  } elseif (traerPorEmail($email) == true) {
      //guardo el error para despues mostrarlo
    $errores['email'] = 'El email ya está registrado';
  }

  //valido la password
  //si no escribe nada
  if ($pass == '' && $rpass == '') {
      //guardo el error para despues mostrarlo
    $errores['pass'] = 'Por favor completá tu contraseña';
    //si no coinciden
  } elseif ($pass != $rpass) {
      //guardo el error para despues mostrarlo
    $errores['pass'] = 'Tus contraseñas no coinciden';
  }

  //devuelvo el arreglo de errores, para mostrar si guardo algun error
  return $errores;

}

function guardarUsuario($dato) {
    //recibo a $_POST por parametro

  // $ext = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));

  //inicializo el array usuario vacio
  $usuario = [];
  //le asigno el valor de post en la posicion email
  $usuario['email'] = $dato['email'];
  //hasheo la pass que viene por post
  $usuario['pass'] = password_hash($dato['pass'], PASSWORD_DEFAULT);
  //le asigno un id con la funcion asignarid, que toma el ultimo id y le suma 1, pero si no hay ningun usuario arranca a contar
  $usuario['id'] = asignarID();
  // $usuario['avatar'] = dirname(__FILE__) . '/images' . '/avatares/' . $dato['email'] .'.'. $ext;
  // $usuario['encuesta'] = 0;

  //codifico al usuario en json
  $usuarioJSON = json_encode($usuario);

  file_put_contents('usuarios.json', $usuarioJSON . PHP_EOL, FILE_APPEND);


}

function validarLogin($dato) {
  $email = trim($dato['email']);
  $pass = trim($dato['pass']);
  $errores = [];

  if ($email == '') {
      //si no ingreso nada
    $errores['email'] = 'Por favor, completa un email';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      //si ingreso un email en formato invalido
    $errores['email'] = 'Formato de email incorrecto';
    } elseif (!$usuario = traerPorEmail($email)) {
    //si no existe un usuario  registrado con ese email la funcion traerPorEmail va a traer false, y como esta negado, entra al elseif!
    $errores['email'] = 'El email no coincide con un usuario';
  } elseif (!password_verify($pass, $usuario['pass'])) {
      //deshasheo la password y comparo la pass que esta ingresando con la que tiene guardada el usuario en la posicion pass, si no coinciden...
    $errores['pass'] = 'La contraseña es incorrecta';
  }
  //devuelvo los errores
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
    //me traigo el email asociado a cada usuario

  $usuarios = traerTodos();
  //a la variable $usuarios le asigno todos los usuarios registrados

  foreach ($usuarios as $usuario) {
      //recorro el arregle de todos los usuarios y obtengo cada usuario separado
    if ($usuario['email'] == $email) {
        //si existe un usuario ya registrado que en la posicion email coincida con el mail que se quiere registrar devuelvo el usuario registrado
      return $usuario;
    }
  }
  //si no existe devuelvo false
  return false;

}

function traerTodos() {
    //traigo todos los usuarios registrados

  $usuariosJSON = file_get_contents('usuarios.json');
  //con la funcion file_get_contents trigo el archivo json q uso como base de datos y lo asigno a la variable $usuarioJSON

  $usuarios = explode(PHP_EOL, $usuariosJSON);
  //con la funcion explode separo a cada usuario por la constante PHP_EOL

  array_pop($usuarios);
  //le saco la ultima posicion que es una vacia por la constante FILE_APPEND

  foreach ($usuarios as $usuario) {
      //recorro todos los usuarios y obtengo cada usuario separado
    $usuariosPHP[] = json_decode($usuario,true);
    //lo voy agregando a la variable $usuariosPHP decodificado de json, ya en formato php
  }

  return $usuariosPHP;
  //devuelvo todos los usuarios en formato php (uno por array)



}

function asignarID() {
    //le asigna un ID a cada usuario

  $usuarios = traerTodos();
  //traigo todos los usuarios registrados

  if (count($usuarios) == 0) {
      //si se cumple que no hay ningun usuario registrado
    return 1;//le asigno el numero de id 1
  }
  //si hay algun usuario registrado, no entra arriba

  $ultimoUsuario = array_pop($usuarios);
  //saco el ultimo usuario registrado con array_pop y lo asigno a la variable ultimo usuario

  $id = $ultimoUsuario['id'];
  //le asigno a la variable id el valor de $ultimoUsuario en la posicion id

  return $id + 1;
  //y devuelvo el id anterior incrementado en 1

}

function loguearUsuario($usuario){
    $_SESSION['id'] = $usuario['id'];
    // Acá vamos a tener que hacer un if y preguntar si el usuario ya completo la encuesta
    header('location: paso1.php');
    exit;
}

function estaLogueado(){
    return isset($_SESSION['id']);
}
