<?php defined('SYSPATH') or die('No direct script access.');

class Model_Clubs extends ORM {

	protected $_primary_key = "id_club";
	
	public function getAllByFilters($dataSearch)
	{
		$orm = ORM::factory($this->table_name());
		$orm->where('status','=','Activo');
		if('' != $dataSearch['keyword']){
			$orm->where('enrollment','like','%'.$dataSearch['keyword'].'%');
			$orm->or_where('name','like','%'.$dataSearch['keyword'].'%');
			$orm->or_where('description','like','%'.$dataSearch['keyword'].'%');
		}
		if('name' == $dataSearch['column'] OR 'state' == $dataSearch['column']){
			$orm->order_by($dataSearch['column'],'ASC');
		}
		//print_r($orm);
		return $orm->find_all();
	}

	public function getByPage($limit,$dataSearch)
	{
		$offset = (1 == $dataSearch['page'])?0:(($dataSearch['page']-1)*$limit);
		$orm = ORM::factory($this->table_name());
		$orm->where('status','=','Activo');
		if('' != $dataSearch['keyword']){
			$orm->where('enrollment','like','%'.$dataSearch['keyword'].'%');
			$orm->or_where('name','like','%'.$dataSearch['keyword'].'%');
			$orm->or_where('description','like','%'.$dataSearch['keyword'].'%');
		}
		$orm->offset($offset);
		$orm->limit($limit);
		if('name' == $dataSearch['column'] OR 'state' == $dataSearch['column']){
			$orm->order_by($dataSearch['column'],'ASC');
		}
		return $orm->find_all();
	}

	public function saveData($primary_key,$post,$a1){

		$data = array(
					'enrollment'	=> $post['enrollment'],
					'name'			=> $post['name'],
					'description'	=> $post['description'],
					'name_contact'	=> $post['name_contact'],
					'email'			=> $post['email'],
					'phone'			=> $post['phone'],
					'state'			=> $post['state'],
				);
		if(0  == $primary_key)
		{
			$data['status']	= 'Activo';
			$data['date'] = date('Y-m-d');
		}
		if('' != $post['password']){
			$data['password'] = $a1->hash($post['password']);
		}
		return ORM::factory($this->table_name())
				->where($this->primary_key(),'=',$primary_key)
				->find()
				->set($data)->save();
	}

	public function editPerfil($primary_key,$post,$a1)
	{

		$data = array(
					'description'	=> $post['description'],
				);
		if('' != $post['password']){
			$data['password'] = $a1->hash($post['password']);
		}
		return ORM::factory($this->table_name())
				->where($this->primary_key(),'=',$primary_key)
				->find()
				->set($data)->save();		
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

	public function deleteRow($primary_key)
	{
		return ORM::factory($this->table_name())
			->where($this->primary_key(),'=',$primary_key)
			->find()
			->set(array(
				'status'		=> 'Inactivo',
			))->save();
	}

	public function getByMemberActive($fk_member)
	{
		$select = 'SELECT 
					c.id_club, c.name , c.logotipo , m.enrollment
					FROM '.$this->table_name().' as c
					INNER JOIN my_clubs as m
					ON c.id_club = m.fk_club
					WHERE m.status = "Activo"
					AND m.fk_member = '.$fk_member;
		return DB::query(Database::SELECT,$select)->as_object()->execute();
	}

	public function getByMemberInactive()
	{
		$select = 'SELECT 
					c.id_club, c.name
					FROM '.$this->table_name().' as c
					LEFT JOIN my_clubs as m
					ON c.id_club = m.fk_club
					WHERE m.fk_club is NULL';
		return DB::query(Database::SELECT,$select)->as_object()->execute();
	}
}