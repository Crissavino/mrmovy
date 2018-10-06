<?php 

/**
 * 
 */
class Auth
{
	
	public function loguearUsuario($usuario)
	{
		$_SESSION['id'] = $usuario['id'];

		// Acá vamos a tener que hacer un if y preguntar si el usuario ya completo la encuesta

		header('location: paso1.php');
		exit;
	}

	public function estaLogueado()
	{
		return isset($_SESSION['id']);
	}
}