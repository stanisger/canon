<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Member_Photographs extends Controller_Core_Member{

	public $modelGallery;
	public $modelClubs;
	public $modelCompetitions;
	public function before()
	{
		parent::before();
		$this->modelGallery = new Model_Gallery;
		$this->modelClubs = new Model_Clubs;
		$this->modelCompetitions = new Model_Competitions;
	}
	
	public function action_index()
	{
		$js = array('jquery.collagePlus.js','jquery.removeWhitespace.js','jquery.collageCaption.js','script_gallery.js');
		Assets::script($js);

		$fk_club = $this->request->param('id'); $fk_competitions = '';
		if(0 < (int) $fk_club){
			$fk_competitions = $this->modelCompetitions->getByClub($fk_club);
		}
		$this->body = View::factory('member/photographs/index')->set(array(
				'gallery'	=> $this->modelGallery->getByMember($this->userdata->id_member,$fk_competitions),
				'clubs'		=> $this->modelClubs->getByMemberActive($this->userdata->id_member),
			));
	}

	public function action_upload()
	{
		$this->simple = TRUE;

		$this->body = View::factory('member/photographs/ajax_upload')->set(array(
				'id_competition'	=> $_POST['id_competition'],
				'next_image'		=> $_POST['num'],
			));
	}
}