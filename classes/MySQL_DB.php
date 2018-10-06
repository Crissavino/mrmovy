<?php 

<<<<<<< HEAD
class MySQL_DB extends DB
{
	protected $conexion;

	function __construct(argument)
	{
		try {

			$this->conexion = new PDO('mysql:host=localhost;dbname=mrmovy_DB', 'root', 'root');
     		$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		} catch (Exception $e) {
			echo $e->getMessage();
			exit;
		}
	}


	public function insert($modelo){
		$sql = "INSERT INTO ".$modelo->table." (";

		foreach ($modelo->columns as $column => $value) {
		    $sql .= "$column, ";
		}

		$sql .= ") VALUES (";

		foreach ($modelo->datos as $column => $value) {
		    $sql .= "'$value', ";
		}

		$sql .= ')';

		$sql = str_replace(', )', ')', $sql);

		return $sql;

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
=======
/**
 * 
 */
class MySQL_DB extends DB
{
	
	function __construct(argument)
	{
		// Acá va la conexión a la base de datos
	}


	// Va el insert, update y delete
>>>>>>> 53867b645d342a9b9d423d3aadfa1ef4a8f9de69
}