<?php


class Validador
{


	public function Registro($dato)
	{

		$db = new MySQL_DB();
		
		$email = trim($dato['email']);
		$pass = trim($dato['pass']);
		$rpass = trim($dato['rpass']);
		$errores = [];

		if ($dato['email'] == '') {
		  
			$errores['email'] = 'Ingresa un email';

		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		 
			$errores['email'] = 'Ingresa un email en formato válido';

		} elseif ($db->traerPorEmail($email) == true) {

			$errores['email'] = 'El email ya está registrado';
		}

		if ($pass == '' && $rpass == '') {
		  
			$errores['pass'] = 'Por favor completá tu contraseña';

		} elseif ($pass != $rpass) {
		 
			$errores['pass'] = 'Tus contraseñas no coinciden';
		}

		return $errores;
	}

	public function Login($dato)
	{	
		$email = trim($dato['email']);
		$pass = trim($dato['pass']);
		$errores = [];
		$db = new MySQL_DB();

		if ($email == '') {
		  	//si no ingreso nada
			$errores['email'] = 'Por favor, completa un email';
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		 	 //si ingreso un email en formato invalido
			$errores['email'] = 'Formato de email incorrecto';
		} elseif (!$usuario = $db->traerPorEmail($email)) {
			//si no existe un usuario  registrado con ese email la funcion traerPorEmail va a traer false, y como esta negado, entra al elseif!
			$errores['email'] = 'El email no coincide con un usuario';			
		} elseif (!password_verify($pass, $usuario->getAttr('pass'))) {
		  	//deshasheo la password y comparo la pass que esta ingresando con la que tiene guardada el usuario en la posicion pass, si no coinciden...
			$errores['pass'] = 'La contraseña es incorrecta';
		}
		//devuelvo los errores
		return $errores;
	}
}