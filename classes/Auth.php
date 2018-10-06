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
<<<<<<< HEAD
		return isset($_SESSION['id']);
=======
		 return isset($_SESSION['id']);
>>>>>>> 53867b645d342a9b9d423d3aadfa1ef4a8f9de69
	}
}