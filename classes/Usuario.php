<?php 


class Usuario extends Model
{
	
	public $table = 'usuarios';
	public $columns = ['email', 'pass', 'encuesta']

	public function __construct()
	{
		$this-encuesta = 0;
	}
	
}