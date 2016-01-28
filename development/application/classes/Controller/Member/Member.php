<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Member_Member extends Controller_Core_Member{

	public $modelMembers;
	public $modelClubs;
	public function before()
	{
		parent::before();
		$this->modelMembers = new Model_Members;
		$this->modelClubs = new Model_Clubs;
	}
	public function action_index(){
		if(Request::POST == $this->request->method()){

		}else{
			$this->body = View::factory('member/member/detail_perfil')->set(array(
					'member'	=> $this->modelMembers->getById($this->userdata->id_member),
					'clubs'		=> $this->modelClubs->getByMemberActive($this->userdata->id_member),
				));
		}		
	}

	public function action_edit(){
		if(Request::POST == $this->request->method()){
			$post = $this->validate_post();
			$response = array('message'=>'Por favor proporcione todos los datos oblogatorios (*)','save'=>FALSE);
			if($post->check())
			{
				$response = array('message'=>'Ocurrio un error, por favor verifique la información.','save'=>FALSE);
				if($this->modelMembers->editPerfil($post,$this->a1,$this->userdata->id_member))
				{
				    $response = array('message'=>'Perfil editado  correctamente.','save'=>TRUE);
					if(0 < count($_FILES)){
						$path = DOCROOT.'assets/images/members/';
						$file = rand(1,100).'_'.str_replace(' ','_',$_FILES['avatar']['name']);
						$upload = Helpers_Image::upload($_FILES['avatar'], $file, $path);
						if($upload)
						{
							$this->modelMembers->saveAvatar($file,$this->userdata->id_member);
						}
					}
				}
				$response = json_encode($response);
				$this->body = $response;
			}
		}else{
			$this->body = View::factory('member/member/edit_perfil')->set(array(
					'member'	=> $this->modelMembers->getById($this->userdata->id_member),
					'my_clubs'	=> $this->modelClubs->getByMemberActive($this->userdata->id_member),
					'clubs'		=> $this->modelClubs->getByMemberInactive(),
				));
		}		
	}

	public function validate_post()
	{
		return Validation::factory($_POST);
	}
}