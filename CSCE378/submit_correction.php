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
        *Date:
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
        *Duration:
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
      <div class="col-md-2">
        &nbsp;Comments:
      </div>
      <div class="col-md-7">
        <textarea rows="7"></textarea>
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
        <button type="submit" class="btn btn-default btnsm">Submit</button>
      </div>
      <div class="col-md-1">
        <button type="submit" class="btn btn-default btnsm">Cancel</button>
      </div>
    </div>
  </div>
</form>
<div class="row">
  <div class="col-md-12">
    <br><p class="small">* is a required field</p>
  </div>
</div>

<?php
html_bottom();