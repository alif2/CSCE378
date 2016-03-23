<?php
require_once('core.php');
html_top();
?>

<div class="row">
  <div class="col-md-12">
    <h1>Correction Form</h1>
  </div>
</div>
<form role="form" action="" method="POST" id="correction-form">
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
      <div class="col-md-1">
        <button type="submit" class="btn btn-default btnsm">Submit</button>
      </div>
      <div class="col-md-1">
        <button type="reset" class="btn btn-default btnsm">Clear</button>
      </div>
      <div class="col-md-2 submit-success" hidden>Submitted successfully</div>
    </div>
  </div>
</form>
<div class="row">
  <div class="col-md-12">
    <p class="small">* Indicates required field</p>
  </div>
</div>

<?php
html_bottom();