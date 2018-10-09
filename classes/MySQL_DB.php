<?php 

require ('DB.php');

class MySQL_DB extends DB
{
	protected $conexion;

	function __construct()
	{
		try {

			$this->conexion = new PDO('mysql:host=localhost;dbname=mrmovy_db', 'root', 'root');
     		$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		} catch (Exception $e) {
			echo $e->getMessage();
			exit;
		}
	}


	public function insert($modelo){

		$sql = "INSERT INTO ".$modelo->table." (";

		foreach ($modelo->columns as $column => $value) {
			$sql .= "$value, ";
		}

		$sql .= ") VALUES (";

		foreach ($modelo->datos as $column => $value) {
			$sql .= "'$value', ";
		}

		$sql .= ')';

		$sql = str_replace(', )', ')', $sql);


		try {
			$stmt = $this->conexion->prepare($sql);
			$stmt->execute();

		} catch(Exception $e) {
			$e->getMessage();
		}

	}

	public function update($modelo, $filtro, $iguala){
	    //con el filtro le paso el dato para actualizar donde (WHERE) se cumpla ese filtro sea $iguala un valor que le paso por parametro
	    $sql = "UPDATE ".$modelo->table." SET ";

	    foreach ($modelo->columns as $column => $value) {
	        $sql .= "$column = $value, ";
	    }
	    $sql .= ")";

	    $sql = str_replace(', )', ' ', $sql);

	    $sql .= " WHERE $filtro = $iguala;";

	    return $sql;

    }

    public function delete($data, $table){
        
        $sql = "DELETE FROM ".$modelo->table." WHERE ";

        foreach ($modelo->columns as $column => $value) {
            $sql .= "$column = $value, ";
        }

        $sql .= ")";

        $sql = str_replace(', )', ';', $sql);

        return $sql;


    }

    function traerPorEmail($email)
        {
            $query = $this->conexion->prepare("SELECT * FROM users WHERE email = :email");
            $query->bindValue(":email", $email);

            $query->execute();

            $usuarioArray = $query->fetch(PDO::FETCH_ASSOC);

            if ($usuarioArray) {

                $usuario = new Usuario(['email' => $usuarioArray['email'], 'pass' => $usuarioArray['pass']]);
                return $usuario;

            } else {
                return null;
            }
	    }
}