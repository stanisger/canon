<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Login extends Controller_Core_Admin {

	public $canon;
	public function before()
	{
		parent::before();
		$this->authention = FALSE;
		$this->simple = TRUE;
		$this->canon = new Model_Canon;
	}

	public function action_index()
	{
		//echo $this->a1->hash('123456');
		$msg = "";
		if ($this->request->method() === Request::POST)
		{
			$post = $this->_validate();
			$msg = "Todos los campos son requeridos. . .";
			if ($post->check() AND Security::check($post['security_token']))
			{
				$msg = "Verifique sus datos de acceso. . .";
				if ($this->a1->login($post['correo_electronico'],$post['contrasena'],FALSE))
				{	
					$msg = "asdsaddd";
					$this->request->redirect(URL::base()."admin");
				}
			}	
		}
		
		$this->body = View::factory("backend/admin/login")->set(array(
			"error"	=> $msg
		));

	}

	public function action_logout()
	{
		$this->a1->logout();
		$this->request->redirect(URL::base()."admin");
	}
	
	public function _validate()
	{
		return Validation::factory($_POST)
			->rule("correo_electronico","email")
			->rule("contrasena","not_empty")
			->rule("security_token","not_empty");
	}

}
