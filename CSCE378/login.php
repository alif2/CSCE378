<?php
require_once('core.php');
html_top();
?>

<h3>Fixed Navbar</h3>
<div class="row">
  <form role="form" class="form-horizontal" action="app/user_login.php" method="POST">
    <div class="col-md-6">
      <h3>Login</h3>
      <div class="form-group">
        <label class="control-label col-md-2" for="login-email">Email:</label>
        <div class="col-md-8">
          <input type="email" class="form-control" id="login-email" name="login-email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-2" for="login-password">Password:</label>
        <div class="col-md-8">
          <input type="password" class="form-control" id="login-password" name="login-password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <button type="submit" class="btn btn-default">Login</button>
        </div>
      </div>
    </div>
  </form>
  <form role="form" class="form-horizontal" action="app/register_user.php" method="post">
    <div class="col-md-6">
      <h3>Register</h3>
      <div class="form-group">
        <label class="control-label col-md-2" for="register-email">Email:</label>
        <div class="col-md-8">
          <input type="text" class="form-control" id="register-email" name="register-email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-2" for="register-password">Password:</label>
        <div class="col-md-8">
          <input type="password" class="form-control" id="register-password" name="register-password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
  </form>
</div>