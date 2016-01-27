<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Member_Photographs extends Controller_Core_Member{

	public function action_before()
	{
		parent::before();

	}
	public function action_index()
	{
		$js = array('jquery.collagePlus.js','jquery.removeWhitespace.js','jquery.collageCaption.js','script_gallery.js');
		Assets::script($js);
		$this->body = View::factory('member/photographs/index');
	}
}