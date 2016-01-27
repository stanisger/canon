<?php defined('SYSPATH') OR die('No direct script access.');
/**
* Clase Assets
*
* Esta clase organiza y response los estilos y javascript he imagenes estaticas de la pagina web
*
*
* @author Ivan Hernandez Lopez
*
*/
class Assets {

	static public $scripts = array();
	
	static public $styles = array();
	
	static public $pathcss = "assets/css/";
	
	static public $pathjs = "assets/js/";
	
	static protected $pathimg = "application/media/";
	

	/**
	 * Define el path de las imagenes estaticas
	 * @param String $path 
	 */
	static public function pathimg($path = "")
	{
		Assets::$pathimg = $path;
	}
	
	/**
	 * Muestra una imagen estatica que forma parte de la maquetacion de la pagina web,
	 * y dependiendo de los parametros puede devolver un string o un tag image
	 * @param String $image
	 * @param Boolean|Array $params
	 */
	static public function images($image,$params = TRUE)
	{		
 		$image_path = Assets::$pathimg;
 		
		if (!empty($params) OR $params === TRUE)
		{
			$params = (is_array($params))?$params:NULL;
			return HTML::image($image_path.$image,$params).PHP_EOL;			
		}
		else
		{
			return $image_path.$image;
		}
	}
	
	/**
	 * Agrega un script a el array de scripts que se usaran 
	 * @param Array|String $script
	 */
	static public function script($script = "")
	{	
		$script = (is_array($script))? $script : explode(",",$script);
		foreach ($script as $js)
		{
			Assets::$scripts[] = $js;
		}	
	}
	
	/**
	 * Llama a los scripts que aparecen en el array y los escribe
	 * @see Assets::$scripts
	 */
	static public function scripts()
	{
		$js="";
		$scripts = array_filter(array_unique(Assets::$scripts));
		foreach ($scripts as $jsc)
		{	
			$js .= HTML::script(self::$pathjs.$jsc).PHP_EOL; 
		}
		return $js;
	}
	
	/**
	 * Agrega un style a el array de styles que se usaran
	 * @param Array|String $style
	 */	
	static public function style($style =  "")
	{	
		$style  = (is_array($style))? $style : explode(",",$style);
		foreach ($style as $css)
		{
			Assets::$styles[] = $css;		
		}
	}
	
	/**
	 * Llama a los estilos que aparecen en el array y los escribe
	 * @see Assets::$style
	 */	
	static public function styles()
	{
		$css= ""; 
		$estilos = array_filter(array_unique(Assets::$styles));

		foreach ($estilos as $style)
		{
			$css .= HTML::style(self::$pathcss.$style).PHP_EOL;
		}
		return $css;		
	}
	
	/*static public function base_url()
	{
		return  ( Kohana::$environment===Kohana::DEVELOPMENT)
				? 'http://dev.ensambles.net/'
				: 'http://dev.ensamblesyadornos.net/';
	}*/
}//End of Assets class