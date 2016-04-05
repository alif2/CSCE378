<?php
require_once('core.php');
html_top();
?>

<a href="/register.php">Register</a>

<form role="form" action="app/user_login.php" method="POST">
  Email: <input type="text" name="email">
  Password: <input type="password" name="password">
  <button type="submit">Submit</button>
</form>