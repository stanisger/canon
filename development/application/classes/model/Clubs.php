<?php defined('SYSPATH') or die('No direct script access.');

class Model_Clubs extends ORM {

	protected $_primary_key = "id_club";
	
	public function saveData($primary_key,$post){

		return ORM::factory($this->table_name())
				->where($this->primary_key(),'=',$primary_key)
				->find()
				->set(array(
					'name'	=> $post['name'],
				))->save();
	}

	public function saveImage($primary_key,$image)
	{
		
	}
}