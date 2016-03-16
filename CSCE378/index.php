<?php
require_once('core.php');
html_top();
?>

<div class="row">
  <div class="col-md-4">
    <form class="clock-form" role="form" method="POST">
      <button type="submit" class="btn btn-default btnlg" id="clock-in">CLOCK IN</button>
      <button type="submit" class="btn btn-default btnlg" id="clock-out">CLOCK OUT</button>
    </form>
    <?php $s_user_clock_status = database_get_user_clock_status(1);
    if($s_user_clock_status == 'ClockIn') {?>
        <script>$('#clock-in').hide();</script>
    <?php } else { ?>
    <script>$('#clock-out').hide();</script>
    <?php } ?>
  </div>
  <div class="col-md-8">
		<form role="form" action="" method="POST">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-3">
					Current Time:
				</div>
				<div class="col-md-9">
					<span id="clock"></span><br>
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-3">
					Clock In Time:
				</div>
				<div class="col-md-9">
					<span id="clock-in-time"></span><br>
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-3">
					Hours Today:
				</div>
				<div class="col-md-9">
					<span id="working-hours"></span>
				</div>
			</div>
    </div>
</div>
<div class="row">
  <div class="col-md-12">
    <h2>Work Hour(s)</h2>
    <table class="table-bordered ptable">
      <thead>
        <tr>
          <th class="textbox">Monday Feb.2</th>
          <th class="textbox">Tuesday Feb.3</th>
          <th class="textbox">Wednesday Feb.4</th>
          <th class="textbox">Thursday Feb.5</th>
          <th class="textbox">Friday Feb.6</th>
          <th class="textbox">Saturday Feb.7</th>
          <th class="textbox">Sunday Feb.8</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="textbox">5.2</td>
          <td class="textbox">4.3</td>
          <td class="textbox"></td>
          <td class="textbox"></td>
          <td class="textbox"></td>
          <td class="textbox"></td>
          <td class="textbox"></td>
          </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
      <button type="submit" class="btn btn-default btnsm" id="">View History</button>
  </div>
</div>
<?php
html_bottom();