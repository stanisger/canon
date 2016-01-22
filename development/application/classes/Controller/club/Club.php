<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Club_Club extends Controller_Core_Club{


	public $modelClubs;
	public function before()
	{
		parent::before();
		$this->modelClubs = new Model_Clubs;
	}

	public function action_index()
	{
		
	}
	
	public function action_detail(){
		$primary_key = $this->userdata->id_club;
		
		$this->body = View::factory('club/club/detail')->set(array(
				"club"	=> $this->modelClubs->getById($primary_key),
			));
	}

	public function action_edit(){
		$primary_key = $this->userdata->id_club;

		if(Request::POST == $this->request->method())
		{
			$this->simple = TRUE;
			$post = $this->validate_post();
			$response = array('message'=>'Por favor proporcione todos los datos oblogatorios (*)','save'=>FALSE);
			if($post->check()){
				$response = array('message'=>'Ocurrio un error, por favor verifique la información.','save'=>FALSE);
				if($this->modelClubs->editPerfil($primary_key,$post,$this->a1)){
					$response = array('message'=>'Club editado  correctamente.','save'=>TRUE);
					if(0 < count($_FILES)){
						$path = DOCROOT.'assets/images/clubs/';
						$file = rand(1,100).'_'.str_replace(' ','_',$_FILES['logotipo']['name']);
						$upload = Helpers_Image::upload($_FILES['logotipo'], $file, $path);
						if($upload)
						{
							$this->modelClubs->saveImage($primary_key,$file);
						}
					}
				}
			}
			
			$response = json_encode($response);
			$this->body = $response;
		}else{
			$this->body = View::factory('club/club/edit')->set(array(
					"club"	=> $this->modelClubs->getById($primary_key),
				));
		}
	}

	public function validate_post()
	{
		return Validation::factory($_POST);
	}
}