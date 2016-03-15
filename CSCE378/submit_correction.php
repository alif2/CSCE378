<?php
require_once('core.php');
html_top();
?>

<div class="row">
  <div class="col-md-12">
    <h1>Correction Form</h1><br>
  </div>
</div>
<div class="row">
  <div class="col-md-1">
    <form action="">
    <p>*Date</p><br>
    <p>*Duration</p><br>
    <p>&nbspComments</p><br>
    </form>
  </div>
  <div class="col-md-11">
    <form action="">
    <input type="text" class="datepicker" date="startdate" size="25"><br><br>
    <input type="text" class="datepicker" date="enddate" size="25"><br><br>
    <textarea rows="7" cols="73"></textarea><br><br>
    <div class="col-md-4"></div>
    <div class="col-md-1">
      <form class="" role="form" method="POST">
        <button type="submit" class="btn btn-default btnsm">Cancel</button><br>
      </form>
    </div>
    <div class="col-md-1">
      <form class="" role="form" method="POST">
        <button type="submit" class="btn btn-default btnsm">Submit</button><br>
      </form>
    </div>
    <div class="col-md-4"></div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <br><p  class="small">* is the required information</p>
  </div>
</div>

<?php
html_bottom();