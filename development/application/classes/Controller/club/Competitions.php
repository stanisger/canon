<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Club_Competitions extends Controller_Core_Club{

	public $modelCompetitions; 
	public $modelAwards;
	public $modelJury;
	public function before()
	{
		parent::before();
		$this->modelCompetitions = new Model_Competitions;
		$this->modelAwards = new Model_Awards;
		$this->modelJury = new Model_Jury;
		$this->rows_by_page = 2;
		if($this->authention == TRUE AND !$this->a1->logged_in()){
			$this->redirect(URL::base()."club/login");
		}
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


		$this->body = View::factory('club/competitions/'.$dataSearch['view'])->set(array(
				"competitions"			=> $dataPagination['rows'],
				'pagination'	=> View::factory('club/competitions/pagination')->set(array(
						'data'	=> $dataPagination
					)),
			));
	}

	public function pagination($dataSearch)
	{

		$competitions = $this->modelCompetitions->getAllByFiltersClub($dataSearch,$this->userdata->id_club); 
		$rows  = count($competitions);
		$pages = (0 == $rows%$this->rows_by_page)?$rows/$this->rows_by_page:($rows/$this->rows_by_page)+1;
		$rows  = $this->modelCompetitions->getByPageClub($this->rows_by_page,$dataSearch,$this->userdata->id_club);
		return array('page'=>$dataSearch['page'],'pages'=>$pages,'rows'=> $rows);
	}

	public function action_add()
	{
		if(Request::POST == $this->request->method())
		{	
			$post = $this->validate_post();
			if($post->check()){
				$competition = $this->modelCompetitions->saveData($post,0,$this->userdata->id_club);
				if($competition){
					if(0 < count($_FILES)){
						$path = DOCROOT.'assets/images/competitions/';
						$file = rand(1,100).'_'.str_replace(' ','_',$_FILES['file']['name']);
						$upload = Helpers_Image::upload($_FILES['file'], $file, $path);
						if($upload)
						{
							$this->modelCompetitions->updateFile($file,$competition);
						}
					}
					//Guardamos numero de ganadores
					$winners = $post['winners'];
					for($i=0;$i<count($winners);$i++){
						$this->modelAwards->saveData($winners[$i],$competition,'winner');
					}
					//Guardamos numero de personas que integran el jurado
					$persons = count($post['name_jury']);
					//print_r($_FILES);
					for($i=0;$i<$persons;$i++)
					{
						$data = array(
								'name'	=> $post['name_jury'][$i],
								'description'	=> $post['description_jury'][$i],
								'url'	=> $post['url_jury'][$i],

							);
						$jury = $this->modelJury->saveData($competition,$data);
						if($jury){
							$num_file = $i + 1;
							if(0 < count($_FILES['avatar_jury'.$num_file])){
								$path = DOCROOT.'assets/images/jury/';
								$file = rand(1,100).'_'.str_replace(' ','_',$_FILES['avatar_jury'.$num_file]['name']);
								$upload = Helpers_Image::upload($_FILES['avatar_jury'.$num_file], $file, $path);
								if($upload)
								{
									$this->modelJury->updateFile($file,$jury);
								}
							}
						}
					}

					//print_r($post);
					$this->redirect(URL::base().'club/competitions');
				}
			}
			
		}
		$this->body = View::factory('club/competitions/add');
	}

	/*public function action_detail(){
		$primary_key = $this->request->param('id');
		$this->body = View::factory('club/competitions/detail')->set(array(
				'competition'	=> $this->modelCompetitions->getById($primary_key),

			));
	}*/

	public function action_galery()
	{
		$primary_key = $this->request->param('id');
		$this->body = View::factory('club/competitions/galery')->set(array(
				'competition'	=> $this->modelCompetitions->getById($primary_key),

			));
	}

	public function validate_post()
	{
		return Validation::factory($_POST);
	}



}