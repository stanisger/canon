<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Club_Competitions extends Controller_Core_Club{

	public $modelCompetitions; 
	public function before()
	{
		parent::before();
		$this->modelCompetitions = new Model_Competitions;
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

	public function action_detail(){
		$primary_key = $this->request->param('id');

		
		$this->body = View::factory('club/competitions/detail')->set(array(
				'competition'	=> $this->modelCompetitions->getById($primary_key),

			));
	}




}