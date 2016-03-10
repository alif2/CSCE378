<?php
function html_top() {
    html_doctype();
    html_meta();
    html_css();
    html_title();
    html_scripts();
    html_container_start();
    html_nav();
}

function html_bottom() {
    html_container_end();
}

function html_doctype() {
    echo '<!DOCTYPE html>';
}

function html_meta() {
    echo '<meta charset="utf-8">';
}

function html_css() {
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>';
    echo '<link rel="stylesheet" href="css\style.css">';
}

function html_title() {
    echo '<title>';
    echo file_get_string('title');
    echo '</title>';
}

function html_scripts() {
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>';
    echo '<script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';
    echo '<script async src="js/main.js"></script>';
}

function html_container_start() {
    echo '<div class="container">';
}

function html_nav() {
    echo '<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="">Time Tracker</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="">Home</a></li>
        <li><a href="/submit_correction.php">Submit Correction</a></li>
        <li><a href="/pay_calculator.php">Pay Calculator</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Hello, Username</a></li>
      </ul>
    </div>
  </nav>';
}

function html_container_end() {
    echo '</div>';
}