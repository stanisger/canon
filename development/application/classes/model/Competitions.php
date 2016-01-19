<?php defined('SYSPATH') or die('No direct script access.');

class Model_Competitions extends ORM {

	protected $_primary_key = "id_competition";
	



	public function getAllByFilters($dataSearch)
	{
		$orm = ORM::factory($this->table_name());
		if('' != $dataSearch['keyword']){
			$orm->where('enrollment','like','%'.$dataSearch['keyword'].'%');
			$orm->or_where('name','like','%'.$dataSearch['keyword'].'%');
			$orm->or_where('description','like','%'.$dataSearch['keyword'].'%');
		}/*
		if('name' == $dataSearch['column'] OR 'state' == $dataSearch['column']){
			$orm->order_by($dataSearch['column'],'ASC');
		}*/
		return $orm->find_all();
	}

	public function getByPage($limit,$dataSearch)
	{
		$offset = (1 == $dataSearch['page'])?0:(($dataSearch['page']-1)*$limit);
		$orm = ORM::factory($this->table_name());
		
		if('' != $dataSearch['keyword']){
			$orm->where('enrollment','like','%'.$dataSearch['keyword'].'%');
			$orm->or_where('name','like','%'.$dataSearch['keyword'].'%');
			$orm->or_where('description','like','%'.$dataSearch['keyword'].'%');
		}
		$orm->offset($offset);
		$orm->limit($limit);
		/*if('name' == $dataSearch['column'] OR 'state' == $dataSearch['column']){
			$orm->order_by($dataSearch['column'],'ASC');
		}*/
		return $orm->find_all();
	}
}