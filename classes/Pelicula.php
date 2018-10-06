<?php 

	/**
	 * 
	 */
	class Pelicula extends Model
	{
		//incluyo el tag_id tambien

		public $table = 'peliculas';
		public $columns = ['cover', 'title', 'genre_id','tag_id', 'year', 'length', 'resume', 'actors', 'producers', 'netflix', 'trailer']
	}

 ?>