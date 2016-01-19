<?php defined('SYSPATH') or die('No direct script access.');

class Helpers_Dates
{ 

       public static $month = array(
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
    public static $meses = array(
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

    public static function getMonth($originalDate)
    {
        $date =  date('d F Y', strtotime($originalDate));
        return str_replace(Helpers_Dates::$month,Helpers_Dates::$meses,$date);
    }
}