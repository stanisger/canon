<?php defined('SYSPATH') or die('No direct script access.');

class Model_Competitions extends ORM {

	protected $_primary_key = "id_competition";
	


	/** CONSULTAS PARA SUPERADMINISTRADOR */
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

	/** CONSULTAR PARA CLUBS */
	public function getAllByFiltersClub($dataSearch,$primary_key)
	{
		$orm = ORM::factory($this->table_name());
		$orm->where('fk_club','=',$primary_key);
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

	public function getByPageClub($limit,$dataSearch,$primary_key)
	{
		$offset = (1 == $dataSearch['page'])?0:(($dataSearch['page']-1)*$limit);
		$orm = ORM::factory($this->table_name());
		$orm->where('fk_club','=',$primary_key);
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

	public function saveData($post,$primary_key,$club)
	{
		$orm = ORM::factory($this->table_name())->where($this->primary_key(),'=',$primary_key)->find();
		$orm->name = $post['name'];
		$orm->category = $post['category'];
		$orm->foundations = $post['description'];
		$orm->init_date = $post['init_date'];
		$orm->finish_date = $post['finish_date'];
		$orm->num_honorific = $post['num_honorific'];
		$orm->date = date('Y-m-d');
		$orm->fk_club = $club;
		$orm->status = 'Activo';
		return $orm->save();
	}

	public function updateFile($file,$primary_key)
	{
		$orm = ORM::factory($this->table_name())->where($this->primary_key(),'=',$primary_key)->find();
		$orm->file = $file;
		return $orm->save();
	}
}