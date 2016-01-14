<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administrator_Clubs extends Controller_Core_Administrator implements Standars_Backend{

	public $modelClubs;
	public function before()
	{
		parent::before();
		$this->modelClubs = new Model_Clubs;
	}
	public function action_index()
	{
		$this->body = View::factory('administrator/clubs/index');
	}

	public function action_add()
	{
		if(Request::POST == $this->request->method())
		{
			$this->simple = TRUE;
			$post = $this->validate_post();
			if($post->check()){
				if($this->modelClubs->saveData(0,$post))
					$this->body = 'ok';
			}
			
			
		}else{
			$this->body = View::factory('administrator/clubs/add');
		}
		
	}

	public function action_edit()
	{
		$this->body = View::factory('administrator/clubs/edit');
	}

	public function action_delete()
	{

	}

	public function validate_post()
	{
		return Validation::factory($_POST);
	}
}