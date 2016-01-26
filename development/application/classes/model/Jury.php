<?php defined('SYSPATH') or die('No direct script access.');

class Model_Jury extends ORM {

	protected $_primary_key = "id_jury";

	public function saveData($competition,$data){
		return ORM::factory($this->table_name())->set(array(
				'name'	=> $data['name'],
				'description'		=> $data['description'],
				'url'				=> $data['url'],
				'fk_competition'	=> $competition,
			))->save();
	}

	public function updateFile($file,$jury)
	{
		$orm =  ORM::factory($this->table_name())->where($this->primary_key(),'=',$jury)->find();
		$orm->file = $file;
		return $orm->save();
	}

	public function getByCompetition($fk_competition){
		return ORM::factory($this->table_name())->where('fk_competition','=',$fk_competition)->find_all();
	}
}