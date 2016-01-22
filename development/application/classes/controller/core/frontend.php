<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Core_Frontend extends Controller_Core_System {
	
	public function before()
	{
		parent::before();	
		$this->template = View::factory("frontend/structure/template")->set(array(
			));	
	}

}