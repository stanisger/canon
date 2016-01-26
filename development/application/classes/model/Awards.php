<?php defined('SYSPATH') or die('No direct script access.');

class Model_Awards extends ORM {

	protected $_primary_key = "id_award";

	public function saveData($data,$competition,$type){
		return ORM::factory($this->table_name())->set(array(
				'fk_competition'	=> $competition,
				'description'		=> $data,
				'type'				=> $type,
			))->save();
	}

	public function getWinnerByCompetition($fk_competition){
		return ORM::factory($this->table_name())	
				->where('fk_competition','=',$fk_competition)
				->where('type','=','winner')
				->find_all();
	}
}