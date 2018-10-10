<?php 

/**
 * 
 */
class Auth
{
	
	public function loguearUsuario($email)
	{
	
		$_SESSION['id'] = $email;

		header('location: paso1.php');
		exit;
	}

	public function estaLogueado()
	{
		return isset($_SESSION['id']);
	}
}