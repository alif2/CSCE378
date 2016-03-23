<?php
require_once('core.php');
html_top();
?>

<div class="row">
  <div class="col-md-12">
    <h1>Pay Calculator</h1><br>
  </div>
</div>
<form role="form" action="" method="POST">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-2">
        <p>*Start Date:</p>
      </div>
      <div class="col-md-4">
        <input type="date" required>
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-2">
        <p>*End Date:</p>
      </div>
      <div class="col-md-4">
        <input type="date" required>
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-2">
        <p>*Wage Per Hour:</p>
      </div>
      <div class="col-md-4">
        <input type="number" step="0.01" min="0" required>
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-2"></div>
      <div class="col-md-1">
        <button type="submit" class="btn btn-default btnsm">Calculate</button><br>
      </div>
    </div>
  </div>
</form>
<div class="row">
  <div class="col-md-12">
    <br><p class="small">* is a required field</p>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <h2>Total Pay = $</h2>
  </div>
</div>

<?php
html_bottom();