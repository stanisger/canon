<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Maneja las exception HTTP
 * 
 * @author Ivan Hernandez
 * @package Exceptions
 *
 */
class Kohana_Exception extends Kohana_Kohana_Exception {
		
	static public function handler(Exception $e)
	{	
        
		$url 	= explode("/",$_SERVER['REQUEST_URI']);	
		$controller = "frontend";	
		if(isset($url[2]))
		{
			$controller = ($url[2] === "admin")
				? 'backend'
				: 'frontend';
		}
								
		$request = array(
			'directory' => 'errors',
			'controller' => $controller,
			'action' => $e->getCode(),
			'id' => get_class($e),
		);
		$url = Route::get('admin')->uri($request);
		
		echo Request::factory($url)->execute()->send_headers()->body();			
	}
}