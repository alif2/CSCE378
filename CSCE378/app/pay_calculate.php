<?php
require('core.php');
    //2016-03-10
	//-----------------------------------------------------------------------------------------

     // $i_user_id = intval($_POST['start_date']);
     // $s_time_UTC = $_POST['end_date'];
//--------------------------------------------------------------------------------
// function 
//-----------------------------------------------------------------------------------

  function get_time_diff($s_UTC){
   $array_size = count($s_UTC);
   $s_work_hours = 0;
   $date = new DateTime('0000-01-01 00:00:00');
   for($i=0; $i < floor($array_size/2); $i++){      //loop for getting working hours for each clockin and clockout in one day
      $mydate0 = new DateTime($s_UTC[$i*2][0]);         
      $mydate1 = new DateTime($s_UTC[$i*2+1][0]);
      $mydate_diff = $mydate0->diff(new DateTime($s_UTC[$i*2+1][0]));
      $date->add($mydate_diff);
      }
   return $date;
}
   function get_hours($s_date_time){
      $date = new DateTime('0000-01-01 00:00:00');
      $s_date_diff = $s_date_time->diff($date);
      $s_hours = $s_date_diff->h;
      $s_mins = $s_date_diff->i;
      $s_hours = $s_hours + ($s_mins / 60.0 );
      return $s_hours;
   }
//  ----------------------------------------------------------------------------------
      $i_user_id = 1;
      $s_time_UTC = "2016-03-26";
      $s_db_time = database_get_user_specific_time($i_user_id,$s_time_UTC);
      echo "\n" . 'the user_id is ' . $i_user_id;
      echo "\n" . 'the input time is ' . $s_time_UTC;
      echo "\n" .'the user time is';
      $s_mydate = get_time_diff($s_db_time);
      $s_working_hours = get_hours($s_mydate);
      echo $s_working_hours;
      
      echo "<br>";
    
      
      //$mydate0->sub(new DateInterval($s_db_time[7][0]));
      //$mydate5 =  $mydate3+$mydate4;
      //print_r($mydate5);
      //print_r($s_db_time);
     // $mydate3 = $mydate1->diff($mydate2);
     // echo "\n" . 'the convert time is' . $mydate1->format('Y-m-d H:i:s');
      //echo "\n" . 'the convert time is' . $mydate2->format('Y-m-d H:i:s');
      //echo $mydate3->format('Y-m-d');
      //print_r($mydate3);