<?php 

	/**
	 * 
	 */
	class Pelicula extends Model
	{

		public $table = 'peliculas';
		public $columns = ['titulo', 'portada', 'genero', 'tags', 'duracion', 'anio', 'resumen', 'actores', 'produccion', 'netflix', 'trailer']
	}

 ?>