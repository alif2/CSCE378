<?php
require_once('core.php');
html_top();
?>

<h3>Fixed Navbar</h3>
<div class="row">
  <div class="col-md-5">
    <form role="form" class="form-horizontal" action="app/user_login.php" method="POST">
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
    </form>
  </div>
  <div class="col-md-1">
    <div class="row-md-6" style="border-left:1px solid #000;height:70px"></div>
    <br><div class="row-md-6" style="margin=-1px"><h5>OR</h5></div><br>
    <div class="row-md-6" style="border-left:1px solid #000;height:70px"></div>
  </div>
  <div class="col-md-6">
    <form role="form" class="form-horizontal" action="app/register_user.php" method="post">
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
    </form>
  </div>
</div>