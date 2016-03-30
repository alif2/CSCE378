<?php
require_once('core.php');
html_top();
$s_user_clock_status = database_get_user_clock_status(1);
?>

<div class="row">
  <div class="col-md-4">
    <form class="clock-form" role="form" method="POST">
    <?php if($s_user_clock_status == 'ClockIn') { ?>
        <button type="submit" class="btn btn-default btnlg" id="clock-out">CLOCK OUT</button>
    <?php } else { ?>
        <button type="submit" class="btn btn-default btnlg" id="clock-in">CLOCK IN</button>
    <?php } ?>
    </form>
  </div>
  <div class="col-md-8">
	<div class="col-md-12">
	  <div class="col-md-3">Current Time:</div>
	  <div class="col-md-9">
	    <span id="clock"></span>
	  </div>
	</div>
    
    <?php if($s_user_clock_status == 'ClockIn') { ?>
	<div class="col-md-12">
	  <div class="col-md-3">Clock In Time:</div>
	  <div class="col-md-9">
		<span id="clock-in-time"></span><br>
	  </div>
	</div>
	<div class="col-md-12">
	  <div class="col-md-3">Hours Today:</div>
	  <div class="col-md-9">
		<span id="working-hours"></span>
	  </div>
	</div>
    <?php } ?>
  </div>
</div>
<div class="row">
  <div class="col-md-12" id="work-history">
    <h2>Work Hour(s)</h2>
    <table class="table-bordered ptable">
      <thead>
        <tr>
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
<div class="row">
  <div class="col-md-12">
      <button type="submit" class="btn btn-default btnsm btnr" id="view-history">View History</button>
  </div>
</div>

<?php
html_bottom();