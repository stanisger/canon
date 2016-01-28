<?php defined('SYSPATH') or die('No direct script access.');

class Model_Gallery extends ORM {

	protected $_primary_key = "id_gallery";

	public function getByCompetitionMember($fk_competition,$fk_member)
	{
		return ORM::factory($this->table_name())
				->where('fk_competition','=',$fk_competition)
				->where('fk_member','=',$fk_member)
				->find_all();
	}

	public function uploadGallery($post,$fk_competition,$fk_member)
	{
		return ORM::factory($this->table_name())->set(array(
				'name'		=> $post['name'],
				'camera'	=> $post['camera'],
				'lens'		=> $post['lens'],
				'opening'	=> $post['opening'],
				//'speed'		=> $post['speed'],
				'iso'		=> $post['iso'],
				'labels'	=> $post['labels'],
				'fk_competition'	=> $fk_competition,
				'fk_member'	=> $fk_member,
			))->save();
	}

	public function saveImage($_primary_key,$file)
	{
		return ORM::factory($this->table_name())
					->where($this->primary_key(),'=',$_primary_key)
					->find()
					->set(array('file'	=> $file))
					->save();
	}

	public function getByMember($fk_member,$fk_competitions = ''){
		$orm =  ORM::factory($this->table_name());
		$orm->where('fk_member','=',$fk_member);
		if('' != $fk_competitions){
			$item = 0;
			foreach($fk_competitions as $row){ $item++;
				$orm->or_where('fk_competition','=',$row->id_competition);
			}
			if(0 == $item){
				$orm->where('fk_competition','=',0);
			}
		}

		return $orm->find_all();
	}
	
	public function getByCompetetion($fk_competition){
		$orm =  ORM::factory($this->table_name());
		$orm->where('fk_competition','=',$fk_competition);
		

		return $orm->find_all();
	}
	
}