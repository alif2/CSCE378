<?php
require_once('core.php');
html_top();
?>

<div class="row">
  <div class="col-md-12">
    <h1>Correction Form</h1>
  </div>
</div>
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
      <input type="date" required>
    </div>
  </div>
  <div class="col-md-12">
    <div class="col-md-2">
      <p>&nbsp;Comments:</p>
    </div>
    <div class="col-md-4">
      <textarea rows="7"></textarea>
    </div>
  </div>
  <div class="col-md-12">
    <div class="col-md-2"></div>
    <div class="col-md-1">
        <button type="submit" class="btn btn-default btnsm">Submit</button>
    </div>
    <div class="col-md-1">
        <button type="submit" class="btn btn-default btnsm">Cancel</button>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <br><p class="small">* is a required field</p>
  </div>
</div>

<?php
html_bottom();