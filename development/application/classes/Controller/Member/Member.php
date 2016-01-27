<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Member_Member extends Controller_Core_Member{

	public function action_index(){
		if(Request::POST == $this->request->method()){

		}else{
			$this->body = View::factory('member/member/edit_perfil')->set(array(
					'member'	=> $this->userdata,
				));
		}		
	}
}