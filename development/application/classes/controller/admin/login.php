<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Login extends Controller_Core_Admin {

	public $usuarios;
	public function before()
	{
		parent::before();
		$this->authention = FALSE;
		$this->simple = TRUE;
		$this->usuarios = new Model_Usuarios;
	}

	public function action_index()
	{
		//echo $this->a1->hash('123456');
		$msg = "";
		if ($this->request->method() === Request::POST)
		{
			$post = $this->_validate();
			$msg = "Todos los campos son requeridos. . .";
			if ($post->check() AND Security::check($post['token']))
			{
				$msg = "Verifique sus datos de acceso. . .";
				if ($this->a1->login($post['email'],$post['password'],FALSE))
				{	
					$msg = "asdsaddd";
					//$this->request->redirect(URL::base()."admin");
				}
			}	
		}
		
		$this->body = View::factory("admin/login")->set(array(
			"msg"	=> $msg
		));

	}

	public function action_logout()
	{
		$this->a1->logout();
		$this->redirect(URL::base()."admin/login");
	}
	
	public function _validate()
	{
		return Validation::factory($_POST)
			->rule("email","email")
			->rule("password","not_empty")
			->rule("token","not_empty");
	}

}