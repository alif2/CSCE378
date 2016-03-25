<?php
require_once('core.php');
html_top();
?>

<div class="row">
  <div class="col-md-12">
    <h1>Pay Calculator</h1>
  </div>
</div>
<form role="form" class="pay-calculator">
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
        <button type="submit" class="btn btn-default btnsm">Calculate</button>
      </div>
    </div>
  </div>
</form>
<div class="row">
  <div class="col-md-12">
    <p class="small">* Indicates required field</p>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <h2>Total Pay = $<span class="total-pay"></span></h2>
  </div>
</div>

<?php
html_bottom();