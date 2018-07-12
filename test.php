<?php

DateToPeriod();

function DateToPeriod()
{

//判斷上下學期
    $Year  = date('Y') ;
    $this_year_0801_stamp =  mktime(0, 0, 0, 8, 1, $Year);
    $next_year_0201_stamp =  mktime(0, 0, 0, 2, 1, $Year+1);
    $next_year_0730_stamp =  mktime(0, 0, 0, 7, 30, $Year+1);
    $this_year_0801 =  date("Y-m-d H:m:s",mktime(0, 0, 0, 8, 1, $Year));
    $next_year_0201 =  date("Y-m-d H:m:s",mktime(0, 0, 0, 2, 1, $Year+1));
    $next_year_0730 =  date("Y-m-d H:m:s",mktime(0, 0, 0, 7, 30, $Year+1));
    $today = strtotime(date('Y-m-d H:m:s'));

    if ($today > $this_year_0801_stamp and $today < $next_year_0201_stamp) {

        $sql = "SELECT * FROM `{$tbl}` WHERE `action_date` > '{$this_year_0801}' and `action_date` < '{$next_year_0201}' AND `enable`='1' ORDER BY `article_id` DESC ";

    }elseif ($today > $next_year_0201_stamp and $today < $next_year_0730_stamp){

        $sql = "SELECT * FROM `{$tbl}` WHERE `action_date` > '{$next_year_0201}' and `action_date` < '{$next_year_0730}' ORDER BY `article_id` DESC ";
    }

}


