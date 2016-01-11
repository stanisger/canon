<?php defined('SYSPATH') OR die('No direct script access.');
/**
* ORM
* Esta clase permite extender el paso de parametros a una vista
* @author Iván Hernández López
*
*
*/
class ORM extends Kohana_ORM  {

	/**
	* (non-PHPdoc)
	* @var $_table_names_plural = FALSE Define a todas los modelos (tablas) en singular
	*/
	protected $_table_names_plural = FALSE;

	/**
	* @reescritura del metodo  ORM::set() 
	*/
	public function set($data = NULL,$value = NULL)
	{
		if (is_array($data))
		{
			foreach ($data as $key=> $value)
			{
				parent::set($key, $value);
			}
		}
		else
		{
			parent::set($data, $value);
		}

		return $this;
	}	

	
}