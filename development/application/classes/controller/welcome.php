<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Core_Frontend {

	public function action_index()
	{
		$this->body = 'hello, world!';
	}

}