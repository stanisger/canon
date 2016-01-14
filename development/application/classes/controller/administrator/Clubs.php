<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administrator_Clubs extends Controller_Core_Administrator implements Standars_Backend{

	public $modelClubs;
	public $modelZipcodes;
	public function before()
	{
		parent::before();
		$this->modelClubs = new Model_Clubs;
		$this->modelZipcodes = new Model_Zipcodes;
	}

	public function action_index()
	{
		$this->body = View::factory('administrator/clubs/index')->set(array(
				"clubs"	=> $this->modelClubs->getByAllStatus('Activo'),
			));
	}

	public function action_add()
	{
		if(Request::POST == $this->request->method())
		{
			$this->simple = TRUE;
			$post = $this->validate_post();
			$response = array('message'=>'Por favor proporcione todos los datos oblogatorios (*)','save'=>FALSE);
			if($post->check()){
				$response = array('message'=>'Ocurrio un error, por favorr verifique la información.','save'=>FALSE);
				$id_insert = $this->modelClubs->saveData(0,$post);
				if($id_insert){
					$response = array('message'=>'Club dado de alta correctamente.','save'=>TRUE);
					$path = DOCROOT.'assets/images/clubs/';
					$file = rand(1,100).'_'.str_replace(' ','_',$_FILES['logotipo']['name']);
					$upload = Helpers_Image::upload($_FILES['logotipo'], $file, $path);
					if($upload)
					{
						$this->modelClubs->saveImage($id_insert,$file);
					}

				}
			}
			
			$response = json_encode($response);
			$this->body = $response;
		}else{
			$this->body = View::factory('administrator/clubs/add')->set(array(
					"states"	=> $this->modelZipcodes->getStates(),
				));
		}
		
	}

	public function action_edit()
	{
		$primary_key = $this->request->param('id');
		if(Request::POST == $this->request->method())
		{
			$this->simple = TRUE;
			$post = $this->validate_post();
			$response = array('message'=>'Por favor proporcione todos los datos oblogatorios (*)','save'=>FALSE);
			if($post->check()){
				$response = array('message'=>'Ocurrio un error, por favor verifique la información.','save'=>FALSE);
				if($this->modelClubs->saveData($primary_key,$post)){
					$response = array('message'=>'Club editado  correctamente.','save'=>TRUE);
					$path = DOCROOT.'assets/images/clubs/';
					$file = rand(1,100).'_'.str_replace(' ','_',$_FILES['logotipo']['name']);

					$upload = Helpers_Image::upload($_FILES['logotipo'], $file, $path);
					if($upload)
					{
						$this->modelClubs->saveImage($primary_key,$file);
					}
				}
			}
			
			$response = json_encode($response);
			$this->body = $response;
		}else{
			$this->body = View::factory('administrator/clubs/edit')->set(array(
				"club"	=> $this->modelClubs->getById($primary_key),
				"states"	=> $this->modelZipcodes->getStates(),
			));
		}
		
	}

	public function action_delete()
	{
		$this->body = View::factory('administrator/clubs/delete');
	}

	public function validate_post()
	{
		return Validation::factory($_POST);
	}
}