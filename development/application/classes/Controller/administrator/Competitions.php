<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administrator_Competitions extends Controller_Core_Administrator{

	public $modelCompetitions; 
	public function before()
	{
		parent::before();
		$this->modelCompetitions = new Model_Competitions;
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


		$this->body = View::factory('administrator/competitions/'.$dataSearch['view'])->set(array(
				"competitions"			=> $dataPagination['rows'],
				'pagination'	=> View::factory('administrator/competitions/pagination')->set(array(
						'data'	=> $dataPagination
					)),
			));
	}

	public function pagination($dataSearch)
	{
		$competitions = $this->modelCompetitions->getAllByFilters($dataSearch); 
		$rows  = count($competitions);
		$pages = (0 == $rows%$this->rows_by_page)?$rows/$this->rows_by_page:($rows/$this->rows_by_page)+1;
		$rows  = $this->modelCompetitions->getByPage($this->rows_by_page,$dataSearch);
		return array('page'=>$dataSearch['page'],'pages'=>$pages,'rows'=> $rows);
	}

	public function action_detail(){
		$primary_key = $this->request->param('id');

		
		$this->body = View::factory('administrator/competitions/detail')->set(array(
				'competition'	=> $this->modelCompetitions->getById($primary_key),

			));
	}




}