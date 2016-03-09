<?php
require_once('core.php');
html_top();
?>

<div class="container">
    <form role="form" action="app/register_user.php" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        
        <div class="form-group">
            <button type="submit" class="form-control">Submit</button>
        </div>
    </form>
</div>
<?php
html_bottom();