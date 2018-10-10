<?php 


class Usuario extends Model
{
	
	public $table = 'users';
	public $columns = ['email', 'pass', 'survey'];


	public function completoEncuesta()
	{
		if (parent::getAttr('survey')) {
			return true;
		} else {
			return false;
		}
	}

}