<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Core_member extends Controller_Core_System {
		
	protected $a1;
	protected $authention;
	protected $userdata;
	public $rows_by_page;
	public function before()
	{
		parent::before();
		$this->authention = TRUE;
		$this->a1 = A1::instance('member');

		$this->template = View::factory("member/structure/template")->set(array(
				'header'	=> View::factory('member/structure/header'),
				'sidebar'	=> View::factory('member/structure/sidebar'),
				'footer'	=> View::factory('member/structure/footer'),
			));	

		if($this->a1->logged_in()){
			$this->userdata = $this->a1->get_user();
		}

		View::set_global(array(
				"active"	=> $this->request->controller(),
				"userdata"	=> $this->userdata,
			));
	}

	public function after()
	{
		if($this->authention == TRUE AND !$this->a1->logged_in()){
			$this->redirect(URL::base()."member/login");
		}
		
		parent::after();
	}

}