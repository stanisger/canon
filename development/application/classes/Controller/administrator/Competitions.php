<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administrator_Competitions extends Controller_Core_Administrator{

	public function before()
	{
		parent::before();
	}

	public function action_index()
	{
		$this->body = View::factory('administrator/competitions/index')->set(array(

			));
	}

	public function action_detail(){
		$this->body = View::factory('administrator/competitions/DETAIL')->set(array(

			));
	}




}