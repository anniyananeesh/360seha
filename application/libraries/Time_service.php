<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Time_service{
    
    public $weekArray;
    public $weekArraySm;

    public function __construct() {

        $this->weekArray = ["Saturday","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday"];
        $this->weekArrayAr = ["السبت","الأحد","الأثنين","الثلاثاء","الأربعاء","الخميس","الجمعة"];
        $this->weekArraySm = ["Sat","Sun","Mon","Tue","Wed","Thu","Fri"];
    }
    
    public function getWeekDayInteger($weekday,$ShrtTag = false)
    {
        if($ShrtTag){return array_search($weekday, $this->weekArraySm);}else{return array_search($weekday, $this->weekArray);}
    }
    
    public function getWeekdayName($key,$ShrtTag = FALSE, $langRtl = FALSE)
    {
        if($langRtl)
        {
            return $this->weekArrayAr[$key];
        }else{
            if($ShrtTag){return $this->weekArraySm[$key];}else{return $this->weekArray[$key];}
        }
        
    }
    
}