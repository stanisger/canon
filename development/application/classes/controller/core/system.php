<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Core_System extends Controller {
	
	protected $template;
	protected $body;
	protected $simple;
	protected $session;

	public function before()
	{
		parent::before();

		$this->simple = FALSE;
		try
		{
			$this->session = Session::instance();
		} catch (Session_Exception $e){
			session_destroy();
			$this->session = Session::instance();
		}
	}
	
	public function after()
	{
		if ($this->request->is_ajax() OR $this->simple == TRUE)
		{
			$out = $this->body;
			if (is_array($this->body))
			{
				$this->response->headers('Content-Type','application/json');
				$out =  json_encode($this->body);
			}	
		}
		else 
		{
			$out = $this->template->set(array(
				"body"		=> $this->body,
			));
		}
		$this->response->body($out);
		
		parent::after();
	}
}