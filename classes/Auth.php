<?php 

/**
 * 
 */
class Auth
{
	
	public function loguearUsuario($email)
	{
		$_SESSION['id'] = $email;

		// Acá vamos a tener que hacer un if y preguntar si el usuario ya completo la encuesta

		header('location: paso1.php');
		exit;
	}

	public function estaLogueado()
	{
		return isset($_SESSION['id']);
	}
}