<?php
require('core.php');
    //2016-03-10
	//-----------------------------------------------------------------------------------------
      
     // $i_user_id = intval($_POST['start_date']);
     // $s_time_UTC = $_POST['end_date'];
      $i_user_id = 1;
      $s_time_UTC = "2016-03-10";
      $s_db_time = database_get_user_specific_time($i_user_id,$s_time_UTC);
      echo "\n" . 'the user_id is ' . $i_user_id;
      echo "\n" . 'the input time is ' . $s_time_UTC;
      echo "\n" . 'the UTC is ' . $s_db_time[1][0];
      echo "\n" .'the user time is';
     // get_time_diff_UTC($s_db_time);
      $mydate0 = new DateTime($s_db_time[0][0]);
      $mydate1 = new DateTime($s_db_time[1][0]);
      $mydate2 = new DateTime($s_db_time[2][0]);
      $mydate3 = new DateTime($s_db_time[3][0]);
      $mydate_diff_0 = $mydate0->diff(new DateTime($s_db_time[1][0]));
      $mydate_diff_1 = $mydate2->diff(new DateTime($s_db_time[3][0]));
      $date = new DateTime('0000-01-01 00:00:00');
      $date->add($mydate_diff_0);
      $date->add($mydate_diff_1);
      print_r($date);
      //$time = time_diff_datainterval($mydate_diff_0,$mydate_diff_1);
      //print_r($time);
      echo "<br>";
      
      
      //$mydate0->sub(new DateInterval($s_db_time[7][0]));
      echo $mydate0->format('Y-m-d H:i:s');
      //$mydate5 =  $mydate3+$mydate4;
      //print_r($mydate5);
      //print_r($s_db_time);
     // $mydate3 = $mydate1->diff($mydate2);
     // echo "\n" . 'the convert time is' . $mydate1->format('Y-m-d H:i:s');
      //echo "\n" . 'the convert time is' . $mydate2->format('Y-m-d H:i:s');
      //echo $mydate3->format('Y-m-d');
      //print_r($mydate3);