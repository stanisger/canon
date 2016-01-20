<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * User AUTHENTICATION module for Kohana PHP Framework using encrypt
 */
abstract class A1 extends A1_Core {
	/**
	 * Generates encrypt hash for input
	 *
	 * @param   string   value to hash
	 * @param   string   salt (optional, will be generated if missing)
	 * @param   int      cost (optional, will be read from config if missing)
	 * @return  string   hashed input value
	 */
	public function hash($input, $salt = NULL, $cost = NULL)
	{
		return Helpers_Encrypt::encript($input);
	}	
}