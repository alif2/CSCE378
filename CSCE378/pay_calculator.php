<?php
require_once('core.php');
html_top();
?>
<div class="row">
  <div class="col-md-12">
    <h1>Pay Calculator</h1><br>
  </div>
</div>
<div class="row">
  <div class="col-md-2">
    <form action="">
    <p>*Start Date</p>
    <p>*End Date</p>
    <p>*Wage Per Hour</p><br>
    </form>
  </div>
  <div class="col-md-2">
    <form action="">
    <input type="text" class="datepicker" date="startdate"><br>
    <input type="text" class="datepicker" date="enddate"><br>
    <input type="text" date="wageperhour"><br><br>
    <form class="" role="form" method="POST">
      <button type="submit" class="btn btn-default btnmed">Calculate</button><br>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <br><p  class="small">* is the required information</p>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <h2>Total Wage = $</h2>
  </div>
</div>
<?php
html_bottom();