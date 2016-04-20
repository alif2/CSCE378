<?php
require_once('core.php');
if(!session_is_user_logged_in()) redirect('/login.php');
html_top();
$s_user_clock_status = database_get_user_clock_status(session_get_user_email());
?>

<h3>Fixed Navbar</h3>
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
<button class="" id="correction-form-btn">Correction Form</button>
<button class="" id="pay-calculator-btn">Pay Calculator</button>
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
          <td contenteditable="true">5.2</td>
          <td contenteditable="true">4.3</td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
          <td contenteditable="true"></td>
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
      <div class="col-md-2">
        <button type="reset" class="btn btn-default btnsm btnl" id="clear">Clear</button>
      </div>
      <div class="col-md-6 submit-success" hidden>
        <p class="txt-active">Submitted successfully!</p>
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