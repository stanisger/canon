<?php defined('SYSPATH') or die('No direct script access.');

class Helpers_Competitions
{ 

    static function club($primary_key)
    {
    	$modelClubs = new Model_Clubs; 
    	$club = $modelClubs->getById($primary_key);
    	return '<b>'.$club->name.'</b> '.$club->state;
    }

    static function checkStatus($finish_date){    
        $date = strtotime(date("Y-m-d H:i:00",time()));
        $check_date = strtotime($finish_date);
        if($date > $check_date){
                return true;
        }else{
            return false;
        }
    }

    static function getByClub($fk_club){
        $modelCompetitions = new Model_Competitions;
        return $modelCompetitions->getByClub($fk_club);
    }

    static function dataById($primary_key,$row)
    {
        $modelCompetitions = new Model_Competitions;
        $dataCompetition =  $modelCompetitions->getById($primary_key); 
        return $dataCompetition->$row;
    }

    static function NameClubByCompetition($primary_key)
    {
        $modelCompetitions = new Model_Competitions;
        $dataCompetition =  $modelCompetitions->getById($primary_key); 
        $modelCompetitions = new Model_Clubs;
        return $modelCompetitions->getById($dataCompetition->fk_club)->name;

    }
}