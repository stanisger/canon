<?php defined('SYSPATH') or die('No direct script access.');

class Model_Zipcodes extends ORM {

	protected $_table_name  = 'zip_codes';
	protected $_primary_key = "id_code";
	
	public function getStates()
	{
		$select = 'SELECT DISTINCT(state) as name FROM '.$this->table_name().' ORDER BY name ASC';
		return DB::query(Database::SELECT,$select)->as_object()->execute();
	}
}