<?php
require_once('core.php');
html_top();
?>

<div class="row">
  <div class="col-md-12">
    <h1>Pay Calculator</h1><br>
  </div>
</div>
<form role="form" action="" method="POST" id="correction-form">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-2">
        *Start Date:
      </div>
      <div class="col-md-4">
        <input type="date" required>
      </div>
    </div>
    <div class="col-md-12"></div>
    <div class="col-md-12"></div>
    <div class="col-md-12"></div>
    <div class="col-md-12"></div>
    <div class="col-md-12"></div>
    <div class="col-md-12">
      <div class="col-md-2">
        *End Date:
      </div>
      <div class="col-md-4">
        <input type="date" required>
      </div>
    </div>
    <div class="col-md-12"></div>
    <div class="col-md-12"></div>
    <div class="col-md-12"></div>
    <div class="col-md-12"></div>
    <div class="col-md-12"></div>
    <div class="col-md-12">
      <div class="col-md-2">
        *Wage Per Hour:
      </div>
      <div class="col-md-4">
        <input type="number" required>
      </div>
    </div>
    <div class="col-md-12"></div>
    <div class="col-md-12"></div>
    <div class="col-md-12"></div>
    <div class="col-md-12"></div>
    <div class="col-md-12"></div>
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