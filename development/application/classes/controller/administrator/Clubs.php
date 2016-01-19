<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administrator_Clubs extends Controller_Core_Administrator implements Standars_Backend{

	public $modelClubs;
	public $modelZipcodes;
	
	public function before()
	{
		parent::before();
		$this->modelClubs = new Model_Clubs;
		$this->modelZipcodes = new Model_Zipcodes;
		$this->rows_by_page = 2;
	}

	public function action_index()
	{	
		$dataSearch = array();
		$dataSearch['view'] = 'index';
		$dataSearch['page']  = ('' == $this->request->param('id'))?1:$this->request->param('id');
		$dataSearch['column'] = '';
		$dataSearch['keyword'] = '';
		if(Request::POST == $this->request->method())
		{
			$this->simple = TRUE;
			$dataSearch['view'] = 'search';
			$dataSearch['page'] = (0 == (int) $_POST['page'])?1:$_POST['page'];
			$dataSearch['column'] = $_POST['column'];
			$dataSearch['keyword'] = $_POST['keyword'];
		}	
		$dataPagination = $this->pagination($dataSearch);

		$this->body = View::factory('administrator/clubs/'.$dataSearch['view'])->set(array(
				"clubs"			=> $dataPagination['rows'],
				'pagination'	=> View::factory('administrator/clubs/pagination')->set(array(
						'data'	=> $dataPagination
					)),
			));
	}

	public function pagination($dataSearch)
	{
		$clubs = $this->modelClubs->getAllByFilters($dataSearch); 
		$rows  = count($clubs);
		$pages = (0 == $rows%$this->rows_by_page)?$rows/$this->rows_by_page:($rows/$this->rows_by_page)+1;
		$rows  = $this->modelClubs->getByPage($this->rows_by_page,$dataSearch);
		return array('page'=>$dataSearch['page'],'pages'=>$pages,'rows'=> $rows);

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
				$id_insert = $this->modelClubs->saveData(0,$post,$this->a1);
				if($id_insert){
					$response = array('message'=>'Club dado de alta correctamente.','save'=>TRUE);
					if(0 < count($_FILES)){
						$path = DOCROOT.'assets/images/clubs/';
						$file = rand(1,100).'_'.str_replace(' ','_',$_FILES['logotipo']['name']);
						$upload = Helpers_Image::upload($_FILES['logotipo'], $file, $path);
						if($upload)
						{
							$this->modelClubs->saveImage($id_insert,$file);
						}
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
				if($this->modelClubs->saveData($primary_key,$post,$this->a1)){
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
			$this->body = View::factory('administrator/clubs/edit')->set(array(
				"club"	=> $this->modelClubs->getById($primary_key),
				"states"	=> $this->modelZipcodes->getStates(),
			));
		}
		
	}

	public function action_delete()
	{
		$primary_key = $this->request->param('id');
		if(Request::POST == $this->request->method())
		{
			$this->simple = TRUE;
			if($this->modelClubs->deleteRow($primary_key)){
				$this->body = "Club eliminado de manera correcta.";
			}
		}else{
			$this->body = View::factory('administrator/clubs/delete')->set(array(
				"club"	=> $this->modelClubs->getById($primary_key),
			));
		}
		
	}


	public function validate_post()
	{
		return Validation::factory($_POST);
	}

	
}