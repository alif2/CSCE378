<?php
require_once('core.php');
html_top();
?>
<div class="row">
  <div class="col-md-12">
    <h1>Pay Calculator</h1>
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
  <div class="col-md-6">
    <form action="">
    <input type="text" date="startdate"><br>
    <input type="text" date="enddate"><br>
    <input type="text" date="wageperhour"><br><br>
    </form>
  </div>
  <div class="col-md-4">
    <form class="" role="form" method="POST">
      <button type="submit" class="btn btn-default btnssm" id="">Load</button><br>
      <button type="submit" class="btn btn-default btnssm" id="">Load</button><br>
      <button type="submit" class="btn btn-default btnssm" id="">Calculate</button><br>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <p  class="small">* is the required information</p>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <h2>Total Wage = $</h2>
  </div>
</div>
<?php
html_bottom();