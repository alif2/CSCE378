<?php
require_once('core.php');
html_top();
?>

<h3>Fixed Navbar</h3>
<form role="form" action="app/user_login.php" method="POST">
  <div class="row">
    <div class="col-md-12">
      <p>Need an account? <a href="/register.php">Register now!</a></p>
    </div>
    <div class="col-md-12">
      <div class="col-md-2">
        <p>Email:</p>
      </div>
      <div class="col-md-4">
        <input type="text" name="email">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-2">
        <p>Password:</p>
      </div>
      <div class="col-md-4">
        <input type="password" name="password">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-2"></div>
      <div class="col-md-1">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </div>
</form>