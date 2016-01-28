<?php defined('SYSPATH') or die('No direct script access.');

class Model_Members extends ORM {

	protected $_primary_key = "id_member";

	public function editPerfil($post,$a1,$primary_key)
	{
		$orm = ORM::factory($this->table_name())->where($this->primary_key(),'=',$primary_key)->find();

		if('' != $post['password']){
			$orm->password = $a1->hash($post['password']);
		}
		$orm->name = $post['name'];
		$orm->description = $post['description'];
		$orm->email = $post['email'];
		$orm->state = $post['state'];
		$orm->phone = $post['phone'];
		return $orm->save();
	}

	public function saveAvatar($file,$primary_key)
	{
		return  ORM::factory($this->table_name())
					->where($this->primary_key(),'=',$primary_key)
					->find()
					->set(array('avatar'=>$file))
					->save();
	}

}