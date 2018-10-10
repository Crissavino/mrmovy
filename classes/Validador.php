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

	public function Pelicula($dato, $cover)
	{
		$title = $dato['title'];
	    $genre_id = $dato['genre_id'];
	    $tag_id = $dato['tag_id'];
	    $year = $dato['year'];
	    $length = $dato['length'];
	    $resume = $dato['resume'];
	    $actor = $dato['actor'];
	    $producer = $dato['producer'];
	    $netflix = $dato['netflix'];
	    $trailer = $dato['trailer'];

	    $erroresCarga = [];

	    //ACA LE DEBERIA PASAR POR PARAMETRO $cover PERO NO SE COMO GUARDAR LA IMAGEN EN LA BASE DE DATOS

	    if ($_FILES[$cover]['error'] != UPLOAD_ERR_OK) { // si no se subio ninguna cover
		$erroresCarga['cover'] = "Por favor subí una portada";
		   } else {
	  		$ext = strtolower(pathinfo($_FILES[$cover]['name'], PATHINFO_EXTENSION));
	  		if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
	  			$erroresCarga['cover'] = "Formatos admitidos: JPG o PNG";
	  		}
		   }

	    if ($dato['title'] == '') {
        $erroresCarga['title'] = 'Ingresá un título';
	    }

	    if ($dato['genre_id'] == '') {
	        $erroresCarga['genre_id'] = 'Ingresá un género';
	    }

	    if ($dato['tag_id'] == '') {
	        $erroresCarga['tag_id'] = 'Ingresá un tag';
	    }

	    if ($dato['year'] == '') {
	        $erroresCarga['year'] = 'Ingresá un año';
	    }

	    if ($dato['length'] == '') {
	        $erroresCarga['length'] = 'Ingresá un duración';
	    }

	    if ($dato['resume'] == '') {
	        $erroresCarga['resume'] = 'Ingresá un resúmen';
	    }

	    if ($dato['actor'] == '') {
	        $erroresCarga['actor'] = 'Ingresá un actores';
	    }

	    if ($dato['producer'] == '') {
	        $erroresCarga['producer'] = 'Ingresá un producción';
	    }

	    if ($dato['netflix'] == '') {
	        $erroresCarga['netflix'] = 'Ingresá un Netflix';
	    }

	    if ($dato['trailer'] == '') {
	        $erroresCarga['trailer'] = 'Ingresá un trailer';
	    }

	    return $erroresCarga;
	}
}