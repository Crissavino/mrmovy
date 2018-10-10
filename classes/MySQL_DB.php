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


	public function insert($modelo)
	{

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

    public function update($modelo)
    {


	    	$id = $modelo->getAttr('id');	
	    	$sql = "UPDATE ".$modelo->table." SET ";
	    	foreach ($modelo->columns as $colum) {
	    		$sql .= $colum. " = ";
	    		foreach ($modelo->datos as $key => $value) {
	    			if ($key == $colum) {
	    				$sql .= "'".$value."'". "";
	    			}
	    		}
	    		$sql .= ", ";
	    	}

	    	$sql .= "WHERE id = $id;";


	    	$sql = str_replace(', WHERE', ' WHERE', $sql);


			try {
				$stmt = $this->conexion->prepare($sql);
				$stmt->execute();

			} catch(Exception $e) {
				$e->getMessage();
			}
	}


    public function delete($data, $table)
    {
        
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

            $usuario = new Usuario(['id'=> $usuarioArray['id'], 'email' => $usuarioArray['email'], 'pass' => $usuarioArray['pass'], 'survey' => $usuarioArray['survey']]);
            return $usuario;

        } else {
            return null;
        }
    }

	public function traerTabla($tabla)
	{
		$query = $this->conexion->prepare("SELECT * FROM ".$tabla." LIMIT 3");
	    $query->bindValue(":tabla", $tabla);

	    $query->execute();

	    $tablaArray = $query->fetchAll(PDO::FETCH_ASSOC);

	    return $tablaArray;
	}
}