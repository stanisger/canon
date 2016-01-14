<?php defined('SYSPATH') or die('No direct script access.');

class Model_Clubs extends ORM {

	protected $_primary_key = "id_club";
	
	public function saveData($primary_key,$post){

		return ORM::factory($this->table_name())
				->where($this->primary_key(),'=',$primary_key)
				->find()
				->set(array(
					'enrollment'	=> $post['enrollment'],
					'name'			=> $post['name'],
					'description'	=> $post['description'],
					'name_contact'	=> $post['name_contact'],
					'email'			=> $post['email'],
					'password'		=> $post['password'],
					'phone'			=> $post['phone'],
					'state'			=> $post['state'],
					'status'		=> 'Activo',
				))->save();
	}

	public function saveImage($primary_key,$logotipo)
	{
		return ORM::factory($this->table_name())
				->where($this->primary_key(),'=',$primary_key)
				->find()
				->set(array(
					'logotipo'		=> $logotipo,
				))->save();
	}
}