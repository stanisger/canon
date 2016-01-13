<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Core_Admin extends Controller_Core_System {
		
	protected $a1;
	protected $authention;
	protected $userdata;

	public function before()
	{
		parent::before();
		$this->authention = TRUE;
		$this->a1 = A1::instance();

		$this->template = View::factory("admin/structure/template")->set(array(
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
		if($this->authention == TRUE AND !$this->a1->logged_in())
			$this->request->redirect(URL::base()."admin/login");
		
		parent::after();
	}

}