<?php

// PARA QUE EXTIENDA DE DB Y USAR EL MODELO HACE FALTA PENSAR EL INERTAR, UPDATE Y DEMÁS

class JSON_DB
{
	
	function __construct()
	{
		# code...
	}

	public function traerPorEmail($email)
	{
		  //me traigo el email asociado a cada usuario

		  $usuarios = $this->traerTodos();
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


	public function traerTodos()
	{
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

	public function guardarUsuario($dato)
	{
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
		$usuario['encuesta'] = '0';

		//codifico al usuario en json
		$usuarioJSON = json_encode($usuario);

		file_put_contents('usuarios.json', $usuarioJSON . PHP_EOL, FILE_APPEND);
	}

	// FALTA FUNCION INSERTAR GENERAL


}