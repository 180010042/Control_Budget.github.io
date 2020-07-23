<?php
function duration($start_date,$end_date){ // This function is created to obtain given date in a format where name of month will be shown
        $months=array('01'=> 'Jan', '02'=> 'Feb', '03'=> 'Mar', '04'=>'Apr', '05'=> 'May', '06'=>'Jun', '07'=> 'Jul', '08'=>'Aug', '09'=> 'Sep', '10'=> 'Oct', '11'=>'Nov', '12'=>'Dec');
        $ord=array('0'=>'th', '1'=>'st', '2'=>'nd', '3'=>'rd', '4'=>'th', '5'=>'th', '6'=>'th', '7'=>'th', '8'=>'th', '9'=>'th');
        if("$start_date[8]" == '1'){
            $s_date="$start_date[8]"."$start_date[9]"."{$ord["0"]}"." "."{$months["$start_date[5]"."$start_date[6]"]}";
        } 
        else{
            $s_date="$start_date[8]"."$start_date[9]"."{$ord["$start_date[9]"]}"." "."{$months["$start_date[5]"."$start_date[6]"]}";
        }
        if("$end_date[8]" == '1'){
            $e_date="$end_date[8]"."$end_date[9]"."{$ord["0"]}"." "."{$months["$end_date[5]"."$end_date[6]"]}";
        }
        else{
            $e_date="$end_date[8]"."$end_date[9]"."{$ord["$end_date[9]"]}"." "."{$months["$end_date[5]"."$end_date[6]"]}";
        }
        if("$end_date[2]"."$end_date[3]" == "$start_date[2]"."$start_date[3]"){
            $date = "$s_date"."-"."$e_date"." $end_date[0]"."$end_date[1]"."$end_date[2]"."$end_date[3]";
        }
        else{
            $date = "$s_date"." "."$start_date[0]"."$start_date[1]"."$start_date[2]"."$start_date[3]"."-"."$e_date"." "."$end_date[0]"."$end_date[1]"."$end_date[2]"."$end_date[3]";
        }
        return $date;
    }


