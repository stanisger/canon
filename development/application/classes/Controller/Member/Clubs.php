<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Member_Clubs extends Controller_Core_Member{

	public function action_index()
	{
		$this->body = View::factory('member/clubs/index');
	}
}