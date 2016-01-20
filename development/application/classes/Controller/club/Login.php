<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Club_Login extends Controller_Core_Club {


	public function before()
	{
		parent::before();
		$this->authention = FALSE;
		$this->simple = TRUE;
	}

	public function action_index()
	{
		$msg = "";
		//echo $this->a1->hash('123456');
		if ($this->request->method() === Request::POST)
		{
			$post = $this->_validate();
			$msg = "Todos los campos son requeridos. . .";
			if ($post->check() AND Security::check($post['token']))
			{
				$msg = "Verifique sus datos de acceso. . .";
				$remember = (isset($post['remember']))?TRUE:FALSE;
				if ($this->a1->login($post['email'],$post['password'],$remember))
				{	
					$this->redirect(URL::base()."club/competitions");
				}
			}	
		}
		echo $msg;
		$this->body = View::factory("club/login")->set(array(
			"msg"	=> $msg
		));

	}

	public function action_logout()
	{
		$this->a1->logout();
		$this->redirect(URL::base()."club/login");
	}
	
	public function _validate()
	{
		return Validation::factory($_POST)
			->rule("email","email")
			->rule("password","not_empty")
			->rule("token","not_empty");
	}

}