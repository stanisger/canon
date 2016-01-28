<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Member_Competitions extends Controller_Core_Member{

	public $modelMyclubs;
	public $modelClubs;
	public $modelCompetitions;
	public $modelAwards;
	public $modelJury;
	public $modelGallery;
	public function before()
	{
		parent::before();
		$this->modelMyclubs = new Model_Myclubs;
		$this->modelClubs = new Model_Clubs;
		$this->modelCompetitions = new Model_Competitions;
		$this->modelAwards = new Model_Awards;
		$this->modelJury = new Model_Jury;
		$this->modelGallery = new Model_Gallery;
	}

	public function action_index()
	{
		$this->body = View::factory('member/competitions/index')->set(array(
					"clubs"	=> $this->modelMyclubs->getActives($this->userdata->id_member),
			));
	}

	public function action_upload()
	{
		$primary_key = $this->request->param('id');
		if(Request::POST == $this->request->method())
		{
			$post = $this->validate_post();
			if($post->check()){
				$gallery = $this->modelGallery->uploadGallery($post,$primary_key,$this->userdata->id_member);
				if($gallery)
				{
					if(0 < count($_FILES)){
						$path = DOCROOT.'assets/images/gallery/';
						$file = rand(1,100).'_'.str_replace(' ','_',$_FILES['file']['name']);
						$upload = Helpers_Image::upload($_FILES['file'], $file, $path);
						if($upload)
						{
							$this->modelGallery->saveImage($gallery,$file);
						}
					}
				}
			}
		}
		$competition = $this->modelCompetitions->getById($primary_key);
		$this->body = View::factory('member/competitions/upload_image')->set(array(
				"primary_key"	=> $primary_key,
				'club'			=> $this->modelClubs->getById($competition->fk_club),
				'competition'	=> $competition,
				'winners'		=> $this->modelAwards->getWinnerByCompetition($competition->id_competition),
				'jury'			=> $this->modelJury->getByCompetition($competition->id_competition),
				'gallery'		=> $this->modelGallery->getByCompetitionMember($competition->id_competition,$this->userdata->id_member),
			));
	}

	public function validate_post()
	{
		return Validation::factory($_POST);
	}
}