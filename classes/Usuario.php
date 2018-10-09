<?php 

	require('classes/Model.php');


class Usuario extends Model
{
	
	public $table = 'users';
	public $columns = ['email', 'pass'];

}