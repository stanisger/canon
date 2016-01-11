<?php defined('SYSPATH') or die('No direct script access.');

class Helpers_Date extends Kohana_Date {

	static $month_english = array(
					"January",
					"February",
					"March",
					"April",
					"May",
					"June",
					"July",
					"August",
					"September",
					"October",
					"November",
					"December"
				);
	static $month_spanish = array(
					"Enero",
					"Febrero",
					"Marzo",
					"Abril",
					"Mayo",
					"Junio",
					"Julio",
					"Agosto",
					"Septiembre",
					"Octubre",
					"Noviembre",
					"Diciembre"
				);

	public static function invert($originalDate,$new_format = 'Y-m-d'){
		return date($new_format, strtotime($originalDate));
	}

	public static function month_letter($originalDate,$new_format = 'Y-F-d'){
		$date =  date($new_format, strtotime($originalDate));
		return str_replace(Helpers_Date::$month_english,Helpers_Date::$month_spanish,$date);
	}

	
}