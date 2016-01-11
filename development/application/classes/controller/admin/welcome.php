<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Welcome extends Controller_Core_Admin {

	public function action_index()
	{
		$this->body = 'hello, world! Admin';
	}

} // End Welcome
