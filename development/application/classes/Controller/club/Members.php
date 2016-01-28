<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Club_Members extends Controller_Core_Club{

	public $modelMyclubs;
	public function before()
	{
		parent::before();
		$this->modelMyclubs = new Model_Myclubs;
	}
	public function action_index()
	{
		$this->body = View::factory('club/members/index')->set(array(
				'members'	=> $this->modelMyclubs->getMembers($this->userdata->id_club),
			));
	}
}