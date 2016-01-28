<?php defined('SYSPATH') or die('No direct script access.');

class Model_Myclubs extends ORM {

	protected $_table_name = "my_clubs";
	protected $_primary_key = "id_my_club";

	public function getActives($fk_member)
	{
		$select = 'SELECT 
					* 
					FROM '.$this->table_name().' as m 
					INNER JOIN clubs as c 
					ON m.fk_club = c.id_club
					WHERE m.status = "Activo"
					AND m.fk_member = '.$fk_member;
		return DB::query(Database::SELECT,$select)->as_object()->execute();
	}


	public function getMembers($_primary_key)
	{
		$select = 'SELECT 
					members.*,my_clubs.enrollment,my_clubs.date as d
					FROM '.$this->table_name().'
					INNER JOIN members
					ON my_clubs.fk_member = members.id_member';
		return DB::query(Database::SELECT,$select)->as_object()->execute();
	}

	/*public function getMembersByCompetition($fk_club){
		$select = 'SELECT 
					count(*) as totales
					FROM '.$this->table_name().' 
					WHERE fk_club = '.$fk_club.'
					AND status = "Activo"';
		return DB::query(Database::SELECT,$select)->execute()->as_array();
	}*/
}