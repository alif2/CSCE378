<?php
require_once('core.php');
html_top();
?>
<div class="row">
  <div class="col-md-4">
    <button type="button" class="btn btn-default btnlg">CLOCK IN</button>
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
<div class="row">
  <div class="col-md-12">
    <h2>Work Hour(s)</h2>
    <table class="table-bordered ptable">
      <thead>
        <tr>
          <th>Date</th>
          <th>Monday Feb.2</th>
          <th>Tuesday Feb.3</th>
          <th>Wednesday Feb.4</th>
          <th>Thursday Feb.5</th>
          <th>Friday Feb.6</th>
          <th>Saturday Feb.7</th>
          <th>Sunday Feb.8</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Duration [hour(s)]</td>
          <td>5.2</td>
          <td>4.3</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          </tr>
      </tbody>
    </table>
  </div>
</div>
<?
html_bottom();