<?php
require_once('core.php');
html_top();
?>
<div class="container">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Time Tracker</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Submit Correction</a></li>
        <li><a href="#">Pay Calculator</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Hello, Username</a></li>
      </ul>
    </div>
  </nav>
  
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
      Current Time:<p id="clock"></p>
      <?php
        if(database_get_user_clock_status(1) == 'ClockIn') {
            $s_clock_in_time = database_get_user_last_event_time(1);
            $i_work_hours = (strtotime('now') - strtotime($s_clock_in_time)) / 3600.0;
            echo 'Clock In Time: ' . $s_clock_in_time . '<br>';
            echo 'Working Hours: ' . round($i_work_hours, 2) . '<br>'; 
        }
      ?>
    </div>
  </div>
  
  
</div>