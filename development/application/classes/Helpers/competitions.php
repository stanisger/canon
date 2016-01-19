<?php defined('SYSPATH') or die('No direct script access.');

class Helpers_Competitions
{ 

    static function club($primary_key)
    {
    	$modelClubs = new Model_Clubs; 
    	$club = $modelClubs->getById($primary_key);
    	return '<b>'.$club->name.'</b> '.$club->state;
    }

    static function MemberByCompetition($foreign_key)
    {
    	
    }
}