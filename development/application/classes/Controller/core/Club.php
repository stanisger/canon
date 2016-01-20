<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Core_Club extends Controller_Core_System {
		
	protected $a1;
	protected $authention;
	protected $userdata;
	public $rows_by_page;
	public function before()
	{
		parent::before();
		$this->authention = TRUE;
		$this->a1 = A1::instance('club');

		$this->template = View::factory("club/structure/template")->set(array(
				'header'	=> View::factory('club/structure/header'),
				'sidebar'	=> View::factory('club/structure/sidebar'),
				'footer'	=> View::factory('club/structure/footer'),
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
			$this->redirect(URL::base()."club/login");
		}
		
		parent::after();
	}

}