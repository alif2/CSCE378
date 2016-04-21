<?php
require_once('core.php');
require_once('app/user.php');
if(!session_is_user_logged_in()) redirect('/login.php');
html_top();
$s_user_clock_status = database_get_user_clock_status(session_get_user_email());

$start_date =  date('Y-m-d', strtotime('-' . date('w') . ' days'));
$end_date = date('Y-m-d', strtotime($start_date . '+6 days'));
$work_hours = user_get_hours_by_date_range(session_get_user_email(), $start_date, $end_date);
?>

<h3>Fixed Navbar</h3>
<div class="row">
  <div class="col-md-4">
    <form class="clock-form" role="form" action="/index.php" method="POST">
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
<button class="" id="correction-form-btn">Correction Form</button>
<button class="" id="pay-calculator-btn">Pay Calculator</button>
<div class="row">
  <div class="col-md-12" id="work-history">
    <h2>Work Hour(s)</h2>
    <table class="table-bordered ptable">
      <thead>
        <tr id="work-history-week">
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        $current_date = $start_date;
        for($i = 0; $i < 7; $i++) {
            echo '<td>';
            if(isset($work_hours[$current_date])) {
                echo round($work_hours[$current_date], 2);
            }
            echo '</td>';
            $current_date = date('Y-m-d', strtotime($current_date . '+1 day'));
        } ?>
          </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="row">
	<br>
  <div class="col-md-12">
  	<div class="col-md-6"></div>
  	<div class="col-md-4">
      <button type="submit" class="btn btn-default btnmid btnr" id="view-history">View History</button>
    </div>
  </div>
</div>

<form role="form" id="correction-form" title="Correction Form">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-2">
        <p>*Date:</p>
      </div>
      <div class="col-md-4">
        <input type="date" required>
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-2">
        <p>*Duration:</p>
      </div>
      <div class="col-md-4">
        <input type="number" step="0.01" min="0" required>
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-2">
        <p>&nbsp;Comments:</p>
      </div>
      <div class="col-md-7">
        <textarea rows="7"></textarea>
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-2"></div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-default btnsm btnl">Submit</button>
      </div>
      <div class="col-md-1">
        <button type="reset" class="btn btn-default btnsm btnl" id="clear">Clear</button>
      </div>
      <div class="col-md-6 submit-success" hidden>
        <pre class="txt-active">Submitted successfully!</pre>
      </div>
    </div>
  </div>
</form>

<form role="form" id="pay-calculator" title="Pay Calculator">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-5">
        <p>*Start Date:</p>
      </div>
      <div class="col-md-6">
        <input type="date" required>
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-5">
        <p>*End Date:</p>
      </div>
      <div class="col-md-6">
        <input type="date" required>
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-5">
        <p>*Wage:</p>
      </div>
      <div class="col-md-6">
        <input type="number" step="0.01" min="0" required>
      </div>
    </div>
    <div class="col-md-12">
      <h3>Total Pay = $<span class="total-pay"></span></h3>
    </div>
  </div>
</form>

<?php
html_bottom();