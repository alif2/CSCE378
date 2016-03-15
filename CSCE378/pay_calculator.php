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
    <p>*Start Date</p><br>
    <p>*End Date</p><br>
    <p>*Wage Per Hour</p><br>
    </form>
  </div>
  <div class="col-md-10">
    <form action="">
    <input type="text" class="datepicker" date="startdate" size="25"><br><br>
    <input type="text" class="datepicker" date="enddate" size="25"><br><br>
    <input type="text" date="wageperhour" size="25"><br><br>
    <div class="col-md-1"></div>
    <div class="col-md-1">
      <form class="" role="form" method="POST">
        <button type="submit" class="btn btn-default btnsm">Calculate</button><br>
      </form>
    </div>
    <div class="col-md-7"></div>
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